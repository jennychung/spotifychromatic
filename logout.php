<?php
session_start();
session_unset();
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

    <script src="jquery.wavify.js"></script>
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

<body id="logout-page">


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
            <ul>
                <li>
                    <div class="page-title" style="text-align: center; display: block; margin: auto; color:#12FFF7;">
                        hey <?php echo $_SESSION['fname'] . "!";
                        ?>  <br> </div>
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
                        <a class="nav-link menu active" href="generate.php">generate</a>
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

    <div id="logout-body"">

    You logged out. <br>
    Please log back in  <a href='loginform.php' class="link-redirect">here.</a>


</div>

    <!-- WAVES -->
    <svg width="120%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><title>Wave</title><defs></defs><path id="feel-the-wave" d=""/></svg>
    <svg width="120%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><title>Wave</title><defs></defs><path id="feel-the-wave-two" d=""/></svg>
    <svg width="120%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><title>Wave</title><defs></defs><path id="feel-the-wave-three" d=""/></svg>
    <!--
    <svg width="120%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><title>Wave</title><defs></defs><path id="feel-the-wave-four" d=""/></svg>
    <svg width="120%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><title>Wave</title><defs></defs><path id="feel-the-wave-five" d=""/></svg>
    <svg width="120%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><title>Wave</title><defs></defs><path id="feel-the-wave-six" d=""/></svg> -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="jquery.wavify.js"></script>






</body>

</html>

