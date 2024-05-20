<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resturant Reservation Form</title>
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
    <h1>Resturant Reservation</h1>
    <p>Reserve a spot at your favorite resturant to secure your place!</p>

    <form id="reservationForm" method="post" action="reservationformres.php">
      <div class="form-group">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required />
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />
      </div>
      <div class="form-group">
        <label for="number">numberof guests</label>
        <input type="text" id="number" name="number" pattern="[1-9][0-9]*" required />

      </div>
      <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required />
      </div>
      <div class="form-group">
        <label for="time">Time Of Reservation</label>
        <input type="number" id="time" name="time" required />
      </div>
      <div class="form-group">
        <label for="DISCOUNT">ENTER DISCOUNT CODE:</label>
        <input type="text" id="DISCOUNT" name="DISCOUNT" required />
      </div>
      <div class="form-group">
        <label for="location">Location:</label>
        <select id="location" name="location" required>
          <option value="" disabled selected>Select Location</option>
          <option value="tagmo3">tagmo3</option>
          <option value="CFC">CFC</option>
          <option value="City stars">City stars</option>
          <option value="Sheikh Zayed/October">Sheikh Zayed/October</option>
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
      <div style>
        <button type="submit" class="reserve-button" onclick="responsefunction()" name="submit">Submit
          Reservation</button>
        <button type="submit" class="reserve-button" onclick="responsefunction()" name="delete">Delete
          Reservation</button>
        <button type="submit" class="reserve-button" onclick="responsefunction()" name="update">Update
          Reservation</button>
        <button type="submit" class="reserve-button" onclick="responsefunction()" name="view">View Reservations</button>
      </div>
    </form>
  </div>
  <script>
    document.getElementById('reservationForm').addEventListener('submit', function (event) {
      var selectedDate = new Date(document.getElementById('date').value);
      var currentDate = new Date();
      if (selectedDate <= currentDate) {
        alert('Please select a date in the future.');
        event.preventDefault();
      }
    });
  </script>


  <?php
  // Display errors for debugging purposes
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

    // Validate number of guests
    // Validate number of guests
    if (empty($_POST["number"])) {
      $errors["number"] = "Number of guests is required";
    } else {
      $number = test_input($_POST["number"]);
      if (!preg_match("/^[1-9][0-9]*$/", $number)) {
        $errors["number"] = "Invalid number of guests";
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
    if (empty($_POST["DISCOUNT"])) {
      $errors["discount"] = "Discount code is required";
    } else {
      // Add validation rules for discount code if necessary
      $discount = test_input($_POST["DISCOUNT"]);
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

    // // Validate view preference only for the view action
    // if (isset($_POST["view"])) {
    //   if (empty($_POST["view"])) {
    //     $errors["view"] = "View preference is required";
    //   } else {
    //     // Add validation rules for view preference if necessary
    //     $view = test_input($_POST["view"]);
    //     if ($view === false) {
    //       $errors["view"] = "Invalid view preference";
    //     }
    //   }
    // }
  
    // If there are no errors or it's not a view action, proceed with processing the data
    if (empty($errors) || !isset($_POST["view"])) {
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

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fas7ni";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if (empty($errors) && (isset($_POST["submit"]) || isset($_POST["delete"]) || isset($_POST["update"]) || isset($_POST["view"]))) {

      if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $number = $_POST["number"];
        $datee = $_POST["date"];
        $time = $_POST["time"];
        $DISCOUNT = $_POST["DISCOUNT"];
        $location = $_POST["location"];
        $payment = $_POST["payment"];
        $view = $_POST["view"];

        $sqlInsert = "INSERT INTO restaurants (name, email, number, date, time, DISCOUNT, location, payment, view) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sqlInsert);
        if (!$stmt) {
          echo "Error preparing query: " . $conn->error;
        } else {
          $stmt->bind_param("ssissssss", $name, $email, $number, $datee, $time, $DISCOUNT, $location, $payment, $view);
          if ($stmt->execute()) {
            echo "Data saved successfully in the database";
          } else {
            echo "Error executing query: " . $stmt->error;
          }
          $stmt->close();
        }
      } elseif (isset($_POST["delete"])) {
        $emailToDelete = $_POST["email"]; // Use the 'email' field for deletion
  
        $sqlDelete = "DELETE FROM restaurants WHERE email = ?";
        $stmt = $conn->prepare($sqlDelete);
        if (!$stmt) {
          echo "Error preparing delete query: " . $conn->error;
        } else {
          $stmt->bind_param("s", $emailToDelete);
          if ($stmt->execute()) {
            echo "Reservation for " . $emailToDelete . " deleted successfully";
          } else {
            echo "Error executing delete query: " . $stmt->error;
          }
          $stmt->close();
        }
      } elseif (isset($_POST["update"])) {
        // Handle reservation update
        // Use the 'email' field to identify which reservation to update
        $emailToUpdate = $_POST["email"];
        $name = $_POST["name"];
        $number = $_POST["number"];
        $date = $_POST["date"];
        $time = $_POST["time"];
        $discount = $_POST["DISCOUNT"];
        $location = $_POST["location"];
        $payment = $_POST["payment"];
        $view = $_POST["view"];

        // Prepare and execute SQL query to update reservation in the restaurants table
        $sqlUpdate = "UPDATE restaurants SET name=?, number=?, date=?, time=?, DISCOUNT=?, location=?, payment=?, view=? WHERE email=?";
        $stmt = $conn->prepare($sqlUpdate);
        if (!$stmt) {
          echo "Error preparing update query: " . $conn->error;
        } else {
          $stmt->bind_param("sisssssss", $name, $number, $date, $time, $discount, $location, $payment, $view, $emailToUpdate);
          if ($stmt->execute()) {
            echo "Reservation updated successfully";
          } else {
            echo "Error executing update query: " . $stmt->error;
          }
          $stmt->close();
        }
      } elseif (isset($_POST["view"])) {
        // Handle viewing reservations
        // Use the 'email' field to identify which reservations to fetch
        $emailToView = $_POST["email"];

        // Prepare and execute SQL query to fetch reservations from the restaurants table
        $sqlView = "SELECT * FROM restaurants WHERE email=?";
        $stmt = $conn->prepare($sqlView);
        if (!$stmt) {
          echo "Error preparing view query: " . $conn->error;
        } else {
          $stmt->bind_param("s", $emailToView);
          if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
              echo "<table><tr><th>Name</th><th>Email</th><th>Number</th><th>Date</th><th>Time</th><th>Discount</th><th>Location</th><th>Payment</th><th>View</th></tr>";
              while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["number"] . "</td><td>" . $row["date"] . "</td><td>" . $row["time"] . "</td><td>" . $row["DISCOUNT"] . "</td><td>" . $row["Location"] . "</td><td>" . $row["payment"] . "</td><td>" . $row["view"] . "</td></tr>";
              }
              echo "</table>";
            } else {
              echo "No reservations found for " . htmlspecialchars($emailToView);
            }
          } else {
            echo "Error executing view query: " . $stmt->error;
          }
          $stmt->close();
        }
      }

    } else {
      echo "CANT POST WHEN THERE ARE ERRORS.";

    }


    $conn->close();
  } else {
    echo "Form submission method is not POST.";
  }



  ?>



</body>

</html>