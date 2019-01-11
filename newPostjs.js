$("#submitButtonPost").click(function(){
  console.log("klick på submit");
  console.log("input val " + $("#inputRubrik").val() + " " + $("#inputPostContent").val());
  $.getJSON("newPost.php", {rubrik: $("#inputRubrik").val(), content: $("#inputPostContent").val()},
  function(data){
    console.log(data);
    if (data.contentSent == true) {
      console.log("nypost");
    } else {
      console.log("aspdjk");
    }
  });
});
