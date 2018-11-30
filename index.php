<?php
  mb_internal_encoding('UTF-8');
  session_start();

  require 'dbconn.php';
  require 'postsCommentsController.php';
  require 'commentPopUp.php';
 ?>

<html lang="sv">
  <head>
    <meta charset="utf-8">
    <title>BLOGG</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <?php
    getblogContent();
    commentPopUp();
    ?>

    <script src="newCommentJs.js"></script>
  </body>
</html>
