function validateForm() {
   /* name = document.getElementById('nameInput').value;*/
    email = document.getElementById('emailInput').value;
    subscribeArray = ["Thank you for subscribing to Sleek" , "You can not subscribe. Please use a valid email."];
    if (email == "") {
      alert("Email or name Couldn't be empty!");
      event.preventDefault();
    }
    if (email.search("@") == -1 || email.search(".") == -1) {
      document.getElementById('subscription').innerHTML = subscribeArray[1];
      document.getElementById('subscription').style.fontSize = "40px";
      document.getElementById('subscription').style.color = "red";
    }else {
      document.getElementById('subscription').innerHTML = subscribeArray[0];
      document.getElementById('subscription').style.fontSize = "30px";
      document.getElementById('subscription').style.color = "green";
    }
    event.preventDefault();
}