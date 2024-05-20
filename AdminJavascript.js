/*Sandra Admin javascript */

$("#scrollUp").click(() => {
  if (!$(event.target).closest("footer").length) {
    $("html, body").animate({ scrollTop: 0 }, "300");
  }
});
document.addEventListener("DOMContentLoaded", function () {
  const loginButton = document.getElementById("loginButton");
  const loginPopup = document.getElementById("loginPopup");
  const closeButton = document.getElementById("closeButton");

  loginButton.addEventListener("click", function () {
    loginPopup.style.display = "block";
  });

  closeButton.addEventListener("click", function () {
    loginPopup.style.display = "none";
  });
});

// data for showing the functionality of populateform
var activities = {
  padel: {
    name: "Padel",
    description: "Padel is like the fun-sized version of tennis",
    location: "Nady Shams Padel court",
  },
  hiking: {
    name: "Hiking",
    description:
      "Hiking mountains is like unlocking nature's own secret stairway to the sky",
    location: "Sinai Trail",
  },
  kayaking: {
    name: "Kayaking",
    description: "Embark on a thrilling adventure with kayaking!",
    location: "Sun Pyramid's Tours",
  },
  pyramids: {
    name: "Pyramid's Visit",
    description:
      "Embark on an exciting adventure to explore the Pyramids like never before!",
    location: "150LE",
  },
};

// btemla elform based on what i selected
function populateForm() {
  var activitySelect = document.getElementById("editactivityselect");
  var selectedActivity = activitySelect.value.toLowerCase();

  var activityDetails = activities[selectedActivity];

  document.getElementById("editactivityname").value = activityDetails.name;
  document.getElementById("editactivitydescription").value =
    activityDetails.description;
  document.getElementById("editactivitylocation").value =
    activityDetails.location;
}

// for elsaving changes lel existing activity
function saveChanges() {
  //elvalue of each
  var selectedActivity = document.getElementById("editactivityselect").value;
  var description = document.getElementById("editactivitydescription").value;
  var location = document.getElementById("editactivitylocation").value;

  // Update activity details
  activities[selectedActivity].description = description;
  activities[selectedActivity].location = location;

  // testing
  console.log("Changes saved for activity: " + selectedActivity);
  console.log("Updated Description: " + description);
  console.log("Updated Location: " + location);

  alert("Changes saved successfully!");
}

// to delete existing activity
function deleteActivity() {
  var selectedActivity = document.getElementById("editactivityselect").value;
  if (
    confirm(
      "Are you sure you want to delete the " + selectedActivity + " activity?"
    )
  ) {
    delete activities[selectedActivity];
    alert(selectedActivity + " activity has been deleted!");
    // bamsah elvalues
    document.getElementById("edit-activity-description").value = "";
    document.getElementById("edit-activity-location").value = "";
  }
}

// to add a new activity
function addActivity() {
  var newActivityName = document.getElementById("newactivityname").value;
  var newActivityDescription = document.getElementById(
    "newactivitydescription"
  ).value;
  var newActivityLocation = document.getElementById(
    "newactivitylocation"
  ).value;

  // to add a new activity lel activity objects
  activities[newActivityName.toLowerCase()] = {
    name: newActivityName,
    description: newActivityDescription,
    location: newActivityLocation,
  };

  alert("New activity added successfully!");

  // bnemsah elabl keda so i can add another activity
  document.getElementById("newactivityname").value = "";
  document.getElementById("newactivitydescription").value = "";
  document.getElementById("newactivitylocation").value = "";
}

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
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image kool 2 seconds
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
  if (slideIndex2 > slides.length) {
    slideIndex2 = 1;
  }
  slides[slideIndex2 - 1].style.display = "block";
  setTimeout(showSlides2, 2000); // Change image kool 2 seconds
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
  if (slideIndex3 > slides.length) {
    slideIndex3 = 1;
  }
  slides[slideIndex3 - 1].style.display = "block";
  setTimeout(showSlides3, 2000); // Change image kool 2 seconds
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
  if (slideIndex4 > slides.length) {
    slideIndex4 = 1;
  }
  slides[slideIndex4 - 1].style.display = "block";
  setTimeout(showSlides4, 2000); // Change image kool 2 seconds
}

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
