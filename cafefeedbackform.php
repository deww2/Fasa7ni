<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cafe Feedback Form</title>
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

    label {
      display: block;
      font-weight: bold;
      color: #e9892a;
      /* Dark gray for labels */
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
      /* Light gray background for input fields */
    }

    .reserve-button {
      float: left;
      margin-bottom: 20%;
      margin: 0% 10% 0 35%;
      padding: 8px 20px;
      background-color: #008CBA;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .reserve-button:hover {
      background-color: #006D9C;
    }
  </style>
  <div class="container">
    <h1>Cafe Feedback Form</h1>
    <p>Leave here your valued feedback for your last visited cafe!</p>

    <form id="reservationForm" method="post" action="cafefeedbackform.php">
      <div class="form-group">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required />
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />
      </div>
      <div class="form-group">
        <label for="payment">Cafe name:</label>
        <select id="payment" name="cafename" required>
          <option value="" disabled selected>Select cafe name </option>
          <option value="cash">Starbucks</option>
          <option value="visa">The Bakery Shop Cafe</option>
          <option value="visa">Costa Coffee</option>
        </select>
      </div>
      <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required />
      </div>
      <div class="form-group">
        <label for="order">Your order:</label>
        <input type="text" id="order" name="orderr" required />
      </div>
      <div class="form-group">
        <label for="payment">Rate your vist with % </label>
        <select id="payment" name="rate" required>
          <option value="" disabled selected>Select % of satisfaction</option>
          <option value="0%">0%</option>
          <option value="25%">25%</option>
          <option value="50%">50%</option>
          <option value="75%">75%</option>
          <option value="100%">100%</option>
        </select>
      </div>
      <div class="form-group">
        <label for="name">Feedback:</label>
        <input type="text" id="name" name="feedback" required />
      </div>
      <div style="display: inline-block;">
        <button class="reserve-button" type="submit">Submit Feedback</button>
        <button type="submit" name="action" value="update" class="reserve-button">Update Reservation</button>
        <button type="submit" name="action" value="delete" class="reserve-button">Delete Reservation</button>
        <button type="submit" name="action" value="view" class="reserve-button">View Reservations</button>
      </div>
      <!-- <script>
        function responsefunction() {
          alert("RESPONSE SUBMITTED SUCCESSFULLY!");
        }
      </script> -->
    </form>
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
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $errors["name"] = "Only letters and white space allowed for name";
    } else {
      // Proceed with saving the sanitized name to the database
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

    // Validate cafe name
    if (empty($_POST["cafename"])) {
      $errors["cafename"] = "Name is required";
    } else {
      $cafename = test_input($_POST["cafename"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $cafename)) {
        $errors["cafename"] = "Only letters and white space allowed";
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
    // Validate orderr name 
    if (empty($_POST["orderr"])) {
      $errors["orderr"] = "Name is required";
    } else {
      $orderr = test_input($_POST["orderr"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $orderr)) {
        $errors["orderr"] = "Only letters and white space allowed";
      }
    }


    // Validate feedback 
    if (empty($_POST["feedback"])) {
      $errors["feedback"] = "Name is required";
    } else {
      $feedback = test_input($_POST["feedback"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $feedback)) {
        $errors["feedback"] = "Only letters and white space allowed";
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




    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    // Ensure session_start is at the beginning to avoid header issues
  
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($errors)) {

        // Retrieve and sanitize form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $cafename = $_POST["cafename"];
        $date = $_POST["date"];
        $orderr = $_POST["orderr"];
        $rate = $_POST["rate"];
        $feedback = $_POST["feedback"];
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

        // Prepare and execute SQL query to insert data
        $sqlInsert = "INSERT INTO cafe (name, email, cafename, date, orderr, rate, feedback) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sqlInsert);
        if (!$stmt) {
          echo "Error preparing query: " . $conn->error;
        } else {
          $stmt->bind_param("sssssss", $name, $email, $cafename, $date, $orderr, $rate, $feedback);
          if ($stmt->execute()) {
            echo "Feedback submitted successfully";
          } else {
            echo "Error executing query: " . $stmt->error;
          }
          $stmt->close();
        }
        $action = $_POST['action'] ?? null;

        switch ($action) {
          case 'update':
            // Update logic
            $name = htmlspecialchars($_POST["name"]);
            $email = htmlspecialchars($_POST["email"]);
            $cafename = htmlspecialchars($_POST["cafename"]);
            $date = htmlspecialchars($_POST["date"]);
            $orderr = htmlspecialchars($_POST["orderr"]);
            $rate = htmlspecialchars($_POST["rate"]);
            $feedback = htmlspecialchars($_POST["feedback"]);
            $sqlUpdate = "UPDATE cafe SET name=?, cafename=?, date=?, orderr=?, rate=?, feedback=? WHERE email=?";
            $stmt = $conn->prepare($sqlUpdate);
            $stmt->bind_param("sssssss", $name, $cafename, $date, $orderr, $rate, $feedback, $email);
            if ($stmt->execute()) {
              echo "Reservation updated successfully.";
            } else {
              echo "Error executing update query: " . $stmt->error;
            }
            $stmt->close();
            break;
          case 'delete':
            // Delete logic
            $sqlDelete = "DELETE FROM cafe WHERE email=?";
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
            $sqlView = "SELECT * FROM cafe WHERE email=?";
            $stmt = $conn->prepare($sqlView);
            $stmt->bind_param("s", $email);
            if ($stmt->execute()) {
              $result = $stmt->get_result();
              if ($result->num_rows > 0) {
                echo "<table border='1' style='width:100%; border-collapse: collapse;'>";
                echo "<tr><th>Name</th><th>Email</th><th>Cafe Name</th><th>Date</th><th>Order</th><th>Rate</th><th>Feedback</th></tr>";
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars((string) $row["name"]) . "</td>";
                  echo "<td>" . htmlspecialchars((string) $row["email"]) . "</td>";
                  echo "<td>" . htmlspecialchars((string) $row["cafename"]) . "</td>";
                  echo "<td>" . htmlspecialchars((string) $row["date"]) . "</td>";
                  echo "<td>" . htmlspecialchars((string) $row["orderr"]) . "</td>";
                  echo "<td>" . htmlspecialchars((string) $row["rate"]) . "</td>";
                  echo "<td>" . htmlspecialchars((string) $row["feedback"]) . "</td>";
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
    }
    // Close connection if $conn is not null
    if ($conn !== null) {
      $conn->close();
    } else {
      echo "Database connection is not established.";
    }
  } else {
    // If form is not submitted via POST method
    echo "Form submission method is not POST.";
  }

  ?>
</body>

</html>

</html>