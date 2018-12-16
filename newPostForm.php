<?php
  require 'menu.php';
 ?>
<!DOCTYPE html>
<html lang="sv" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>NEW POST</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <?php menu(); ?>
    <form>
      <div class="form-group">
        <label for="inputRubrik">RUBRIK</label>
        <input type="text" class="form-control" id="inputRubrik" name="rubrik" placeholder="Enter rubrik">
      </div>
      <div class="form-group">
        <label for="inputPostContent">Innehållstext</label>
        <input type="text" class="form-control" id="inputPostContent" name="content">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>
