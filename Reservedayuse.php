<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day-Use Reservation Form</title>

  <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file for styling -->
</head>

<body>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('images/backgrnd2.jpg');
      background-repeat: repeat;
      background-size: auto 100%;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      margin-top: 0;
      color: #9d11cc;
    }

    p {
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
      color: #a54de8;
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
      background-color: #4337a0;
      color: #f5f1f1;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #9d11cc;
    }
  </style>
  <div class="container">
    <h1>Day-Use Reservation</h1>
    <p>Fill out the form below to reserve your day-use outing in Egypt.</p>

    <form id="reservationForm" method="post" action="Reservedayuse.php">
      <div class="form-group">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
      </div>
      <div class="form-group">
        <label for="adults">Adults:</label>
        <input type="number" id="adults" name="adults" required>
      </div>
      <div class="form-group">
        <label for="children">Children:</label>
        <input type="number" id="children" name="children" required>
      </div>
      <div class="form-group">
        <label for="checkIn">Check in:</label>
        <input type="date" id="checkIn" name="checkIn" required>
      </div>
      <div class="form-group">
        <label for="checkOut">Check out:</label>
        <input type="date" id="checkOut" name="checkOut" required>
      </div>
      <div class="form-group">
        <label for="location">Location:</label>
        <select id="location" name="location" required>
          <option value="" disabled selected>Select Location</option>
          <option value="Sokhna">Sokhna</option>
          <option value="Alexandria">Alexandria</option>
          <option value="Cairo">Cairo</option>
        </select>
      </div>
      <div class="form-group">
        <label for="payment">Payment Method:</label>
        <select id="payment" name="payment" required>
          <option value="" disabled selected>Select Payment Method</option>
          <option value="cash">Cash</option>
          <option value="visa">Visa</option>
        </select>
        <label for="nameToDelete">Name of Reservation to Delete:</label>
        <input type="text" id="nameToDelete" name="nameToDelete" required>
      </div>
      <button type="submit" name="submit">Submit Reservation</button>
      <button type="submit" class="reserve-button" onclick="responsefunction()" name="delete">Delete
        Reservation</button>
      <button type="submit" class="reserve-button" onclick="responsefunction()" name="view">View Reservation</button>
      <br>
      <div>
        <button type="submit" class="reserve-button" onclick="responsefunction()" name="update">Update
          Reservation</button>
      </div>
    </form>
    <!-- <script>
    document.getElementById('reservationForm').addEventListener('submit', function (event) {
  event.preventDefault(); // Prevent form submission

  // Simulate form submission success

  // Display success message
  document.getElementById('successMessage').style.display = 'block';

  // Clear form fields
  document.getElementById('reservationForm').reset();
});
</script>  -->
    <!-- Success Message -->
    <div id="successMessage" style="display: none; color: green; margin-top: 20px;">
      Reservation successfully submitted! Thank you.
    </div>

  </div>

  <?php
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

    // Validate age
    if (empty($_POST["age"])) {
      $errors["age"] = "Age is required";
    } else {
      $age = test_input($_POST["age"]);
      if (!preg_match("/^[0-9]+$/", $age)) {
        $errors["age"] = "Only numbers allowed";
      }
    }

    // Validate date
    if (empty($_POST["checkIn"])) {
      $errors["checkIn"] = "checkIn is required";
    } else {
      $checkIn = test_input($_POST["checkIn"]);
      if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $checkIn) || strtotime($checkIn) < strtotime('today')) {
        $errors["checkIn"] = "Invalid date format or must be a future date";
      }
    }
    // Validate date
    if (empty($_POST["checkOut"])) {
      $errors["checkOut"] = "checkOut is required";
    } else {
      $checkOut = test_input($_POST["checkOut"]);
      if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $checkOut) || strtotime($checkOut) < strtotime('today')) {
        $errors["checkOut"] = "Invalid date format or must be a future date";
      }

    }

    // Validate loaction 
    if (empty($_POST["location"])) {
      $errors["location"] = "location is required";
    } else {
      $location = test_input($_POST["location"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $location)) {
        $errors["location"] = "Only letters and white space allowed";
      }
    }    // Validate payment 
    if (empty($_POST["payment"])) {
      $errors["payment"] = "payment is required";
    } else {
      $payment = test_input($_POST["payment"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $payment)) {
        $errors["payment"] = "Only letters and white space allowed";
      }
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

  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

    if (isset($_POST["submit"])) {
      // Handle form submission for inserting a new record
      // Retrieve form data
      $name = $_POST["name"];
      $email = $_POST["email"];
      $age = $_POST["age"];
      $adults = $_POST["adults"];
      $children = $_POST["children"];
      $checkIn = $_POST["checkIn"];
      $checkOut = $_POST["checkOut"];
      $location = $_POST["location"];
      $payment = $_POST["payment"];

      // Prepare and execute SQL query to insert reservation into dayuse table using prepared statements
      $sqlInsert = "INSERT INTO dayuse (name, email, age, adults, children, checkIn, checkOut, location, payment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sqlInsert);
      if (!$stmt) {
        echo "Error preparing query: " . $conn->error;
      } else {
        $stmt->bind_param("ssiiissss", $name, $email, $age, $adults, $children, $checkIn, $checkOut, $location, $payment);
        if ($stmt->execute()) {
          echo "Reservation successful";
        } else {
          echo "Error executing query: " . $stmt->error;
        }
        $stmt->close();
      }
    } elseif (isset($_POST["delete"])) {
      // Handle form submission for deleting a record
      // Retrieve name to delete from the form
      $nameToDelete = $_POST["nameToDelete"];

      // Prepare and execute SQL query to delete reservation from dayuse table using prepared statements
      $sqlDelete = "DELETE FROM dayuse WHERE name = ?";
      $stmt = $conn->prepare($sqlDelete);
      if (!$stmt) {
        echo "Error preparing delete query: " . $conn->error;
      } else {
        $stmt->bind_param("s", $nameToDelete);
        if ($stmt->execute()) {
          echo "Reservation for " . $nameToDelete . " deleted successfully";
        } else {
          echo "Error executing delete query: " . $stmt->error;
        }
        $stmt->close();
      }
    } elseif (isset($_POST["update"])) {
      // Handle form submission for updating a record
      // Retrieve form data
      $nameToUpdate = $_POST["nameToDelete"]; // Assuming this is the name you want to update
      $email = $_POST["email"];
      $age = $_POST["age"];
      $adults = $_POST["adults"];
      $children = $_POST["children"];
      $checkIn = $_POST["checkIn"];
      $checkOut = $_POST["checkOut"];
      $location = $_POST["location"]; // Make sure "location" is correctly retrieved from the form
      $payment = $_POST["payment"];

      // Prepare and execute SQL query to update reservation in dayuse table using prepared statements
      $sqlUpdate = "UPDATE dayuse SET email=?, age=?, adults=?, children=?, checkIn=?, checkOut=?, location=?, payment=? WHERE name=?";
      $stmt = $conn->prepare($sqlUpdate);
      if (!$stmt) {
        echo "Error preparing update query: " . $conn->error;
      } else {
        $stmt->bind_param("siiisssss", $email, $age, $adults, $children, $checkIn, $checkOut, $location, $payment, $nameToUpdate);
        if ($stmt->execute()) {
          echo "Reservation for " . $nameToUpdate . " updated successfully";
        } else {
          echo "Error executing update query: " . $stmt->error;
        }
        $stmt->close();
      }
    } elseif (isset($_POST["view"])) {
      // Handle form submission for viewing reservations for a specific name
      $nameToView = $_POST["nameToDelete"]; // Assuming this is the name you want to view
  
      // Prepare and execute SQL query to select reservations for the specified name
      $sqlSelect = "SELECT * FROM dayuse WHERE name = ?";
      $stmt = $conn->prepare($sqlSelect);
      $stmt->bind_param("s", $nameToView);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        // Output the reservation data in a tabular format
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Email</th><th>Age</th><th>Adults</th><th>Children</th><th>Check In</th><th>Check Out</th><th>Location</th><th>Payment</th></tr>";
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td>" . $row["age"] . "</td>";
          echo "<td>" . $row["adults"] . "</td>";
          echo "<td>" . $row["children"] . "</td>";
          echo "<td>" . $row["checkIn"] . "</td>";
          echo "<td>" . $row["checkOut"] . "</td>";
          echo "<td>" . $row["location"] . "</td>";
          echo "<td>" . $row["payment"] . "</td>";
          echo "</tr>";
        }
        echo "</table>";
      } else {
        echo "No reservations found for the name: " . $nameToView;
      }

      $stmt->close();
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


</body>

</html>