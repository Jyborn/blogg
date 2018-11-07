<?php
  function commentPopUp() {

    echo<<<COMMENT

<div id="commentContainer" style="visibility: hidden;">
  <div class="container">
    <div class="comment-form">
      <div class="main-div">
        <input type="text" name="comment" class="form-control" id="inputComment" placeholder="Text..">

        <button id="submitButton" type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>


COMMENT;
  }

?>
