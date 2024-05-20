<?php
session_start();



// Check if logout parameter is set in the URL
if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    // Unset all session variables
    $_SESSION = array();
    // Destroy the session
    session_destroy();
    // Redirect to login page or any other desired page
    header("Location: home.php");
    exit;
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

  // Set session variables
  $_SESSION['loggedin'] = true;
  $_SESSION['username'] = $username;
  $_SESSION['role'] = $role;



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

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="Style.css" />
    <script src="javascriptfile.js"></script>
    <title>Family Outings</title>
    <style>
        body {
            background-image: url("images/backgrnd2.jpg");
            background-repeat: no-repeat;
            background-size: auto 100%;
        }

        .accordion-item {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .accordion-item .accordion-header {
            padding-left: 47%;
            background-color: #f8f9fa;
            cursor: pointer;
        }

        .accordion-item .accordion-header:hover {
            background-color: #e9ecef;
        }

        .accordion-item .accordion-header::before {
            content: '\002B';
            float: right;
            margin-left: 5px;
        }

        .accordion-item.active .accordion-header::before {
            content: '\2212';
        }

        .accordion-item .accordion-body {
            padding: 5px;
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <a href="home.php" class="logo"><img src="images/logo.jpg" style = "width: 100px; 
      , margin-right: 200pxfloat: left; 
  margin-right: 10px;height: 70px;" ></img></a>
        
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
            &nbsp;&nbsp;
            
<!--log out-->
 <!-- Check if user is logged in -->
 <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
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

</html>

</html>

</html>