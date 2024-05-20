<!DOCTYPE html>
<html>

<head>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Style.css">

  <script src="Script2.js"></script>
</head>

<body class="body3">
  <div class="background-wrapper">
    <a href="Activities.php">
      <button id="scrollUp"><img src="images/xxx.png" alt="buttonpng"></button>
    </a>
    <form onsubmit="validateForm()" method="post" action="RegistrationForm.php">
      <div class="containerrr">
        <h1>Register your Padel game</h1>
        <p>Please fill in this form to register your sport.</p>
        <hr>
        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="name" id="name" required>

        <p id="subscription"></p>
        <label for="email"><b>Email</b></label>
        <input id="emailInput" type="text" placeholder="Email" name="email">

        <label for="phonenum"><b>Phone Number</b></label>
        <input type="number" placeholder="Enter Phone Number" name="phonenum" id="phonenum" required>
        <br><br>
        <label for="dt"><b>Date</b></label>
        <input type="date" placeholder="Enter Date" name="dt" id="dt" required>
        <br><br>
        <label for="time"><b>Time</b></label>
        <input type="time" placeholder="Enter Time" name="time" id="time" required>
        <br><br>

        <label for="loc"><b>Location</b></label>
        <select id="loc" name="loc">
          <option value="NadyShamsPadelCourt">Nady Shams Padel court</option>
          <option value="BUEPadelCourt">BUE Padel court</option>
          <option value="GardeniaPadelCourt">Gardenia Padel court</option>
          <option value="MadinatyClubPadelCourt">Madinaty Club Padel court</option>
        </select>
        <br><br>

        <hr>
        <p>By Filling this Form you agree to our <a href="#">Terms & Privacy</a>.</p>
        
        <button type="submit" class="registerbtn" name="action" value="submit">Submit Reservation</button>
        <button type="submit" class="registerbtn" name="action" value="update">Update Reservation</button>
        <button type="submit" class="registerbtn" name="action" value="delete">Delete Reservation</button>
          
      </div>
    </form>
    <br>
  </div>
  
  <?php
  // Display errors for debugging purposes
  $action = $_POST['action'] ?? null;

  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  $errors = [];

  // Function to sanitize and validate input
  function test_input($data, $pattern = null)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($pattern !== null && !preg_match('' . $pattern . '', $data)) {
      echo $data;
      echo "Pattern Match Failed<br/>";
      return false;
    }
    return $data;
  }

  // Validate form submission method
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define variables to store form data and errors

    // Validate name
    if (empty($_POST["name"])) {
      $errors["name"] = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors["name"] = "Only letters and white space allowed";
      }
    }

    // Validate email
    if (empty($_POST["email"])) {
      $errors["email"] = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format";
      }
    }

    // Validate phone number
    if (empty($_POST["phonenum"])) {
      $errors["phonenum"] = "Phone number is required";
    } else {
      $phonenum = test_input($_POST["phonenum"]);
      if (!preg_match("/^\d{11}$/", $phonenum)) {
        $errors["phonenum"] = "Phone number must contain exactly 11 digits";
      }
    }

    // Validate date
    if (empty($_POST["dt"])) {
      $errors["dt"] = "Date is required";
    } else {
      $date = test_input($_POST["dt"]);
      if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date) || strtotime($date) < strtotime('today')) {
        $errors["dt"] = "Invalid date format or must be a future date";
      }
    }
    // Validate time
    if (empty($_POST["time"])) {
      $errors["time"] = "Time is required";
    } else {
      // Add validation rules for time if necessary
      // For example, you might want to check if it's in a specific format (HH:MM)
      $time = test_input($_POST["time"]);
    }

    // If there are no errors or it's not a view action, proceed with processing the data
    if (empty($errors) && (isset($_POST[$action]) || isset($_POST["submit"]))) {
      // Perform database operations or other actions
      // For simplicity, I'm just echoing a success message here
      echo "Form submitted successfully!";
    } else {
      // If any validation errors occur, handle them accordingly
      // For simplicity, I'm just echoing the error messages here
      foreach ($errors as $error) {
        echo "<div class='error'>" . $error . "</div>";
      }
    }
  }

  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phonenum = $_POST["phonenum"];
    $dt = $_POST["dt"];
    $time = $_POST["time"];
    $loc = $_POST["loc"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fas7ni";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    switch ($action) {
      case 'submit':
        // Check if record already exists
        $sqlCheck = "SELECT * FROM padel WHERE email=?";
        $stmt = $conn->prepare($sqlCheck);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
          echo "Reservation with this email already exists.";
        } else {
          $sqlInsert = "INSERT INTO padel (name, email, phonenum, dt, time, loc) VALUES (?, ?, ?, ?, ?, ?)";
          $stmt = $conn->prepare($sqlInsert);
          if (!$stmt) {
            echo "Error preparing query: " . $conn->error;
          } else {
            $stmt->bind_param("ssssss", $name, $email, $phonenum, $dt, $time, $loc);
            if ($stmt->execute()) {
              echo "Reservation successful";
            } else {
              echo "Error executing query: " . $stmt->error;
            }
            $stmt->close();
          }
        }
        break;
      case 'update':
        // Update logic
        $sqlUpdate = "UPDATE padel SET name=?, phonenum=?, dt=?, time=?, loc=? WHERE email=?";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param("ssssss", $name, $phonenum, $dt, $time, $loc, $email);
        if ($stmt->execute()) {
          if ($stmt->affected_rows > 0) {
            echo "Reservation updated successfully.";
          } else {
            echo "No reservation found with this email.";
          }
        } else {
          echo "Error executing update query: " . $stmt->error;
        }
        $stmt->close();
        break;
      case 'delete':
        // Delete logic
        $sqlDelete = "DELETE FROM padel WHERE email=?";
        $stmt = $conn->prepare($sqlDelete);
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
          if ($stmt->affected_rows > 0) {
            echo "Reservation deleted successfully.";
          } else {
            echo "No reservation found with this email.";
          }
        } else {
          echo "Error executing delete query: " . $stmt->error;
        }
        $stmt->close();
        break;
      case 'view':
        // View logic
        break;
      default:
        // Default action
        break;
    }

    $conn->close();
  } else {
    // If form is not submitted via POST method
    echo "Form submission method is not POST.";
  }
  ?>

</body>

</html>