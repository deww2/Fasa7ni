function enlargeImage(img) {
  img.style.width = "50px"; // Set the width of the image to a larger value
  img.style.height = "50px"; // Set the height of the image to a larger value
}

function resetImageSize(img) {
  img.style.width = "40px"; // Reset the width of the image to its original size
  img.style.height = "40px"; // Reset the height of the image to its original size
}
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}

function myFunction1() {
  var popup1 = document.getElementById("myPopup1");
  popup1.classList.toggle("show1");
}
function myFunction2() {
  var popup2 = document.getElementById("myPopup2");
  popup2.classList.toggle("show2");
}

function enlargeImage(img) {
  img.style.width = "50px"; // Set the width of the image to a larger value
  img.style.height = "50px"; // Set the height of the image to a larger value
}

function resetImageSize(img) {
  img.style.width = "40px"; // Reset the width of the image to its original size
  img.style.height = "40px"; // Reset the height of the image to its original size
}
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}

function myFunction1() {
  var popup1 = document.getElementById("myPopup1");
  popup1.classList.toggle("show1");
}
function myFunction2() {
  var popup2 = document.getElementById("myPopup2");
  popup2.classList.toggle("show2");
}

/*forms nada */

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

// openContactUsForm():

// This function is intended to make the "ContactUsForm" visible by setting its CSS display property to "block".
// It uses this.document.getElementById("ContactUsForm") to select the HTML element with the ID "ContactUsForm".
// Then it sets the style.display property of the selected element to "block", which makes it visible.
// closeContactUsForm():

// This function is intended to hide the "ContactUsForm" by setting its CSS display property to "none".
// Similar to the previous function, it selects the HTML element with the ID "ContactUsForm".
// Then it sets the style.display property of the selected element to "none", which hides it.
// toggleContactUsPopup():

// This function toggles the visibility of the "ContactUsForm" element. If it's currently hidden, it shows it; if it's currently visible, it hides it.
// It first selects the HTML element with the ID "ContactUsForm".
// Then it checks the current value of the display property of the element. If it's "none", meaning the form is hidden, it changes it to "block" to show the form. If it's not "none", meaning the form is visible, it changes it to "none" to hide the form.

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
// The code waits for the HTML document to fully load.
// It selects the dropdown element with the ID "cuisine-select" and stores it in the variable select.
// It selects all elements with the class "content" and stores them in the variable contents.
// If the dropdown element exists (select is not null or undefined), it sets up an event listener for when the dropdown value changes.
// When the dropdown value changes, it removes the "active" class from all elements with the class "content".
// It retrieves the value of the selected option in the dropdown.
// It finds the element with the ID equal to the selected option value plus "c" (e.g., if the option value is "option1", it looks for an element with the ID "option1c").
// If such an element exists, it smoothly scrolls the viewport to bring it into view.

document.addEventListener("DOMContentLoaded", () => {
  const select = document.querySelector("#nav-select");
  const contents = document.querySelectorAll(".content");

  select.addEventListener("change", () => {
    const targetId1 = select.value.toLowerCase();
    localStorage.setItem("targetId", targetId1);
    window.location.href = "home.php";
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const targetId = localStorage.getItem("targetId");
  const targetContent = document.getElementById(targetId + "c");
  if (targetContent) {
    targetContent.scrollIntoView({ behavior: "smooth" });
  }
  localStorage.removeItem("targetId"); // Clean up localStorage
});

//reservedayuse java 


// It waits for the DOM content to be fully loaded before executing any JavaScript code.
// It selects an element with the ID "nav-select" and stores it in a variable called select. It also selects all elements with the class "content" and stores them in a variable called contents.
// It adds an event listener to the select element. When the value of the select element changes (i.e., when a different option is chosen), it executes a function.
// Inside the function, it converts the selected value to lowercase and stores it in a variable called targetId1. It then stores this value in the browser's localStorage under the key "targetId".
// After storing the value in localStorage, it redirects the window to "home.html".
// Another event listener is added to the document, waiting for the DOM content to be fully loaded.
// Inside this second event listener function, it retrieves the stored value from localStorage under the key "targetId" and stores it in a variable called targetId.
// It then tries to find an element with an ID matching the stored value plus "c" (e.g., if the stored value is "example", it looks for an element with the ID "examplec").
// If such an element is found (targetContent is not null), it smoothly scrolls the page to bring that element into view.
// Finally, it removes the "targetId" from localStorage to clean up after

// nada

// sandra
/*login javascript to popup*/
document.addEventListener("DOMContentLoaded", function () {
  const loginButton = document.getElementById("loginButton");
  const loginPopup = document.getElementById("loginPopup");
  const closeButton = document.getElementById("closeButton");

  loginButton.addEventListener("click", function () {
    loginPopup.style.display = "block";
  });

  closeButton.addEventListener("click", function () {
    loginPopup.style.display = "none"; /*ye2feel*/
  });
});

/*login2 javascript to popup*/
document.addEventListener("DOMContentLoaded", function () {
  const loginButton2 = document.getElementById("loginButton2");
  const loginPopup2 = document.getElementById("loginPopup2");
  const closeButton2 = document.getElementById("closeButton2");

  loginButton2.addEventListener("click", function () {
    loginPopup2.style.display = "block";
  });

  closeButton2.addEventListener("click", function () {
    loginPopup2.style.display = "none";
  });
});
