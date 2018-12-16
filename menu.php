<?php
  function menu() {
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">BLOGG!</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <button id="loginButton" type="button" class="btn btn-primary">Login</button>
    <button id="newPostButton" type="button" class="btn btn-primary" onclick="location.href='newPostForm.php';">New Post</button>
</nav>

<?php
  $x = 0;
  echo $x;
  echo $x++;
  echo $x;
  echo ++$x;
  }
?>
