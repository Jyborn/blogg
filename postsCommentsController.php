<?php

  require 'getPostsCommentsModel.php';
  require 'showPostsCommentsView.php';

  function getblogContent() {
    $blog = getPosts();
    showPostsComments($blog);
  }

?>
