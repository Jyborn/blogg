<?php

  session_start();
  require 'dbconn.php';

  function newPost() {
    $content_clean = filter_input(INPUT_GET,'content',FILTER_SANITIZE_STRING);
    $rubrik_clean = filter_input(INPUT_GET,'rubrik',FILTER_SANITIZE_STRING);

    $db = dbconnect();

    $sql = "INSERT INTO posts (Post_Content, Post_Rubrik) VALUES (?, ?)";

    $stmt = $db->prepare($sql);
    $stmt->execute([$content_clean, $rubrik_clean]);

    $info_array = array('contentSent' => true, 'content' => $content_clean, 'rubrik' => $rubrik_clean);
    echo json_encode($info_array);
  }

  newPost();
 ?>
