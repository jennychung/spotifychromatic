<?php
$userID = "aclarks";
$userPw = "2904286806";
$mysql = new mysqli(
    "acad.itpwebdev.com",
    $userID,
    $userPw,
    "aclarks_spotify");

//$sql = "SELECT COUNT(main_genres) FROM api_view WHERE api_user_id = 12 AND main_genres = 'pop'";

$sql = "SELECT * FROM main_genres";
$results = $mysql->query($sql);


while($currentrow = $results->fetch_assoc()){

    $sql = "SELECT COUNT(main_genres) as genreCount, hexcode as hexcode FROM api_view WHERE api_user_id = 12 AND main_genres = '".$currentrow['main_genres']."'";

    $genrecount = $mysql->query($sql);
        $data = $genrecount->fetch_assoc();
        $colors = $data['hexcode'];
//    echo "<div style='width: 300px; background-color: #000000;'>".$currentrow['main_genres']."</div> <BR>";

     echo $currentrow['main_genres']." = ".$data["genreCount"]."<br>";
     echo "<div id='".$currentrow['main_genres']."box' style='width: 300px; background-color: ".$colors.";'>".$currentrow['main_genres']."</div>";
}

