<?php session_start();

include("php/db.php");

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ArtWall</title>

    <!-- Bootstrap css stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- ArtWall css stylesheet -->
    <link href="css/artwall.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700,300,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- early loading scripts -->
    <script src="js/modernizr.min.js"></script>

  </head>
  <body>

    <div class="wrapper">

      <header>

        <h1>Artwall. A place for asshats.</h1>


        <!-- change to if logged in show user menu -->
        <?php include("php/menu.php"); ?>

      </header>

      <section>

        <article>

          <?php

          // //sanitize() function was defined at top of page in db.php
          // $state = sanitize($_GET['state']);
          // switch($state) {
          //   case "home":
          //     if(is_logged_in()) {
          //       require("php/home.php");
          //     } else {
          //       require("php/welcome.php");
          //     }
          //     break;
          //   case "register":
          //     if(!is_logged_in()) {
          //       require("php/registration.php");
          //     } else {
          //       require("php/home.php");
          //     }
          //     break;
          //   case "login":
          //     if(!is_logged_in()) {
          //       require("php/login.php");
          //     } else {
          //       require("php/home.php");
          //     }
          //     break;
          //   case "post":
          //     if(is_logged_in()) {
          //       require("php/posts.php");
          //     }
          //     break;
          //   default:
          //   if($state === false) {
          //     echo "unrecognized state=".$state;
          //   }
          //     break;
          // }

          ?>

          <?php include("php/home.php"); ?>

        </article>

      </section>

      <footer>

      </footer>

    </div>



    <!-- jQuery file -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap js file -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
