<?php
session_start();
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

if($_REQUEST['password'] != $_REQUEST['repass']){
    echo "Your passwords don't match. Please go back.";
    exit();
}




print_r($_REQUEST);

$sql = "INSERT INTO users (fname, lname, username, password, favGenre, admin)
VALUES 
("."'". $_REQUEST['fname'] ."',".
    "'".$_REQUEST['lname']."',".
    "'".$_REQUEST['username']."',".
    "'".$_REQUEST['password']."',".
    "'".$_REQUEST['favgenre']."',".
    "'".$_REQUEST['admin']."'".
    ")";

$results = $mysql->query($sql);

if(!$results){
    echo " Houston, you have so many problems<br>";
    echo "<hr>ERROR: ". $mysql->error;
    exit();
}
echo $results;
$user_id = $mysql->insert_id;
echo "<br><strong>".$user_id."</strong>";
echo $_REQUEST['fname'];


//$sql = "SELECT * FROM all_genres";
//$results = $mysql->query($sql);
//
//while($currentrow = $results->fetch_assoc()){
//    $temp = "genre" . $currentrow["all_genre_id"];
//    if($_REQUEST[$temp] == "yes"){
//        $sql = "INSERT INTO userGenres (user_id, genre, all_genre_id, main_genre_id)
//        VALUES(".$user_id . ",'" .$currentrow["all_genres"] . "',". $currentrow["all_genre_id"] . "," . $currentrow['main_id'] .
//        ")";
//
//        $results = $mysql->query($sql);
//
//
//}
//}


$_SESSION["fname"] =$_REQUEST['fname'];
$_SESSION["lname"] =$_REQUEST['lname'];
$_SESSION["username"] =$_REQUEST['username'];
$_SESSION["password"] =$_REQUEST['password'];
$_SESSION["admin"] = $_REQUEST['admin'];
$_SESSION["user_id"] = $user_id;
$_SESSION["loggedin"] = "yes";

?>

<?php

$sql = 		"SELECT all_genres FROM favGenres_view WHERE user_id = $user_id";

$results = $mysql->query($sql);

while($currentrow = $results->fetch_assoc()) {
  $_SESSION["favgenre"] = $currentrow['all_genres'];

    break;
}

echo '<script>window.location.href = "landingpage.php";</script>';
?>



