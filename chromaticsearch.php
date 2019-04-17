<?php
session_start();

require 'vendor/autoload.php';

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($_SESSION['accesstoken']);

?>

<?php
$userID = "aclarks";
$userPw = "2904286806";
$mysql = new mysqli(
    "acad.itpwebdev.com",
    $userID,
    $userPw,
    "aclarks_spotify");

if($_REQUEST['password'] != $_REQUEST['repass']){
    echo "Your passwords do not match. Please go back.";
    exit();
}

?>
<html>
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

    <title> Chromatic </title>
    <script type="text/javascript" src="jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/js/mdb.min.js" async></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/js/mdb.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <script type="text/javascript" src="script.js"></script>

    <script src="https://use.fontawesome.com/b79b0c4cbf.js"></script>

</head>

<body id="searchbody">


  <!-- TOGGLE HEADER -->

  <div class="content-container">


     <!-- Menu icon -->
     <div id="menu-icon-shape">
       <div id="menu-icon">
         <div id="top"></div>
         <div id="middle"></div>
         <div id="bottom"></div>
       </div>
     </div>

     <!-- Overlay menu -->
     <div id="overlay-nav">
       <div id="nav-content">
         <ul><li>
                 <div class="page-title" style="text-align: center; display: block; margin: auto; color:#12FFF7;">

                     <?php
                     $user_id_name= $_SESSION['user_id_name'];

                     $sql = "SELECT display_name FROM api_users WHERE id_name = $user_id_name";


                     $results = $mysql->query($sql);


                     if($_SESSION["loggedin"] == "yes") {

                         if($results->num_rows > 0) {
                             while ($currentrow = $results->fetch_assoc()) {
                                 echo "hey ". $currentrow['display_name'] ."!";
                                 break;
                             }

                         }


                     }
                     else{
                         echo "hello!";
                     }
                     ?>


                     <br> </div>
             </li>
             <br>
           <li>
             <a href="generate.php">generate</a>
           </li>
           <li>
             <a href="chromaticsearch.php">search</a>
           </li>
           <li>
             <a href="profile.php">profile</a>
           </li>
           <li>
             <a href="history.php">history</a>
           </li>

           <li>
             <a href="about.php">about</a>
           </li>
<br> <br>
           <li>
             <a href="logout.php" style="font-weight: 400;">sign out</a>
           </li>
         </ul>
       </div>
     </div>

  <!-- HEADER -->


  <div style="margin-top:20px; margin-right: 100px;">
    <nav class="navbar navbar-expand-md navbar-dark">
      <a href="landingpage.php" class="navbar-brand" style=" padding-top:20px!important; ">
        <img src="assets/logo-icon-color.png" width="80px"  class="logoAlign" style="background-color: transparent;">
      </a>
      <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar7">
        <span class="navbar-toggler-icon"></span>
      </button> -->
      <div class="navbar-collapse collapse justify-content-stretch" id="navbar7">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link menu " href="generate.php">generate</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu active" href="chromaticsearch.php">search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu" href="profile.php">profile</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

<!--END HEADER-->



<?php
$userID = "aclarks";
$userPw = "2904286806";
$mysql = new mysqli(
    "acad.itpwebdev.com",
    $userID,
    $userPw,
    "aclarks_spotify");

echo "<div id='searchTerm'>" .
    $_REQUEST['genre'] . "</div><br>";


?>

<div class="md-form" id="searchbox">
<!--    <form action="chromaticresults.php">-->
    <form method="post">
    <input type="text" id="form1" name="genre" style=" color: white!important; font-family: 'Poppins', sans-serif;
        font-weight: 600;
        letter-spacing: 2px;" class="form-control">
    <label for="form1" class="searchTitle">Search for a music genre</label>
    </form>
</div>


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    $ID = isset($_POST['ID']) ? $_POST['ID'] : false;



    $sql = "SELECT * FROM genreView1
WHERE all_genres LIKE  '%" . $_REQUEST["genre"] . "%'";


    $results = $mysql->query($sql);

    if (!$results) {
        echo "SQL error: " . $mysql->error;
        exit();
    }

    echo "<div id='info'>" .
        $results->num_rows . " results <br> <br>" . "</div><br>";

    echo "<table id='classtable'>
    <tr >
        <th> </th>
        <th class='headerStyle'>Genre</th>
        <th class='headerStyle'>Subgenre</th>
        <th class='headerStyle'>Color</th>
    </tr>
    <td style='height:10px;'> </td>
    ";
    echo "<div id='resultsdiv'>";
    while ($currentrow = $results->fetch_assoc()) //$onerow = $results->fetch_assoc();
    {
        echo
            "<tr id='tr" . $currentrow["all_genres"] . "' style='background-color:"  . ";'>".
            "<td style='width: 1%!important;'>" . "<span style=' width: 1%!important;  margin:0; font-size: 24pt; color: " . $currentrow["hexcode"]. ";'> ⚈ </span> </td>" .
             "<td style='margin-left:10px;'>" . $currentrow["main_genres"] . "</td>
            " . "<td>" . $currentrow["all_genres"] . "</td>" . "
            " . "<td>" . $currentrow["color_list"] . "</td>" . "

        </tr>";

        echo "</div>";
    }
}
?>

</body>
</html>
