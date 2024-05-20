<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Romantic Dinner Reservation Form</title>
  <link rel="stylesheet" href="styles.css" />
  <!-- Link to external CSS file for styling -->
</head>

<body>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      /*background-color: #f0ccb7;*/
      background-image: url("images/backgrnd2.jpg");
      background-repeat: no-repeat;
      background-size: auto 100%;
    }

    .container {
      max-width: 70%;
      height: 70%;
      margin: 50px auto;
      padding: 40px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      margin-top: 0;
    }

    p {
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .reserve-button {
      display: inline-block;
      margin-bottom: 30%;
      padding: 8px 10px;
      background-color: #008cba;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      margin: 0% 10px 0% 0%;
    }

    .reserve-button:hover {
      background-color: #006d9c;
    }

    label {
      display: block;
      font-weight: bold;
      color: #e9892a;
    }

    input[type="text"],
    input[type="email"],
    input[type="number"],
    input[type="date"],
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
      background-color: #fafafa;
    }

    button {
      padding: 10px 20px;
      background-color: #652c11;
      color: #141010;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #cc4611;
    }
  </style>
  <div class="container">
    <h1>Romantic Dinner Reservation</h1>
    <p>Reserve a table with your loved one!</p>

    <form id="reservationForm" method="POST">
      <div class="form-group">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="firstName" required />
        <label for="companionName">Companion Full Name:</label>
        <input type="text" id="companionName" name="companionName" required />
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />
      </div>
      <div class="form-group">
        <label for="number">Number of Guests:</label>
        <input type="number" id="number" name="NoOfGuests" required />
      </div>
      <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required />
      </div>
      <div class="form-group">
        <label for="time">Time Of Reservation:</label>
        <input type="number" id="time" name="time" required />
      </div>

      <div class="form-group">
        <label for="location">Location:</label>
        <select id="location" name="location" required>
          <option value="" disabled selected>Select Location</option>
          <option value="tagmo3">tagmo3</option>
          <option value="CFC">CFC</option>
          <option value="City stars">City stars</option>
          <option value="Sheikh Zayed/October">Sheikh Zayed/October</option>
          <option value="nile">nile</option>
        </select>
      </div>
      <div class="form-group">
        <label for="payment">Payment Method:</label>
        <select id="payment" name="payment" required>
          <option value="" disabled selected>Select Payment Method</option>
          <option value="cash">Cash</option>
          <option value="visa">Visa</option>
        </select>
      </div>
      <label for="discount">ENTER DISCOUNT CODE:</label>
      <input type="text" id="discount" name="discount" required />
      <div class="form-group">
        <label for="special">Special decorations:</label>
        <select id="special" name="special" required>
          <option value="" disabled selected>Select Which occasion</option>
          <option value="anniversary">anniversary</option>
          <option value="proposal">proposal</option>
          <option value="dinner">Dinner</option>
        </select>
      </div>
      <div class="form-group">
        <label for="view">Select the view you prefer</label>
        <select id="view" name="view" required>
          <option value="" disabled selected>
            Select the view you prefer
          </option>
          <option value="left">left window side</option>
          <option value="right">right window side</option>
          <option value="middle">middle aisle</option>
        </select>
      </div>

      <input type="checkbox" /><span>include flower bouquet</span>
      <input type="checkbox" /><span> Do not include flower bouquet</span>
      <div> <button type="submit" class="reserve-button" onclick="responsefunction()">Submit Reservation</button>
        <button type="submit" name="action" value="update" class="reserve-button">Update Reservation</button>
        <button type="submit" name="action" value="delete" class="reserve-button">Delete Reservation</button>
        <button type="submit" name="action" value="view" class="reserve-button">View Reservations</button>
      </div>
      <script>
        function responsefunction() {
          alert("RESPONSE SUBMITTED SUCCESSFULLY!");
        }
      </script>
    </form>
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
    // echo "hoooo";
    // Define variables to store form data and errors
  
    // Validate name
    if (empty($_POST["firstName"])) {
      $errors["firstName"] = "Name is required";
    } else {
      // echo "here";
      $firstName = test_input($_POST["firstName"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
        // echo "inside here";
        $errors["firstName"] = "Only letters and white space allowed";
      }
    }

    // Validate companion name
    if (empty($_POST["companionName"])) {
      $errors["companionName"] = "Companion name is required";
    } else {
      $companionName = test_input($_POST["companionName"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $companionName)) {
        $errors["companionName"] = "Only letters and white space allowed for companion name";
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

    // Validate number of guests
    if (empty($_POST["NoOfGuests"])) {
      $errors["NoOfGuests"] = "Number of guests is required";
    } else {
      $number = test_input($_POST["NoOfGuests"]);
      if (!preg_match("/^[1-9][0-9]*$/", $number)) {
        $errors["NoOfGuests"] = "Invalid number of guests";
      }
    }

    // Validate date
    if (empty($_POST["date"])) {
      $errors["date"] = "Date is required";
    } else {
      $date = test_input($_POST["date"]);
      if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date) || strtotime($date) < strtotime('today')) {
        $errors["date"] = "Invalid date format or must be a future date";
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

    // Validate discount code
    if (empty($_POST["discount"])) {
      $errors["discount"] = "Discount code is required";
    } else {
      // Add validation rules for discount code if necessary
      $discount = test_input($_POST["discount"]);
    }

    // Validate location
    if (empty($_POST["location"])) {
      $errors["location"] = "Location is required";
    } else {
      // Add validation rules for location if necessary
      $location = test_input($_POST["location"]);
    }

    // Validate payment method
    if (empty($_POST["payment"])) {
      $errors["payment"] = "Payment method is required";
    } else {
      // Add validation rules for payment method if necessary
      $payment = test_input($_POST["payment"]);
    }

    // Validate special decoration
    if (empty($_POST["special"])) {
      $errors["special"] = "Special decoration is required";
    } else {
      // Add validation rules for special decoration if necessary
      $special = test_input($_POST["special"]);
    }

    // Validate view preference
    if (empty($_POST["view"])) {
      $errors["view"] = "View preference is required";
    } else {
      $view = test_input($_POST["view"]);
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
        echo $error . "<br>";
      }
    }
  }




  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  // Ensure session_start is at the beginning to avoid header issues
  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($errors)) {
      // Retrieve form data
      $firstName = $_POST["firstName"] ?? 'default_name';
      $companionName = $_POST["companionName"] ?? 'default_companion_name';
      $email = $_POST["email"] ?? null;
      $NoOfGuests = $_POST["NoOfGuests"] ?? 1;
      $date = $_POST["date"] ?? '0000-00-00';
      $time = $_POST["time"] ?? 0;
      $location = $_POST["location"] ?? 'default_location';
      $payment = $_POST["payment"] ?? 'default_payment';
      $discount = $_POST["discount"] ?? null;
      $special = $_POST["special"] ?? 'default_special';
      $view = $_POST["view"] ?? 'default_view';

      // Database connection parameters
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "fas7ni";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Prepare and execute SQL query to insert reservation into restaurants table using prepared statements
      $sqlInsert = "INSERT INTO romantic (firstName, companionName, email, NoOfGuests, date, time, location, payment, discount, special, view) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sqlInsert);
      if (!$stmt) {
        echo "Error preparing query: " . $conn->error;
      } else {
        $stmt->bind_param("sssisssssss", $firstName, $companionName, $email, $NoOfGuests, $date, $time, $location, $payment, $discount, $special, $view);
        if ($stmt->execute()) {
          echo "Reservation successful";
        } else {
          echo "Error executing query: " . $stmt->error;
        }
        $stmt->close();
      }

      switch ($action) {
        case 'update':
          // Update logic
          $firstName = $_POST["name"] ?? 'default_name';
          $companionName = $_POST["companionName"] ?? 'default_companion_name';
          $email = $_POST["email"] ?? null;
          $NoOfGuests = $_POST["number"] ?? 1;
          $date = $_POST["date"] ?? '0000-00-00';
          $time = $_POST["time"] ?? 0;
          $location = $_POST["location"] ?? 'default_location';
          $payment = $_POST["payment"] ?? 'default_payment';
          $discount = $_POST["discount"] ?? null;
          $special = $_POST["special"] ?? 'default_special';
          $view = $_POST["view"] ?? 'default_view';
          $sqlUpdate = "UPDATE romantic SET firstName=?, companionName=?, NoOfGuests=?, date=?, time=?, location=?, payment=?, discount=?, special=?, view=? WHERE email=?";
          $stmt = $conn->prepare($sqlUpdate);
          $stmt->bind_param("ssiiissssss", $firstName, $companionName, $NoOfGuests, $date, $time, $location, $payment, $discount, $special, $view, $email);
          if ($stmt->execute()) {
            echo "Reservation updated successfully.";
          } else {
            echo "Error executing update query: " . $stmt->error;
          }
          $stmt->close();
          break;
        case 'delete':
          // Delete logic
          $sqlDelete = "DELETE FROM romantic WHERE email=?";
          $stmt = $conn->prepare($sqlDelete);
          $stmt->bind_param("s", $email);
          if ($stmt->execute()) {
            echo "Reservation deleted successfully.";
          } else {
            echo "Error executing delete query: " . $stmt->error;
          }
          $stmt->close();
          break;
        case 'view':
          // View logic
          $sqlView = "SELECT * FROM romantic WHERE email=?";
          $stmt = $conn->prepare($sqlView);
          $stmt->bind_param("s", $email);
          if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
              echo "<table border='1' style='width:100%; border-collapse: collapse;'>";
              echo "<tr><th>Name</th><th>Email</th><th>Number of Guests</th><th>Date</th><th>Time</th><th>Location</th><th>Companion Full Name</th><th>Payment Method</th><th>Special</th><th>View</th></tr>";
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars((string) $row["firstName"]) . "</td>";
                echo "<td>" . htmlspecialchars((string) $row["email"]) . "</td>";
                echo "<td>" . htmlspecialchars((string) $row["NoOfGuests"]) . "</td>";
                echo "<td>" . htmlspecialchars((string) $row["date"]) . "</td>";
                echo "<td>" . htmlspecialchars((string) $row["time"]) . "</td>";
                echo "<td>" . htmlspecialchars((string) $row["location"]) . "</td>";
                echo "<td>" . htmlspecialchars((string) $row["companionName"]) . "</td>";
                echo "<td>" . htmlspecialchars((string) $row["payment"]) . "</td>";
                echo "<td>" . htmlspecialchars((string) $row["special"]) . "</td>";
                echo "<td>" . htmlspecialchars((string) $row["view"]) . "</td>";
                echo "</tr>";
              }
              echo "</table>";
            } else {
              echo "No reservations found for " . htmlspecialchars($email);
            }
          } else {
            echo "Error executing view query: " . $stmt->error;
          }
          $stmt->close();
          break;
      }

    }


    // Close database connection
    $conn->close();
  } else {
    // If form is not submitted via POST method
    echo "Form submission method is not POST.";
  }
  ?>
</body>

</html>