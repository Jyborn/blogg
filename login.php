<?php
  session_start();
  require 'dbconn.php';

  function userlogin() {
    $username_clean = filter_input(INPUT_GET,'username',FILTER_SANITIZE_STRING);
    $password_clean = filter_input(INPUT_GET,'password',FILTER_SANITIZE_STRING);

    $db = dbconnect();

    $sql = "SELECT * FROM users WHERE username = :user AND password = :pass";
    $stmt = $db->prepare($sql);
    $data = array(':user' => $username_clean, ':pass' => $password_clean);
    $stmt->execute($data);

    $exists = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

    if ($exists) {
      session_regenerate_id(true);
      $_SESSION['username'] = $username_clean;
      $info_array = array('login' => true, 'name' => $username_clean);
      echo json_encode($info_array);
    }
    else {
      $info_array = array('login' => false);
      echo json_encode($info_array);
    }
  }
  userlogin();
?>
