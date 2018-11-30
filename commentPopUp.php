<?php
  function commentPopUp() {

    echo<<<COMMENT
        <div id="commentPopUpContainer">
          <input type="text" name="comment" class="form-control" id="inputComment" placeholder="Text..">

          <button id="submitButton" type="button" class="btn btn-primary">Submit</button>
        </div>

COMMENT;
  }

?>
