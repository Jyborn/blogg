<?php

  require 'getPostsCommentsModel.php';
  require 'showPostsCommentsView.php';

  function getblogContent() {
    $blog[] = array();
    $blog = getPosts($blog);
    showPostsComments(array_filter($blog));
  }

?>
