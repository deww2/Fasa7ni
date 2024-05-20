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
<header>
    <a href="home.php" class="logo"><img src="images/logo.jpg" style="width: 100px; 
      , margin-right: 200pxfloat: left; 
  margin-right: 10px;height: 70px;"></img></a>
    <nav class="navigation">


        <label for="Category" style="color: rgb(15, 244, 252);text-transform:uppercase;
           font-weight:500;
           font-size: 1.1em;
           padding-left: 30px;">Categories: </label>
        <select onchange="window.location.href=this.value;">

            <option value="Restaurants">Restaurants</option>

            <option value="Activities">Activities</option>


            <option value="Day Use">Alexandria</option>

        </select>


        <a href="about us.php">About us</a>
        &nbsp; <button id="loginButtono" onclick="toggleContactUsPopup()" class="navi-links">
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
        &nbsp;&nbsp;
        <!--log out-->
        <!-- Check if user is logged in -->
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
        <div id="loginPopup">
            <form>
                <h2>Login</h2><br>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Login</button>
                <button type="button" id="closeButton">Close</button>
            </form>
        </div>
    </nav>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <title>Activities page</title>
</header>