<?php

session_start();  // Start the session at the very beginning of the file.

// Check if the login form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    // Placeholder for authentication check logic
    if ($_POST['username'] == 'exampleUser' && $_POST['password'] == 'examplePass') {
        $_SESSION['loggedin'] = true;  // Set session variable
        $_SESSION['username'] = $_POST['username'];  // Store username in session
    } else {
        $_SESSION['loggedin'] = false;  // Failed login attempt
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();  // Destroy session on logout
    unset($_SESSION['username']);
    unset($_SESSION['loggedin']);
    header('Location: login.php');  // Redirect to the login page
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    // Process the enquiry here
    // Access POST data using $_POST['number'] and $_POST['enquiry']
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enquiry'])) {
        echo "Enquiry submitted: " . htmlspecialchars($_POST['enquiry']);
    } else {
        echo "Enquiry field is missing in the form submission.";
    }
} else {
    echo "You must be logged in to submit an enquiry.";
}

// Assuming your database connection is already established
// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username key is set in the $_POST array
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $servername = "localhost";
        $username1 = "root";
        $password = "";
        $dbname = "fas7ni";

        $conn = new mysqli($servername, $username1, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Retrieve password from the form
        $password = $_POST['password'];

        // Perform SQL query to check username and password against the database
        // Replace 'your_table_name' with the actual name of your users table
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

        $result = $conn->query($query);
        if (mysqli_num_rows($result) == 1) {
            // If user exists, retrieve their role
            $user = mysqli_fetch_assoc($result);
            $role = $user['role'];

            // Redirect based on role
            if ($role == 'admin') {
                // Redirect to Admin page
                header("Location: Adminnnn.php");
                exit();
            } elseif ($role == 'customer') {
                // Redirect to Home page
                header("Location: home.php");
                exit();
            }
        } else {

            // If username or password is incorrect, show an error message
            echo "Invalid username or password. Please try again.";

        }
    } else {
        echo "Username is missing in the form submission.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /*kolo in the same box */
        scroll-behavior: smooth;
        /*easier scrolling*/
    }

    header {
        background-color: rgb(18, 26, 68);
        width: 100%;
        position: fixed;
        /*header sabeet*/
        z-index: 999;
        /*header sabeet bardo*/
        display: flex;
        position: relative;
        justify-content: space-between;
        /*space between children in nav*/
        padding: 10px 200px;
        /*spacing between stuff*/

    }

    .logo {
        text-decoration: none;
        color: blue;
        text-transform: uppercase;
        font-weight: 700;
        font-size: 1.8em;
        position: static;
    }

    #loginButtono {
        /* Shakl lel login button */
        padding: 10px 20px;
        background-color: #0FF4FC;
        color: rgb(18, 26, 68);
        border: none;
        border-radius: 5px;
    }

    .navigation a {
        text-decoration: none;
        color: rgb(15, 244, 252);
        text-transform: uppercase;
        font-weight: 500;
        font-size: 1.1em;
        padding-left: 30px;
    }

    .navigation a:hover {
        /*when you hover on the links in the navigation*/
        color: rgb(31, 170, 174);

    }

    section {
        padding: 100px 10px;
    }

    .main {
        width: 100%;
        min-height: 100vh;
        /*a2al value bas momken yezeed*/
        display: flex;
        align-items: center;
        background: url(images/backgroundd.jpg) no-repeat;
        /*image mesh betetkarar*/
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .main p {
        color: rgb(233, 236, 245);
        font-size: 1.2em;
        font-weight: 500;
        margin-left: 15px;
    }

    .main h1 {
        color: white;
        font-size: 1.4em;
        font-weight: 500;


    }

    .main h3 {
        color: aquamarine;
        font-size: 2em;
        font-weight: 700;
        letter-spacing: 1px;
        margin-top: -250px;
        margin-bottom: 30px;
    }

    .mainbtn {
        color: aliceblue;
        background-color: blue;
        text-decoration: none;
        font-size: 1.1em;
        font-weight: 600;
        display: inline-block;
        padding: 0.9375em 2.1875em;
        letter-spacing: 1px;
        border-radius: 15px;
        /*curved edges*/
        margin-bottom: 40px;

    }

    .mainbtn:hover {
        /*when i hover over button*/
        background-color: aquamarine;
        transform: scale(1.1);
        /*yekbar lama a-hover*/
    }

    .contactus {
        color: aliceblue;
        font-size: 1.7em;
        padding-right: 30px;
    }

    .title {
        display: flex;
        justify-content: center;
        color: blue;
        font-size: 2.2em;
        font-weight: 800;
        margin-bottom: 30px;

    }

    .content {
        display: flex;
        justify-content: center;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .card {
        background-color: aliceblue;
        width: 21.25em;
        box-shadow: 0 5px 25px rgba(1 1 1/30%);
        border-radius: 10px;
        padding: 25px;
        margin: 15px;
    }

    .card:hover {
        transform: scale(1.1);
    }


    .quickoutings h3 {
        color: blue;
        font-size: 1.2em;
        font-weight: 700;
        text-align: center;
        margin: 10px;
    }

    .romantic h3 {
        color: blue;
        font-size: 1.2em;
        font-weight: 700;
        text-align: center;
        margin: 10px;
    }



    .footer-container {
        display: flex;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-section {
        flex: 1;
    }

    .footer-section h3 {
        font-size: 18px;
        margin-bottom: 10px;

    }

    .footer-section ul {
        list-style: none;
        padding: 0;
    }

    .footer-section ul li {
        margin-bottom: 5px;
    }

    .footer-section ul li a {
        color: rgb(15, 244, 252);
        text-decoration: none;
        text-decoration: underline;
    }

    .social-icons {
        display: flex;
    }

    .social-icons li {
        margin-right: 10px;
    }

    .social-icons li:last-child {
        margin-right: 0;
    }

    .social-icons li a img {
        width: 30px;
        height: auto;
    }


    .footerbtngroup {
        flex-direction: column;
    }

    .footerbtn {
        color: aliceblue;
        background-color: rgb(0, 95, 211);
        text-decoration: none;
        font-size: 1.1em;
        font-weight: 600;
        display: block;
        padding: 0.9375em 0.1875em;
        letter-spacing: 1px;
        border-radius: 15px;
        margin-bottom: 20px;
        width: 60%;


    }

    .footer {
        display: flex;
        flex-direction: row;
        background-color: rgb(18, 26, 68);
        color: rgb(15, 244, 252);
        max-height: auto;
    }

    .footerbtn:hover {
        background-color: #0FF4FC;
        transform: scale(1.1);
    }

    /* ADD FROM HEREEEEE */
    /*form subscribe*/

    .Form-popup {
        display: none;
        position: fixed;
        transition: .5s ease;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        border: 1px solid rgb(0, 0, 0);
        background-color: antiquewhite;
        border-radius: 10px;
        z-index: 1;
        height: 550px;
        box-shadow: 0px 10px 60px black;

    }

    .Form-container {
        max-width: 370px;
        padding: 10px;
        background-color: transparent;
    }

    .Form-container h1 {
        position: relative;
        width: 90%;
        margin: 0px 0;
        font-weight: 600;
        opacity: 0.8;
    }

    .Closebtnn {
        position: relative;
        width: 10%;
        font-size: 15px;
        background-color: transparent;
        border: 0;
        opacity: 0.6;
        float: right;

    }

    .Closebtnn:hover {
        transition: linear 200ms;
        color: red;
    }

    .Form-container input[type=name],
    .Form-container input[type=email],
    .Form-container input[type=password],
    .Form-container input[type=date],
    .Form-container input[type=text],
    .Form-container input[type=number] {
        width: 90%;
        padding: 20px;
        margin: 5px 0 10px 0;
        border: none;
        border-radius: 5px;
        background: #f1f1f1;
    }


    .Form-container input[type=name]:focus,
    .Form-container input[type=email]:focus,
    .Form-container input[type=password]:focus,
    .Form-container input[type=date]:focus,
    .Form-container input[type=text]:focus,
    .Form-container input[type=number]:focus {
        outline: 1px solid blue;
    }

    .Form-container .Formbtn {
        background-color: rgb(0, 0, 0);
        color: white;
        padding: 16px 10px;
        border: none;
        border-radius: 5px;
        width: 90%;
    }

    .Form-container hr {
        display: inline-flex;
        vertical-align: middle;
        margin: 25px 10px;
        width: 35%;
    }

    .Form-container .Formbtn:hover,
    .open-button:hover {
        opacity: 1;
        background-color: rgb(255, 0, 174);
        transform: scale(1.1);
    }


    .forminputs {

        margin-top: 40%;
    }

    .headerr {
        background: linear-gradient(to left, #dd5e89, #f7bb97);
        width: 100%;
        height: 40px;


    }



    .restaurant-image {
        width: 200px;
        height: 200px;
        margin: 10px
    }

    .restaurant-description {
        margin-left: 20px;
        font-size: 10px;
        flex: 1;
        padding: 20px;
    }

    .restaurant-name {
        margin: 0;
        margin-bottom: 10px;
    }



    .star {
        width: 100px;
        height: 30px;
        margin-top: 10px;
    }


    .customer-review {
        display: flex;
        height: 100;
        width: 500;
        box-shadow: 0 5px 25px rgba(1 1 1/30%);
        border-radius: 10px;
        border-color: rgb(0, 0, 0);
        border-style: ridge;
        padding: 25px;

        align-items: stretch;
        height: auto;
        margin-top: 20px;
        flex-direction: row;
        width: 100%;
    }

    .customer-info {
        /* Styling for the customer information container */
        display: flex;
        align-items: center;
        flex-direction: coloumn;


    }

    .customer-img {
        display: flex;
        width: 40px;
        height: 40px;
        margin: 10px;

    }

    .customer-name {
        flex-direction: column;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .customer-description {
        font-size: 10px;
        position: absolute;
        flex-direction: column;
    }




    .contact-info {
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 5px;
    }

    .contact-info h2 {
        margin-top: 0;
    }

    .contact-info p {
        margin-bottom: 5px;
    }

    .contact-info a {
        text-decoration: none;
        color: #0066cc;
    }




    .review-container {
        display: flex;
        flex-direction: row-reverse;
        gap: 20px;
        white-space: nowrap;
        /* Prevents wrapping to next line */
    }

    .review {
        border: 2px solid rgb(228, 140, 78);
        padding: 20px;
        display: inline-block;
        /* Display inline-block */
        margin-right: 20px;
        /* Add some space between reviews */
        color: #a36060;
        /* Color for text */
        width: fit-content
            /* Stretch the border to fill the entire width */
    }

    .customer-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #333;
        /* Color for customer name */
    }

    .customer-info h3 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #cb5a25;
    }

    .rating div {
        font-size: 20px;
        color: #cb5a25;
    }

    .review-text p {
        margin-top: 10px;
        color: #b66161;
        /* Color for text */
    }



    .sokhnaborder-container {
        display: flex;
        flex-direction: column;
        gap: 100px;
    }

    .sokhnaborder {
        border: 4px solid rgb(217, 190, 153);
        padding: 10px;
        display: flex;
        text-align: center;
        transition: border-color 0.3s;
        /* Add transition for smooth effect */

    }

    .sokhnaborder:hover {
        border-color: rgb(255, 106, 0);
    }

    .sokhnaborder img {
        max-width: 100%;
        margin-right: 20px;
        /* Add margin to the right */
    }

    .sokhnacontent {
        flex: 1;
        /* Take up remaining space */
    }




    .map-location {
        margin-right: 60px;
    }


    .restaurant-details {
        margin-right: 50px;
    }





    .Sokhna-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
        box-shadow: 0 5px 25px rgba(1 1 1/30%);
        border-radius: 10px;
        position: static;
        overflow: hidden;
        /* Prevent image overflow */
        max-width: 800px;
        /* Limit container width */
        margin: auto;
        /* Center the container */
        margin-top: 20px;
        margin-bottom: 20px;

    }

    /* CSS styles for the photo container */
    .photo-container {
        border: 2px solid #333;
        /* Border around the photo container */
        padding: 10px;
        /* Padding inside the container */
        text-align: center;
    }

    /* CSS styles for the photos */
    .photo-container img {
        display: inline-block;
        /* Ensure each photo is displayed as a block-level element */
        margin: 5px;
        /* Center-align each photo horizontally */
        max-width: 100%;
        /* Ensure each photo does not exceed the width of its container */
        height: auto;
        /* Maintain the aspect ratio of each photo */
        padding: 5px;
        /* Add padding around each photo */
    }

    .icon-container {
        text-align: left;
        margin-right: 30px;
    }

    .icon-container:hover {
        transform: scale(1.1);
    }

    .icon-container a {
        display: inline-block;
        margin: 30px;
    }

    .icon-container img {
        width: 50px;
        /* Adjust size as needed */
        height: 50px;
        /* Adjust size as needed */
        cursor: pointer;
        margin: 50px;
    }


    .restaurantt-container {
        /* display: flex; */
        /* align-items: center; */
        justify-content: space-between;

        box-shadow: 0 5px 25px rgba(1 1 1/30%);
        border-radius: 10px;
        position: static;
        overflow: hidden;
        /* Prevent image overflow */
        max-width: 2500px;
        /* Limit container width */
        /* margin: auto; Center the container */
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 30px;
        display: flex;
        align-items: flex-start;
        width: 80%;
    }

    .restaurantt-container:hover {
        transform: scale(1.1);
    }

    .slider-container {
        width: 80%;
        /* Set width of the slider container */
        margin: 0 auto;
        /* Center the slider container horizontally */
        overflow: hidden;
        /* Hide overflow content */
    }

    .slider {
        display: flex;
        /* Use flexbox for slider */
        transition: transform 2s ease;
        /* Smooth transition for sliding effect */
    }

    .customer-review {
        flex: 0 0 100%;
        /* Ensure each review takes up the full width */
        padding: 20px;
        /* Add padding for spacing */
    }

    .previous-trips {
        max-height: 200px;
        /* Set maximum height to limit the number of visible trips */
        overflow: hidden;
        /* Hide overflow */
    }

    .trips {
        margin-top: 10px;
        /* Add spacing between trips */
    }

    .trip {
        margin-bottom: 5px;
        /* Add spacing between trips */
    }


    .previous-trips-container {
        border: 1px solid #ccc;
        /* Border style */
        padding: 10px;
        /* Add padding inside the border */
        max-height: 400px;
        /* Set maximum height to limit the visible area */
        overflow: hidden;
        /* Hide overflow */
    }



    #scrollToTopBtn {
        display: none;
        /* Hide the button by default */
        position: fixed;
        /* Fixed position so it remains visible while scrolling */
        bottom: 20px;
        /* Distance from the bottom of the viewport */
        right: 20px;
        /* Distance from the right side of the viewport */
        z-index: 9999;
        /* Ensure the button is on top of other elements */
        background-color: #0e2f92;
        /* Button background color */
        color: #fff;
        /* Button text color */
        border: none;
        /* Remove button border */
        border-radius: 5px;
        /* Add border radius for rounded corners */
        cursor: pointer;
        /* Change cursor to pointer on hover */
        /*padding: 10px 20px; /* Add padding for button size */
        padding: 5px 10px;
        /* Adjust padding to make the button smaller */
        font-size: 14px;
        /* Decrease font size for smaller text */
    }

    #scrollToTopBtn:hover {
        background-color: #9d4de3;
        /* Change background color on hover */
    }

    video {
        max-width: 100%;
        /* Ensure the video scales responsively */
        height: auto;
        /* Maintain aspect ratio */
    }

    /* Basic styling for the add review and ask question  buttons */
    button {
        padding: 10px 20px;
        margin-right: 10px;
        background-color: #07245c;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #55229d;
    }


    body {
        background-image: url('images/backgrnd2.jpg');
        background-repeat: repeat;
        background-size: auto 100%;
    }

    .reserve-button {
        float: right;
        margin-top: 10px;
        padding: 8px 20px;
        background-color: #20176d;
        color: #fff9f9;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        margin-left: 30px;
    }

    .reserve-button:hover {
        background-color: #7f12d2;
    }

    .icon-container {
        text-align: center;
        margin-right: 20px;
    }

    .icon-container:hover {
        transform: scale(1.1);
    }

    .icon-container a {
        display: inline-block;
        margin: 5px;
    }

    .icon-container img {
        width: 50px;
        /* Adjust size as needed */
        height: 50px;
        /* Adjust size as needed */
        cursor: pointer;
        margin: 5px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Set initial index
        let currentIndex = 0;

        // Function to slide the reviews
        function slideReviews() {
            const sliderWidth = $('.slider').width();
            $('.slider').css('transform', `translateX(-${currentIndex * sliderWidth}px)`);
        }

        // Automatically slide the reviews every 5 seconds
        setInterval(function () {
            currentIndex = (currentIndex + 1) % 3;
            slideReviews();
        }, 5000);

        // Initial slide
        slideReviews();
    });

    /* scroll to top button*/
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("scrollToTopBtn").style.display = "block";
        } else {
            document.getElementById("scrollToTopBtn").style.display = "none";
        }
    }

    function scrollToTop() {
        document.body.scrollTop = 0; /* For Safari */
        document.documentElement.scrollTop = 0; /* For Chrome, Firefox, IE and Opera */
    }
    // /*   add review and ask question  button*/
    document.getElementById("addReviewBtn").addEventListener("click", function () {
        //         // Replace this action for adding a review
        alert("Redirecting to add review page...");

    });

    document.getElementById("askQuestionBtn").addEventListener("click", function () {
        //         // Replace this action for asking a question
        alert("Redirecting to ask a question page...");

    });



    //signupform

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

</script>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <title>Day Use</title>

</head>


<script>
    document.getElementById('loginButton').addEventListener('click', function () {
        document.getElementById('loginPopup').style.display = 'block';
    });
    document.getElementById('closeButton').addEventListener('click', function () {
        document.getElementById('loginPopup').style.display = 'none';
    });
</script>

</head>

<body>
    <header>
        <a href="home.php" class="logo"><img src="images/logo.jpg" style="width: 100px; 
      , margin-right: 200pxfloat: left; 
  margin-right: 10px;height: 70px;"></img></a>
        <nav class="navigation">
            <label for="Category" style="
            color: rgb(15, 244, 252);
            text-transform: uppercase;
            font-weight: 500;
            font-size: 1.1em;
            padding-left: 30px;
          ">Categories:
            </label>
            <select id="nav-select">
                <option id="categoriesc" value="Categories">Categories</option>
                <option id="resturantsc" value="Restaurants">Restaurants</option>
                <option id="activitiessc" value="Activities">Activities</option>
                <option id="dayuseec" value="DayUse">DayUse</option>
            </select>

            <a href="about us.php">About us</a>
            <button id="loginButtono" onclick="toggleContactUsPopup()" class="navi-links">
                Contact Us
            </button>
            <!-- Button to open popup -->
            <div class="Form-popup" id="ContactUsForm">
                <form class="Form-container">
                    <button type="button" class="Closebtnn" onclick="closeContactUsForm()">
                        Close
                    </button>
                    <h1>Contact Us</h1>
                    <input type="name" placeholder="Name" class="Form-container" name="name" required />

                    <input type="email" placeholder="Email" class="Form-container" name="email" required />
                    <input type="number" placeholder="Phone Number" class="Form-container" name="number" required />
                    <input height="100px" type="text" placeholder="Write your enquiry here " class="Form-container"
                        name="enquiry" required /><br /><br />
                    <input type="checkbox" /><span>by mail</span>
                    <input type="checkbox" /><span>by phone number</span>
                    <button type="submit" class="Formbtn">Submit enquiry</button>
                </form>
            </div>
            <!-- Conditionally display user info or login button -->
            <!-- <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                <a href="?logout=true">Logout</a>
            <?php else: ?>
                <button id="loginButton">Login</button>
            <?php endif; ?> -->
            <!--log out-->
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <!-- If user is logged in, show logout button -->
                <form method="GET">
                    <button type="submit" id="loginButton" name="logout" value="true">Logout</button>
                </form>
            <?php else: ?>

                <!--log out-->
                <!-- If user is not logged in, show login button -->
                <button id="loginButton">Login</button>
            <?php endif; ?>
            <!-- End of session check -->
            <div id="loginPopup" style="display:none;">
                <form method="POST">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <button type="submit">Login</button>
                    <button type="button" id="closeButton">Close</button>
                </form>
            </div>

        </nav>
    </header>
</body>