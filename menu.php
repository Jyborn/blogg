<?php
  function menu($inloggad) {
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">BLOGG!</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <?php   if($inloggad) { ?>
    <button id="loginButton" type="button" class="btn btn-primary" style="visibility: hidden;">Login</button>
    <button id="newPostButton" type="button" class="btn btn-primary" onclick="location.href='newPostForm.php';" style="visibility: visible;">New Post</button>
<?php } else { ?>
  <button id="loginButton" type="button" class="btn btn-primary">Login</button>
  <button id="newPostButton" type="button" class="btn btn-primary" onclick="location.href='newPostForm.php';">New Post</button>
<?php } ?>
</nav>
<?php } ?>
