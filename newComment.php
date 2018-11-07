<?php
  session_start();
  require 'dbconn.php';

  function newComment() {
    $content_clean = filter_input(INPUT_GET,'content',FILTER_SANITIZE_STRING);
    $typeOfFK = filter_input(INPUT_GET,'typeOfFK',FILTER_SANITIZE_STRING);
    $fk = filter_input(INPUT_GET,'fk',FILTER_SANITIZE_STRING);

    $db = dbconnect();

    if ($typeOfFK == "comment") {
      $sql = "INSERT INTO comments (Comment_Content, Comment_FK, Post_FK) VALUES (?, ?, '0')";
    } else if ($typeOfFK == "post") {
      $sql = "INSERT INTO comments (Comment_Content, Comment_FK, Post_FK) VALUES (?, '0',?)";
    }

    $stmt = $db->prepare($sql);
    $stmt->execute([$content_clean, $fk]);

    $pk = getPK($db, $typeOfFK, $content_clean, $fk);

    $info_array = array('contentSent' => true, 'content' => $content_clean, 'fk' => $fk, 'typeOfFK' => $typeOfFK, 'pk' => $pk);
    echo json_encode($info_array);


  }

  function getPK($db, $typeOfFK, $content_clean, $fk) {
    if ($typeOfFK == "comment") {
      $sql = "SELECT Comment_PK FROM comments WHERE Comment_Content = :content AND Comment_FK = :fk";
    } elseif ($typeOfFK == "post") {
      $sql = "SELECT Comment_PK FROM comments WHERE Comment_Content = :content AND Post_FK = :fk";
    }

    $stmt = $db->prepare($sql);
    $data = array(':content' => $content_clean, ':fk' => $fk);
    $stmt->execute($data);

    $result = $stmt->fetchAll();
    $array = $result[0];
    $pk = $array['Comment_PK'];
    
    return $pk;
  }

  newComment();

?>
