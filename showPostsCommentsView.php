<?php

  function showPostsComments($content) {

    foreach ($content as $row) {
      $indentation = $row[0] * 5;
      $pk = $row[1];
      $content = $row[2];

      if ($indentation > 0) {
        echo<<<COMMENT
           <div class=commentWrap id={$pk}comment style="margin-left:{$indentation}%;">
            <p class="commentText">{$content}</p>
            <a class="replybtn" href="#" name={$pk};{$indentation}>Reply</a>
            </div>
COMMENT;
      } else {
        $rubrik = $row[3];
        echo<<<POST
          </div>
          <div class=wrapper>
            <div class=postWrap id={$pk}post>
              <h1 class="postRubrik">{$rubrik}</h1>
              <p class="postText" style="margin-left:{$indentation}px;">{$content} </p>
              <a class="replybtn" href="#" name={$pk};{$indentation}>Comment</a>
            </div>
POST;
      }
    }
  }

?>
