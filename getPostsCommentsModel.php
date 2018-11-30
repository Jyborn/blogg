<?php

  function getPosts() {
    $db = dbconnect();
    $sth = $db->prepare('SELECT * FROM posts ORDER BY Post_PK DESC');
    $sth->execute();

    $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

    $blog[] = array();
    for ($i=0; $i < count($result); $i++) {
      $post = $result[$i];
      $blog[count($blog)] = $post['Post_Content'];
      $blog[count($blog)] = 0;
      $blog[count($blog)] = $post['Post_PK'];
      $blog[count($blog)] = $post['Post_Rubrik'];

      $blog = getComments($post['Post_PK'], $blog, 0);
    }

    return $blog;
  }

  /*
  $parentPK = förälderPrimaryKey post eller kommentar över
  $tempBlog = arrayen där alla inlägg och kommentarer sparas för att sedan ritas ut
  $depth = vilken nivå i trädstrukturen det ligger på
  returnerar tillbaka arrayen med kommentarer tillagda
  */

  function getComments($parentPK, $tempBlog, $depth) {
    $db = dbconnect();
    // Kolla om föräldern är post eller comment
    if ($depth == 0) {
      $sth = $db->prepare("SELECT * FROM comments WHERE Post_FK = '$parentPK' ORDER BY Comment_PK desc");
    } else if ($depth > 0) {
      $sth = $db->prepare("SELECT * FROM comments WHERE Comment_FK = '$parentPK' ORDER BY Comment_PK desc");
    }
    $sth->execute();

    $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

    for ($i=0; $i < count($result); $i++) {
      $comment = $result[$i];
      //Lägg in texten i arrayen samt vilken nivå kommentaren ligger på
      $tempBlog[count($tempBlog)] = $comment['Comment_Content'];
      $tempBlog[count($tempBlog)] = $depth + 1;
      $tempBlog[count($tempBlog)] = $comment['Comment_PK'];

      $tempBlog = getComments($comment['Comment_PK'], $tempBlog, $depth + 1);
    }

    return $tempBlog;
  }

?>
