<?php
session_start();
//
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '674830028d00453288807f07cfe372c3',
    'd1d71d40e87b4f05b0931abfc4c66a0b',
    // 'http://acad.itpwebdev.com/~chun960/Spotify/callback.php'
    'https://spotifychromatic.herokuapp.com/callback.php'
);

$refreshToken = $session->getRefreshToken();

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($_SESSION['accesstoken']);

//echo $_SESSION['accesstoken'];
//
//print_r(
//    $api->me()
//);

//$genres = array();

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




$topgenres = $api->getMyTop(artists, [
    'limit' => 50,
    'time_range' => 'long_term'
]);

$sql = "DELETE FROM api_genres";


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




?>
