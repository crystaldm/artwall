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

    <header>

      <h1>Hello, world!</h1>

      <?php include("php/menu.php"); ?>

    </header>

    <section>

      <article>

        <?php 

        //sanitize() functionw as defined at top of page in db.php
        $state = sanitize($_GET['state']);
        switch($state) {
          case "home":
            if(is_logged_in()) {
              require("php/home.php");
            } else {
              require("php/welcome.php");
            }
            break;
          case "register":
            if(!is_logged_in()) {
              require("php/registration.php");
            } else {
              require("php/home.php");
            }
            break;
          case "login":
            if(!is_logged_in()) {
              require("php/login.php");
            } else {
              require("php/home.php");
            }
            break;
          case "post":
            if(is_logged_in()) {
              require("php/posts.php");
            }
            break;
          default:
          if($state === false) {
            echo "unrecognized state=".$state;
          }
            break;
        }
        
        ?>

      </article>
      
    </section>

    <footer>

    </footer>

    <!-- jQuery file -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap js file -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>