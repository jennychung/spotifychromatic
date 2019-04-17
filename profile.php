<?php
session_start();


if($_SESSION["loggedin"] == "yes") {
}
else 	{
    include "auth.php";
    exit();
}


require 'vendor/autoload.php';

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($_SESSION['accesstoken']);

$_SESSION['uploadfile'] = '0';
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
<head> <!-- Global site tag (gtag.js) - Google Analytics -->
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

<body id="profile">


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
            <a class="nav-link menu active" href="profile.php">profile</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

<!--END HEADER-->



      <?php
      $allowedExts = array("gif", "jpeg", "jpg", "png");
      $temp = explode(".", $_FILES["file"]["name"]);
      $extension = end($temp);

      if ((($_FILES["file"]["type"] == "image/gif")
              || ($_FILES["file"]["type"] == "image/jpeg")
              || ($_FILES["file"]["type"] == "image/jpg")
              || ($_FILES["file"]["type"] == "image/pjpeg")
              || ($_FILES["file"]["type"] == "image/x-png")
              || ($_FILES["file"]["type"] == "image/png"))
          && ($_FILES["file"]["size"] < 20000000000000000000000)
          && in_array($extension, $allowedExts))

      if(empty($_FILES)){
          echo "<br> <div id='photo-instruction'> Upload Photo </div>";
//          $_SESSION['uploadfile'] = '0';
          exit();
      }
      else if ($_FILES["file"]["error"] > 0)
      {
          echo $_FILES["file"]["error"] . "<br> <div id='photo-instruction'> is invalid. </div>";
      }

//      print_r($_FILES);

      $path = "uploads/";


      move_uploaded_file(
          $_FILES["file"] ["tmp_name"],
          $path . $_FILES["file"]["name"]
      ); //php command, 2 parameters: where file is now, where do you want to put

      $image=$_FILES["file"]["name"]; /* Displaying Image*/
      $img=$path.$image;
      $user_id_name= $_SESSION['user_id_name'];



      $sql = "SELECT profpic FROM api_users WHERE id_name = $user_id_name";

      $results = $mysql->query($sql);

//

      if(isset($_POST['submit'])) {
          $_SESSION['uploadfile'] = '1';
          echo '<img src="' . $img . '" id="uploaded-photo">';
      }
      else
      {
      if($results->num_rows > 0) {
          while($currentrow = $results->fetch_assoc()) {
              if ($currentrow['profpic'] != '') {
                  echo '<img src="' . $currentrow['profpic'] . '" id="uploaded-photo">';
                  break;
              }
          }

      };


      }



      ?>



      <script type="text/javascript" src="bootstrap-filestyle.min.js"> </script>

      <form  class="form-inline" id="uploadphoto" action=""
             method="POST"
             enctype="multipart/form-data"> <!--allows forms to have files-->
          <input type="file" name="file" class="filestyle center" data-size="sm" data-badge="true"
                 data-input="false" data-text="new photo" data-btnClass="btn btn-outline-info">
          <input type="submit" name="submit" id="photo-submit-btn">

      </form>
<?php

if(isset($_POST['submit'])) {
    $sql = "UPDATE api_users SET profpic = '$img'
      WHERE id_name = $user_id_name";

    $results = $mysql->query($sql);
}
?>


      <div id="profile-content">
          <br>

              <?php

              $sql = "SELECT display_name, id_name FROM api_users WHERE id_name = $user_id_name";

              $results = $mysql->query($sql);

              while($currentrow = $results->fetch_assoc()) {
                  echo "<a style='font-size: 28pt;' class='link-hover' href='https://open.spotify.com/user/" . $currentrow['id_name'] . "'>". $currentrow['display_name'] ."</a>";
                  break;
              }


              ?>

<!--              echo $_SESSION['fname'] . " " . $_SESSION['lname'];-->


               <br>
          <?php
          if ($_SESSION["admin"] == "admin") {
              include "admin/admin.php";
          }
          ?>

          <?php
          $sql = "SELECT id_name FROM api_users WHERE id_name = $user_id_name";

          $results = $mysql->query($sql);

          while($currentrow = $results->fetch_assoc()) {
              echo "<a class='link-hover' href='https://open.spotify.com/user/" . $currentrow['id_name'] . "'> @". $currentrow['id_name'] ."</a>";
              break;
          }


          ?> <br>

          <?php
          $sql = "SELECT followers FROM api_users WHERE id_name = $user_id_name";

          $results = $mysql->query($sql);



          while($currentrow = $results->fetch_assoc()) {
              echo $currentrow['followers'] . " followers";
              break;
          }


          ?>
           <br>

          <?php
          $sql = "SELECT product FROM api_users WHERE id_name = $user_id_name";

          $results = $mysql->query($sql);



          while($currentrow = $results->fetch_assoc()) {
              echo $currentrow['product'];
              break;
          }


          ?>
          <br>


          <br> <i class="fa fa-music" aria-hidden="true"> <span style="font-family: Poppins; font-weight: 500;
    letter-spacing: 1px;"> listening to
                  <?php
                  $sql = "SELECT current_track FROM api_users WHERE id_name = $user_id_name";

                  $results = $mysql->query($sql);


                  while($currentrow = $results->fetch_assoc()) {
                      if($currentrow['current_track']!='') {
                          echo $currentrow['current_track'];
                          break;
                      } else{
                          echo "life go by";
                      }
                  }

                  ?>
              </span></i>


      </div>

      <img src="assets/circles.png" id="circle-element" style="opacity: 0.1; position: fixed; z-index: -2; right: 10%; top: 60%; width: 300px;">


      <!-- WAVES -->
      <svg width="120%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><title>Wave</title><defs></defs><path class="pink-wave1" d=""/></svg>
      <svg width="120%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><title>Wave</title><defs></defs><path class="beige-wave1" d=""/></svg>
      <svg width="120%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><title>Wave</title><defs></defs><path class="orange-wave1" d=""/></svg>
      <!--
      <svg width="120%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><title>Wave</title><defs></defs><path id="feel-the-wave-four" d=""/></svg>
      <svg width="120%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><title>Wave</title><defs></defs><path id="feel-the-wave-five" d=""/></svg>
      <svg width="120%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><title>Wave</title><defs></defs><path id="feel-the-wave-six" d=""/></svg> -->


      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script src="jquery.wavify.js"></script>
</body>
