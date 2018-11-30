let fk, typeOfFK, parentDivID, indentation, clickedDiv, popup;

function clickFunction(event) {
  popup = document.getElementById('commentPopUpContainer');
  let btnName = event.target.name;
  let res = btnName.split(";");

  fk = res[0];
  parentDivID = res[0];
  if (res[1] > 0) {
    typeOfFK = "comment";
  } else {
    typeOfFK = "post";
  }

  popup.classList.add("open");

}

let replyButtons = document.getElementsByClassName("replybtn");
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

      let newDiv = createNewDiv(data.pk, newIndentation, data.content);

      clickedDiv.parentNode.insertBefore(newDiv, clickedDiv.nextSibling);

      popup.classList.remove("open");
    } else {
      console.log("inte inloggad");
    }
  });
});

function createNewDiv(pk, indentation, content) {
  newDiv = document.createElement("div");
  newA = document.createElement("a");
  newP = document.createElement("p");

  newDiv.classList.add("commentWrap");
  newDiv.style.marginLeft = indentation +"%";
  newDiv.id = pk + "comment";

  newP.innerHTML = content;
  newP.classList.add("comment")
  newP.classList.add("commentText");

  newA.classList.add("replybtn");
  newA.setAttribute("name", pk + ";" + indentation);
  newA.href = "#";
  newA.innerHTML = "Reply";
  newA.addEventListener("click", clickFunction);

  newDiv.appendChild(newP);
  newDiv.appendChild(newA);

  return newDiv;
}
