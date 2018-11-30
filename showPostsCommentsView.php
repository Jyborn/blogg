<?php

  function showPostsComments($content) {

    /*
      Tre positoner i arrayen hör ihop för varje kommentar eller post.
      $content[$i] = texten
      $content[$i + 1] = djup i trädstrukturen
      $content[$i + 2] = pk
      $content[$i + 3] = post rubrik (är bara posts som har denna)
    */
    for ($i = 1; $i < count($content); $i += $hopp) {
      $indentation = $content[$i + 1] * 5;
      $pk = $content[$i + 2];

      if ($content[$i + 1] > 0) {
        $hopp = 3;
        echo<<<COMMENT
          <div class=commentWrap id={$pk}comment style="margin-left:{$indentation}%;">
            <p class="commentText">{$content[$i]}</p>
            <a class="replybtn" href="#" name={$pk};{$indentation}>Reply</a>
          </div>
COMMENT;
      } else {
        $hopp = 4; //posts har 1 plats mer i arrayen alltså behövs ett längre hopp i loopen
        echo<<<POST
          </div>
          <div class=wrapper>
            <div class=postWrap id={$pk}post>
              <h1 class="postRubrik">{$content[$i + 3]}</h1>
              <p class="postText" style="margin-left:{$indentation}px;">{$content[$i]} </p>
              <a class="replybtn" href="#" name={$pk};{$indentation}>Comment</a>
            </div>
POST;
      }
    }
  }

?>
