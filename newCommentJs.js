let commentContainer = document.getElementById('commentContainer');
let replyButtons = document.getElementsByClassName("replybtn");
let fk, typeOfFK, parentDivID, indentation, clickedDiv;

function clickFunction(event) {
  console.log("REPLY TRYCKT" + event.target.name);
  let name = event.target.name;
  let res = name.split(";");

  fk = res[0];
  parentDivID = res[0];
  if (res[1] > 0) {
    typeOfFK = "comment";
  } else {
    typeOfFK = "post";
  }
  commentContainer.style.visibility = "visible";
}

for(var i = 0; i < replyButtons.length; i++) {
  replyButtons[i].addEventListener("click", clickFunction);
}

$("#submitButton").click(function(){
  console.log("klick på submit");
  console.log("input val " + $("#inputComment").val());
  $.getJSON("newComment.php", {content: $("#inputComment").val(), typeOfFK: typeOfFK, fk: fk},
  function(data){
    console.log(data);
    let newIndentation, newDiv, newA, newP;
    if (data.contentSent == true) {
      console.log("inne parentdivid " + parentDivID);

      if (typeOfFK == "comment") {
        clickedDiv = document.getElementById("" + data.fk + "comment");
      } else if (typeOfFK == "post") {
        clickedDiv = document.getElementById("" + data.fk + "post");
      }
      console.log("CLICKED DIV " + clickedDiv);

      if (typeOfFK == "post") {
        newIndentation = 5;
      } else {
        newIndentation = parseFloat(clickedDiv.style.marginLeft) + 5;
      }
      console.log("type " + typeOfFK + " indent " + newIndentation);
      newDiv = document.createElement("div");
      newA = document.createElement("a");
      newP = document.createElement("p");

      newDiv.classList.add("commentWrap");
      newDiv.style.marginLeft = newIndentation +"%";
      newDiv.id = data.pk + "comment";

      newP.innerHTML = data.content;
      newP.classList.add("comment")
      newP.classList.add("commentText");

      newA.classList.add("replybtn");
      newA.setAttribute("name", data.pk + ";" + newIndentation);
      newA.href = "#";
      newA.innerHTML = "Reply";
      newA.addEventListener("click", clickFunction);

      newDiv.appendChild(newP);
      newDiv.appendChild(newA);

      clickedDiv.parentNode.insertBefore(newDiv, clickedDiv.nextSibling);

      commentContainer.style.visibility = "hidden";
    } else {
      console.log("inte inloggad");
    }
  });
});
