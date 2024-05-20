<?php
//session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Ensure session_start is at the beginning to avoid header issues

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fname = isset($_POST["fname"]) ? $_POST["fname"] : 'default_fname';
    $lname = isset($_POST["lname"]) ? $_POST["lname"] : 'd_lnamee';
    $email = isset($_POST["email"]) ? $_POST["email"] : 'd_e';
    $date = isset($_POST["date"]) ? $_POST["date"] : 'd_date';
    $password = isset($_POST["password"]) ? $_POST["password"] : 'd_password';

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $db_password = ""; // Use a different variable name for the database connection password
    $dbname = "fas7ni";

    // Create connection
    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query to insert reservation into restaurants table using prepared statements
    $sqlInsert = "INSERT INTO signup (fname,lname,email,date,password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sqlInsert);
    if (!$stmt) {
        echo "Error preparing query: " . $conn->error;
    } else {
        $stmt->bind_param("sssss", $fname, $lname, $email, $date, $password);
        if ($stmt->execute()) {
            echo "Reservation successful";
        } else {
            echo "Error executing query: " . $stmt->error;
        }
        $stmt->close();
    }
}

?>


<footer>
    <div class="footer">
        <div class="footer-section">
            <h3>Contact Us</h3>
            <ul>
                <li><a href="#">Contact</a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>About Us</h3>
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Our Story</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Follow Us</h3>
            <ul class="social-icons">
                <li>
                    <a href="#"><img src="images/fbicon.jpg" alt="Facebook" /></a>
                </li>
                <li>
                    <a href="#"><img src="images/instagramicon.jpg" alt="Instagram" /></a>
                </li>
                <li>
                    <a href="#"><img src="images/emailicon.jpg" alt="Gmail" /></a>
                </li>
            </ul>
        </div>

        <div class="footerbtngroup">


            <!-- ADD FROM HEREEEEE -->

            <button onclick="toggleSignUpPopup()" class="footerbtn">
                Sign Up
            </button>
            <!-- Button to open popup -->
            <div class="Form-popup" id="SignUpForm">
                <form class="Form-container" method="POST">
                    <button type="button" class="Closebtnn" onclick="closeSignUpForm()">
                        Close
                    </button>
                    <h1>Sign Up</h1>
                    <input type="name" placeholder="First Name" class="Form-container" name="fname" required />
                    <input type="name" placeholder="Last Name" class="Form-container" name="lname" required />
                    <input type="email" placeholder="Email" class="Form-container" name="email" required />
                    <input type="date" placeholder="Date of Birth" class="Form-container" name="date" required />
                    <input type="password" placeholder="Password" class="Form-container" name="password" required />

                    <button type="submit" class="Formbtn" name="submit">Sign Up</button>
                    <hr />
                    or
                    <hr />
                    <br />
                    <a> Already have an account? <a href="login.php">Log In</a></a>
                </form>
            </div>

            <button onclick="toggleSubscribePopup()" class="footerbtn">
                Subscribe to Newsletter
            </button>
            <!-- Button to open popup -->
            <div class="Form-popup" id="SubscribeForm">
                <form class="Form-container">
                    <button type="button" class="Closebtnn" onclick="closeSubscribeForm()">
                        Close
                    </button>
                    <h1>Subscribe</h1>
                    <input type="name" placeholder="Name" class="Form-container" name="name" required />
                    <input type="email" placeholder="Email" class="Form-container" name="email" required /><br /><br />
                    <button type="submit" class="Formbtn">Subscribe</button>
                </form>
            </div>
            <!-- ADD TO HEREEEEE -->
        </div>
    </div>
</footer>