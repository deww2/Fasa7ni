<?php




// Check if logout parameter is set in the UR
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
    <link rel="stylesheet" href="Style.css" />
    <script src="javascriptfile.js"></script>
    <title>Homepage</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-image: url('images/bckgrnd.jpg');
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        height: 100vh;
    }

    h2 {
        margin-top: 100px;
    }

    form {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        padding: 8px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 8px;
        border-bottom: 1px solid #ccc;
    }

    th {
        background-color: #f2f2f2;
        text-align: center;
        margin-top: 150px;
    }
</style>

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
            <a href="#">Contact us</a>
            <a href="#">LogIn </a>
        </nav>
    </header>
    <section class="main">
        <div>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Admin Dashboard</title>
                <link rel="stylesheet" href="styles.css">
            </head>