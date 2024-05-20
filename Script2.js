
/*Sandra Javascript and Jquery */

/*validation of email*/ 
function validateForm() {
    /* name = document.getElementById('nameInput').value;*/
     email = document.getElementById('emailInput').value;
     subscribeArray = ["Email correct" , "Please use a valid email."];
     if (email == "") {
       alert("Email Couldn't be empty!");
      /* event.preventDefault();*/
     }
     if (email.search("@") == -1 || email.search(".") == -1) {
       document.getElementById('subscription').innerHTML = subscribeArray[1];
       document.getElementById('subscription').style.fontSize = "30px";
       document.getElementById('subscription').style.color = "red";
       event.preventDefault();
     }
 }

 
/*scrollup jquery*/ 
/*$("#scrollUp").click(()=>{
    
    $('html, body').animate({scrollTop: 0}, '300');
});*/


$("#scrollUp").click(() => {
  if (!$(event.target).closest('footer').length) {
      $('html, body').animate({scrollTop: 0}, '300');
  }
});

/*login javascript to popup*/
document.addEventListener('DOMContentLoaded', function() {
  const loginButton = document.getElementById('loginButton');
  const loginPopup = document.getElementById('loginPopup');
  const closeButton = document.getElementById('closeButton');

  loginButton.addEventListener('click', function() {
      loginPopup.style.display = 'block';
  });

  closeButton.addEventListener('click', function() {
      loginPopup.style.display = 'none'; /*ye2feel*/ 
  });
});

/*login2 javascript to popup*/
document.addEventListener('DOMContentLoaded', function() {
  const loginButton2 = document.getElementById('loginButton2');
  const loginPopup2 = document.getElementById('loginPopup2');
  const closeButton2 = document.getElementById('closeButton2');

  loginButton2.addEventListener('click', function() {
      loginPopup2.style.display = 'block';
  });

  closeButton2.addEventListener('click', function() {
      loginPopup2.style.display = 'none';
  });
});

/*permanently hidden p/description*/
$("#button2").click(function(){
  $(this).closest('.ActContent2').find('p').hide(1000);
  alert("The paragraph will permanently be hidden.");
});

/*temporarly hidden p/description*/
$("#button").click(function(){
  $(this).closest('.ActContent2').find('p').fadeToggle();
  alert("Click on the button again if you want to view the description again.");
});
/*
$(document).ready(function(){
  $("#button2").click(function(){
    $("p").hide(1000);
    alert("The paragraph will permanently be hidden.");
  });
});*/

/* to hide and unhide the p element*/ 
/*$("#button").click(function(){
  $("p").fadeToggle();
  alert("Click on the button again if you want to view the description again.");
}); */


/*slideshow*/
var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 2000); // image every 2 sec btetghaiar
  } 


  var slideIndex2 = 0;
  showSlides2();

  function showSlides2() {
    var i;
    var slides = document.getElementsByClassName("mySlides2");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex2++;
    if (slideIndex2 > slides.length) {slideIndex2 = 1}
    slides[slideIndex2-1].style.display = "block";
    setTimeout(showSlides2, 2000); // image every 2 sec btetghaiar
  } 

  var slideIndex3 = 0;
  showSlides3();

  function showSlides3() {
    var i;
    var slides = document.getElementsByClassName("mySlides3");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex3++;
    if (slideIndex3 > slides.length) {slideIndex3 = 1}
    slides[slideIndex3-1].style.display = "block";
    setTimeout(showSlides3, 2000); // image every 2 sec btetghaiar
  } 


  var slideIndex4 = 0;
  showSlides4();

  function showSlides4() {
    var i;
    var slides = document.getElementsByClassName("mySlides4");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex4++;
    if (slideIndex4 > slides.length) {slideIndex4 = 1}
    slides[slideIndex4-1].style.display = "block";
    setTimeout(showSlides4, 2000); // image every 2 sec btetghaiar
  } 

  function openSubscribeForm() {
    this.document.getElementById("SubscribeForm").style.display = "block";
  }
  function closeSubscribeForm() {
    this.document.getElementById("SubscribeForm").style.display = "none";
  }
  
  function toggleSubscribePopup() {
    var popup = document.getElementById("SubscribeForm");
    if (popup.style.display === "none") {
      // Check current display state
      popup.style.display = "block"; // Show popup if it's hidden
    } else {
      popup.style.display = "none"; // Hide popup if it's visible
    }
  }
  
  function openSignUpForm() {
    this.document.getElementById("SignUpForm").style.display = "block";
  }
  function closeSignUpForm() {
    this.document.getElementById("SignUpForm").style.display = "none";
  }
  
  function toggleSignUpPopup() {
    var popup = document.getElementById("SignUpForm");
    if (popup.style.display === "none") {
      // Check current display state
      popup.style.display = "block"; // Show popup if it's hidden
    } else {
      popup.style.display = "none"; // Hide popup if it's visible
    }
  }
  
  function openContactUsForm() {
    this.document.getElementById("ContactUsForm").style.display = "block";
  }
  function closeContactUsForm() {
    this.document.getElementById("ContactUsForm").style.display = "none";
  }
  
  function toggleContactUsPopup() {
    var popup = document.getElementById("ContactUsForm");
    if (popup.style.display === "none") {
      // Check current display state
      popup.style.display = "block"; // Show popup if it's hidden
    } else {
      popup.style.display = "none"; // Hide popup if it's visible
    }
  }
  
  // script.js
  document.addEventListener("DOMContentLoaded", () => {
    const select = document.querySelector("#cuisine-select");
    const contents = document.querySelectorAll(".content");
    if (select) {
      select.addEventListener("change", () => {
        contents.forEach((content) => content.classList.remove("active"));
        const targetId = select.value;
        const targetContent = document.getElementById(targetId + "c"); // Get the corresponding h2 element by adding 'c' to the targetId
        if (targetContent) {
          targetContent.scrollIntoView({ behavior: "smooth" }); // Scroll to the target content if it exists
        }
      });
    }
  });
  
  document.addEventListener("DOMContentLoaded", () => {
    const select = document.querySelector("#nav-select");
    const contents = document.querySelectorAll(".content");
  
    select.addEventListener("change", () => {
      const targetId1 = select.value.toLowerCase();
      localStorage.setItem("targetId", targetId1);
      window.location.href = "home.html";
    });
  });