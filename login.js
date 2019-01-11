let loginContainer = document.getElementById('loginContainer');
let loginButton = document.getElementById('loginButton');
let loginOutButton = document.getElementById('logOutButton');
let newPostButton = document.getElementById('newPostButton');

loginButton.addEventListener("click", function() {
  loginContainer.style.visibility = "visible";
});

function changeVisibilty() {
  loginContainer.style.visibility = "hidden";
  loginButton.style.display = "none";
  newPostButton.style.visibility = "visible";
}

$("#submitLoginButton").click(function(){
  console.log("klick på submitloginButton");
  $.getJSON("login.php", {username: $("#inputUsername").val(), password: $("#inputPassword").val()},
  function(data){
    console.log(data.login);
    if (data.login == true) {
      console.log("inne");
      changeVisibilty();
    } else {
      console.log("inte inloggad");
    }
  });
});
