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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
<script type="text/javascript" src="jquery-3.2.1.js"></script>


  <script src="  https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/js/mdb.min.js"></script>




  <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="font/stylesheet.css">
<link rel="stylesheet" type="text/css" href="style.css">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
 <script src="https://unpkg.com/bootstrap-material-design@4.0.0-beta.4/dist/js/bootstrap-material-design.js" integrity="sha384-3xciOSDAlaXneEmyOo0ME/2grfpqzhhTcM4cE32Ce9+8DW/04AGoTACzQpphYGYe" crossorigin="anonymous"></script>

<script type="text/javascript" src="script.js"></script>

<script src="https://use.fontawesome.com/b79b0c4cbf.js"></script>

</head>

<body id="about">


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
      <div class="navbar-collapse collapse justify-content-stretch" id="navbar7">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link menu" href="generate.php">generate</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu " href="chromaticsearch.php">search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu" href="profile.php">profile</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

<!--END HEADER-->

<!-- CONTENT START -->

  <img src="assets/circles.png" id="circle-element" style="opacity: 0.1; position: fixed; z-index: -2; right: 10%; top: 60%; width: 300px;">

<div id="about-content">
<a href="landingpage.php" class="about-content-highlight">chromatic</a> is for the music lovers &#8212; specifically, <a href="https://www.spotify.com/" class="about-content-highlight"> spotify </a>lovers.
we look at the artists you listen to and categorize these into different <a href="chromaticsearch.php" class="about-content-highlight">genres </a>.
each genre is represented by a color, and a <a href="landingpage.php" class="about-content-highlight">colorful mix </a> is created out of your listening habits.
show your colors, and <a href="history.php" class="about-content-highlight">share </a>with your friends and family.
<br> <br>
<a href="landingpage.php" class="about-content-highlight"> <i> chromatic. for your eyes and ears. </i> </a>
</div>
<!-- CONTENT END -->

<!-- TEAM MEMBERS START -->

<br> <br>
<div id="about-team">
this project is made possible by
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="wrap">
<div class="about-button">clayton barnes</div>
<div class="about-toggle-content">
<a href="" > <img src="assets/clayton.png" class="teamphoto"> </a>
</div>
</div>
<div class="wrap">
<div class="about-button">jenny chung</div>
<div class="about-toggle-content">
<a href="" > <img src="assets/jenny.png" class="teamphoto"> </a>

</div>
</div>&  &nbsp;
<div class="wrap">
<div class="about-button">asia clarkson</div>
<div class="about-toggle-content">
<a href="" > <img src="assets/asia.png" class="teamphoto"> </a>
</div>
</div>


<!-- TEAM MEMBERS END -->


</body>
