<?php
session_start();
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '674830028d00453288807f07cfe372c3',
    'd1d71d40e87b4f05b0931abfc4c66a0b',
    'http://acad.itpwebdev.com/~chun960/Spotify/callback.php'
);

      $session->requestAccessToken($_GET['code']);
      $accessToken = $session->getAccessToken();
      $refreshToken = $session->getRefreshToken();


      $userID = "aclarks";
      $userPw = "2904286806";
      $mysql = new mysqli(
          "acad.itpwebdev.com",
          $userID,
          $userPw,
          "aclarks_spotify");

      if($mysql->connect_errno) {
          echo "db connection error : " . $mysql->connect_error;
          exit();
      }


      $sql = "INSERT INTO tokens (access_token, refresh_token)
      VALUES
      ("."'". $accessToken ."',".
          "'".$refreshToken ."'".
          ")";

      $results = $mysql->query($sql);


      $_SESSION['accesstoken']=$accessToken;
      $_SESSION['refreshtoken']=$refreshToken;

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($accessToken);

$sql = "INSERT INTO users (access_token, refresh_token)
      VALUES
      ("."'". $accessToken ."',".
    "'".$refreshToken ."'".
    ")";

$results = $mysql->query($sql);


$me = $api->me();
$me->display_name;

$followers = $me->followers;
$followers->total;
$me->email;
$me->href;
$me->product;
//$me->images.url;
$images = $me->images;
$images->url;
$me->id;

$current= $api->getMyCurrentTrack();
$item = $current->item;
$item->name;


$sql = "INSERT INTO api_users (display_name, followers, email,href, product, profpic, id_name, current_track)
      VALUES
      ("."'". $me->display_name ."',".
    "'". $followers->total ."',".
    "'". $me->email ."',".
    "'". $me->href ."',".
    "'". $me->product ."',".
    "'". $images->url ."',".
    "'". $me->id ."',".
    "'". $item->name ."'".
    ")";


$user_id_name= $_SESSION['user_id_name'];

$sql = "SELECT api_user_id FROM api_users WHERE id_name = $user_id_name";

$results = $mysql->query($sql);

if($results->num_rows > 0) {
    while ($currentrow = $results->fetch_assoc()) {
        $_SESSION['api_user_id'] = $currentrow['api_user_id'];
        break;
    }

}

$topgenres = $api->getMyTop(artists, [
    'limit' => 50,
    'time_range' => 'long_term'
]);
$apiuserid= $_SESSION['api_user_id'];


//$sql = "ALTER TABLE api_genres AUTO_INCREMENT = 1";
//$results = $mysql->query($sql);

$sql = "DELETE FROM api_genres WHERE api_user_id = $apiuserid";
$results = $mysql->query($sql);

for ($i=0; $i < 50 ; $i++) {
    $genressize = sizeOf($topgenres->items[$i]->genres);

    for ($j = 0; $j < $genressize; $j++) {
        $sql = "INSERT INTO api_genres (api_user_id, api_genres)
      VALUES
      (" . "'" . $_SESSION['api_user_id'] . "'," .
            "'" . $topgenres->items[$i]->genres[$j] . "'" .
            ")";

        $results = $mysql->query($sql);
    }
}



$sql = "DELETE FROM api_genres WHERE api_user_id = 0";
$results = $mysql->query($sql);

//$sql = "INSERT INTO api_genres (api_user_id, api_genres)
//      VALUES
//      ("."'". $_SESSION['api_user_id'] ."',".
//    "'". $genres ."'".
//    ")";

//$results = $mysql->query($sql);
$_SESSION['user_id_name']=$me->id;

$_SESSION["loggedin"] = "yes";
// Send the user along and fetch some data!


//ASIA GENERATOR
$sql = "SELECT * FROM main_genres";
$genreresults = $mysql->query($sql);


$sql = "SELECT * FROM api_genres WHERE main_id = 0";
$emptyresults = $mysql->query($sql);


while($currentempty = $emptyresults->fetch_assoc()){
    $match = 0;

    $genreresults->data_seek(0);

    while($currentgenre = $genreresults->fetch_assoc()){

        if(!empty(strstr($currentempty['api_genres'], $currentgenre['main_genres']))){
            $match = 1;
            $sql = "UPDATE api_genres SET main_id=".$currentgenre['main_id']." WHERE api_genres_id = ".
                $currentempty['api_genres_id'];
            $newmain = $mysql->query($sql);
            echo "found " . $currentgenre["main_genres"]  ." in ". $currentempty["api_genres"];
        }

    }
    // after genre loop
    if($match==0){
        $sql = "UPDATE api_genres SET main_id=16 WHERE api_genres_id = ".
            $currentempty['api_genres_id'];
        $newothermain = $mysql->query($sql);
    }

}






header('Location: landingpage.php');
die();
?>