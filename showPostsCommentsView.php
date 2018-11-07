<?php

  function showPostsComments($content) {

    /*
      Tre positoner i arrayen hör ihop för varje kommentar eller post.
      $content[$i] = texten
      $content[$i] = djup i trädstrukturen
      $content[$i] = pk
    */
    for ($i = 1; $i < count($content); $i += 3) {
      $indentation = $content[$i + 1] * 5;
      $pk = $content[$i + 2];

      if ($content[$i + 1] > 0) {
        echo<<<COMMENT
          <div class=commentWrap id={$pk}comment style="margin-left:{$indentation}%;">
            <p class="commentText">{$content[$i]}</p>
            <a class="replybtn" href="#" name={$pk};{$indentation}>Reply</a>
          </div>
COMMENT;
      } else {
        echo<<<POST
          </div>
          <div class=wrapper>
            <div class=postWrap id={$pk}post>
              <p class="postText" style="margin-left:{$indentation}px;">{$content[$i]} </p>
              <a class="replybtn" href="#" name={$pk};{$indentation}>Comment</a>
            </div>
POST;
      }
    }
  }

?>
