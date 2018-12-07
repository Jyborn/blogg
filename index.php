<?php
  session_start();
  session_destroy();
  mb_internal_encoding('UTF-8');

  require 'dbconn.php';
  require 'menu.php';
  require 'loginPopUp.php';
  require 'postsCommentsController.php';
  require 'commentPopUp.php';

  if (isset($_SESSION['username'])) {
    echo "inloggad";
  }
 ?>

<html lang="sv">
  <head>
    <meta charset="utf-8">
    <title>BLOGG</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <?php
    menu();
    loginPopUp();
    getblogContent();
    commentPopUp();
    ?>

    <script src="newCommentJs.js"></script>
    <script src="login.js"></script>
  </body>
</html>
