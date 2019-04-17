<?php
$userID = "aclarks";
$userPw = "2904286806";
$mysql = new mysqli(
    "acad.itpwebdev.com",
    $userID,
    $userPw,
    "aclarks_spotify");

//$sql = "SELECT * FROM api_genres WHERE api_user_id = ".$SESSION['api_user_id'] ;

$sql = "SELECT * FROM main_genres";
$genreresults = $mysql->query($sql);


$sql = "SELECT * FROM api_genres WHERE main_id = 0";
$emptyresults = $mysql->query($sql);


while($currentempty = $emptyresults->fetch_assoc()){
    $match = 0;

//     $genreresults['main_genre'];
    $genreresults->data_seek(0);

    while($currentgenre = $genreresults->fetch_assoc()){
       /*
         echo "looking for " . $currentgenre["main_genres"] . " and " . $currentempty['api_genres'];
        echo strpos($currentempty['api_genres'], $currentgenre['main_genres']);
        echo "<br>";
*/
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