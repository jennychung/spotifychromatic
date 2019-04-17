<?php
session_start();


if($_SESSION["loggedin"] == "yes") {
}
else 	{
    include "auth.php";
    exit();
}


?>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110079659-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('set', {'user_id': 'USER_ID'}); // Set the user ID using signed-in user_id.

        gtag('config', 'UA-110079659-1');
    </script>

</head>

<?php
$userID = "aclarks";
$userPw = "2904286806";
$mysql = new mysqli(
    "acad.itpwebdev.com",
    $userID,
    $userPw,
    "aclarks_spotify");
?>



<script type="text/javascript" src="jquery-3.2.1.js"></script>
<script>
    $(document).ready(function(){
        $("#popdiv").hide();
        $("#pop").on("click",function(){
            $("#popdiv").slideToggle();
        });
        $("#rapdiv").hide();
        $("#rap").on("click",function(){
            $("#rapdiv").slideToggle();
        });
        $("#rockdiv").hide();
        $("#rock").on("click",function(){
            $("#rockdiv").slideToggle();
        });
        $("#latindiv").hide();
        $("#latin").on("click",function(){
            $("#latindiv").slideToggle();
        });
        $("#electronicdiv").hide();
        $("#electronic").on("click",function(){
            $("#electronicdiv").slideToggle();
        });
        $("#hiphopdiv").hide();
        $("#hiphop").on("click",function(){
            $("#hiphopdiv").slideToggle();
        });
        $("#rbdiv").hide();
        $("#rb").on("click",function(){
            $("#rbdiv").slideToggle();
        });
        $("#countrydiv").hide();
        $("#country").on("click",function(){
            $("#countrydiv").slideToggle();
        });
        $("#housediv").hide();
        $("#house").on("click",function(){
            $("#housediv").slideToggle();
        });
        $("#trapdiv").hide();
        $("#trap").on("click",function(){
            $("#trapdiv").slideToggle();
        });
        $("#reggaetondiv").hide();
        $("#reggaeton").on("click",function(){
            $("#reggaetondiv").slideToggle();
        });
        $("#jazzbluesdiv").hide();
        $("#jazzblues").on("click",function(){
            $("#jazzbluesdiv").slideToggle();
        });
        $("#metaldiv").hide();
        $("#metal").on("click",function(){
            $("#metaldiv").slideToggle();
        });
        $("#indiediv").hide();
        $("#indie").on("click",function(){
            $("#indiediv").slideToggle();
        });
        $("#worshipdiv").hide();
        $("#worship").on("click",function(){
            $("#worshipdiv").slideToggle();
        });
        $("#otherdiv").hide();
        $("#other").on("click",function(){
            $("#otherdiv").slideToggle();
        });
    });
</script>


<html>
<div id="generate-genres" style=' color: rgb(175,175,175)!important;'>
<form action="">
    <a href="#" id="pop" class="generate-genres-name">Pop</a><br>
    <div id="popdiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'pop'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo " <input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'> <a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"        ;}
        ?>
    </div>
    <a href="#" id="rap" class="generate-genres-name">Rap</a><br>
    <div id="rapdiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'rap'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo " <input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'> <a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"        ;}
        ?>
    </div>
    <a href="#" id="rock" class="generate-genres-name">Rock</a><br>
    <div id="rockdiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'rock'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo "<input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'><a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"        ;}
        ?>
    </div>

    <a href="#" id="latin" class="generate-genres-name">Latin</a><br>
    <div id="latindiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'latin'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo "<input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'> <a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"            ;}
        ?>
    </div>

    <a href="#" id="electronic" class="generate-genres-name">Electronic</a><br>
    <div id="electronicdiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'electronic'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo  "<input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'> <a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"            ;}
        ?>
    </div>

    <a href="#" id="hiphop" class="generate-genres-name">Hip Hop</a><br>
    <div id="hiphopdiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'hip hop'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo " <input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'> <a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"            ;}
        ?>
    </div>

    <a href="#" id="rb" class="generate-genres-name">R&B</a><br>
    <div id="rbdiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'r&b'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo   "<input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'> <a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"            ;}
        ?>
    </div>

    <a href="#" id="country" class="generate-genres-name">Country</a><br>
    <div id="countrydiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'country'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo   "<input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'> <a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"            ;}
        ?>
    </div>

    <a href="#" id="house" class="generate-genres-name">House</a><br>
    <div id="housediv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'house'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo   "<input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'> <a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"            ;}
        ?>
    </div>
    <a href="#" id="trap" class="generate-genres-name">Trap</a><br>
    <div id="trapdiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'trap'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo   "<input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'> <a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"            ;}
        ?>
    </div>

    <a href="#" id="reggaeton" class="generate-genres-name">Reggaeton</a><br>
    <div id="reggaetondiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'reggaeton'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo   "<input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'> <a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"            ;}
        ?>
    </div>

    <a href="#" id="jazzblues" class="generate-genres-name">Jazz/Blues</a><br>
    <div id="jazzbluesdiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'jazz blues'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo   "<input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'> <a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"            ;}
        ?>
    </div>

    <a href="#" id="metal" class="generate-genres-name">Metal</a><br>
    <div id="metaldiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'metal'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo   "<input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'> <a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"            ;}
        ?>
    </div>

    <a href="#" id="indie" class="generate-genres-name" >Indie</a><br>
    <div id="indiediv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'indie'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo   "<input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'> <a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"            ;}
        ?>
    </div>

    <a href="#" id="worship" class="generate-genres-name">Worship</a><br>
    <div id="worshipdiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'worship'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo   "<input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'> <a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"            ;}
        ?>
    </div>

    <a href="#" id="other" class="generate-genres-name">Other</a><br>
    <div id="otherdiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'other'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo   "<input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'> <a class='all-genres-name' href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><br>"            ;}
        ?>
    </div>
    <input type="submit" class="selectform" style="  font-weight: 600; font-size: 20pt; text-align: left;"value="Generate"
    <input id=”contact-submit” class=”button” type=”submit” value=”Submit”
           onClick="ga('send', 'event', { eventCategory: 'Generate', eventAction: 'Select Genre', eventValue: 0});">

</form>

<?php

$sql = "SELECT * FROM all_genres";
$results = $mysql->query($sql);
//echo $results->num_rows;
//echo $_SESSION["user_id"];

while($currentrow = $results->fetch_assoc()) {
    $temp = "genre" . $currentrow["all_genre_id"];
    if ($_REQUEST[$temp] == "yes") {
        $sql = "INSERT INTO userGenres (user_id, genre, all_genre_id, main_genre_id)
VALUES(" . $_SESSION["user_id"] . ",'" . $currentrow["all_genres"] . "'," . $currentrow["all_genre_id"] . "," . $currentrow['main_id'] .
            ")";
//        echo $sql;
        $results  = $mysql->query($sql);
    }
}


    $sql="SELECT * FROM selectedGenre_view WHERE user_id = $user_id";
    $results = $mysql->query($sql);
if($results->num_rows>0){

    while($currentrow = $results->fetch_assoc()) {
        $_SESSION["selection_id"] = $currentrow['userGenre_id'];
        $_SESSION["genre"] = $currentrow['genre'];
        $_SESSION["main_genre"] = $currentrow['main_genres'];
        $_SESSION["hexcode"] = $currentrow['hexcode'];
        $_SESSION["color_list"] = $currentrow['color_list'];
    }
}

//
//$sql = "SELECT * FROM main_genres";
//$results = $mysql->query($sql);
//
//
//while($currentrow = $results->fetch_assoc()){
//
//    $sql = "SELECT COUNT(main_genres) as genreCount, hexcode as hexcode FROM api_view WHERE api_user_id = 12 AND main_genres = '".$currentrow['main_genres']."'";
//
//    $genrecount = $mysql->query($sql);
//    $data = $genrecount->fetch_assoc();
//    $colors = $data['hexcode'];
////    echo "<div style='width: 300px; background-color: #000000;'>".$currentrow['main_genres']."</div> <BR>";
//
//    echo $currentrow['main_genres']." = ".$data["genreCount"]."<br>";
//    echo "<div id='".$currentrow['main_genres']."box' style='width: 300px; background-color: ".$colors.";'>".$currentrow['main_genres']."</div>";
//}



?>

</div>


<!-- WAVES -->
<svg width="120%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><title>Wave</title><defs></defs><path id="feel-the-wave" d=""/></svg>
<svg width="120%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><title>Wave</title><defs></defs><path id="feel-the-wave-two" d=""/></svg>
<svg width="120%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><title>Wave</title><defs></defs><path id="feel-the-wave-three" d=""/></svg>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="jquery.wavify.js"></script>



</body>

</html>
