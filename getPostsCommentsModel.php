<?php

  function getPosts($blog) {
    $db = dbconnect();
    $sth = $db->prepare('SELECT * FROM posts ORDER BY Post_PK DESC');
    $sth->execute();

    $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

    foreach ($result as $post) {
      $blog[] = array(
        0,
        $post['Post_PK'],
        $post['Post_Content'],
        $post['Post_Rubrik']
      );

      $blog = getComments($post['Post_PK'], $blog, 0);

    }

    return $blog;
  }

  function getComments($parentPK, $blog, $depth) {
    $db = dbconnect();
    // Kolla om föräldern är post eller comment
    if ($depth == 0) {
      $sth = $db->prepare("SELECT * FROM comments WHERE Post_FK = '$parentPK' ORDER BY Comment_PK desc");
    } else if ($depth > 0) {
      $sth = $db->prepare("SELECT * FROM comments WHERE Comment_FK = '$parentPK' ORDER BY Comment_PK desc");
    }
    $sth->execute();

    $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

    $depth = $depth + 1;

    foreach ($result as $comment) {
      $blog[] = array(
        $depth,
        $comment['Comment_PK'],
        $comment['Comment_Content']
      );

      $blog = getComments($comment['Comment_PK'], $blog, $depth);
    }

    return $blog;
  }

?>
