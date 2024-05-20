<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Add Feedback - Ask a question </title>
  <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file for styling -->
</head>

<body>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f3f1e6;
      /* Sand color representing Egypt's desert landscape */

      background-image: url('images/backgrnd2.jpg');
      background-repeat: repeat;
      background-size: auto 100%;

    }

    .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      /* White background for a clean look */
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      /* Soft shadow for depth */
    }

    h1 {
      margin-top: 0;
      color: #510a72;
      /* Dark gray for headings */
    }

    p {
      margin-bottom: 20px;
      color: #666;
      /* Light gray for text */
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
      color: #6b0a81;
      /* Dark gray for labels */
    }

    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
      background-color: #fafafa;
      /* Light gray background for input fields */
    }

    textarea {
      resize: vertical;
      /* Allow vertical resizing of textarea */
    }

    button {
      padding: 10px 20px;
      background-color: #423ea8;
      /* Coral color representing warmth and energy */
      color: #fff;
      /* White text for contrast */
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      /* Smooth transition on hover */
    }

    button:hover {
      background-color: #8e44c0;
      /* Darker coral color on hover */
    }

    .feedback-success-message {
      display: none;
      /* Initially hidden */
      color: green;
      margin-top: 20px;
    }
  </style>
  <!-- <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Get the form element
      var contactForm = document.getElementById("contactForm");

      // Add event listener for form submission
      contactForm.addEventListener("submit", function (event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Show success message
        var successMessage = document.getElementById("feedbackSuccessMessage");
        successMessage.style.display = "block";

        // Reset the form after a short delay
        setTimeout(function () {
          successMessage.style.display = "none"; // Hide success message
          contactForm.reset(); // Reset the form
        }, 3000); // 3000 milliseconds = 3 seconds delay
      });
    });
  </script> -->
  <div class="container">
    <h1> Feedback </h1>
    <p>Have a question or feedback? Fill out the form below and we'll get back to you as soon as possible.</p>

    <form id="contactForm" method="post" action="Feedback.php">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea type="text" id="message" name="message" rows="5" required></textarea>
      </div>
      <div class="form-group" > 
      <label for="nameToDelete">Name of Client to CRUD:</label>
        <input type="text" id="nameToDelete" name="nameToDelete" required>
      </div>
      <button type="submit" name="submit">Send Message</button>
      <button type="submit" class="reserve-button" onclick="responsefunction()"  name="delete" >Delete Feedback</button> 
      <button type="submit" class="reserve-button" onclick="responsefunction()" name="view">View </button>
      
      <div>
        <button type="submit" class="reserve-button" onclick="responsefunction()" name="update">Update</button>
      </div>
    </form>
    </form>

    <!-- Success message -->
    <div id="feedbackSuccessMessage" class="feedback-success-message">
      Feedback successfully added! Thank you for your feedback.
    </div>
  </div>

  <?php

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


    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    

    if (isset($_POST["submit"])) {

    // Prepare and execute SQL query to insert feedback into feedback table using prepared statements
    $sqlInsert = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sqlInsert);
    if (!$stmt) {
      echo "Error preparing query: " . $conn->error;
    } else {
      $stmt->bind_param("sss", $name, $email, $message);
      if ($stmt->execute()) {
        echo "Feedback successfully added";
      } else {
        echo "Error executing query: " . $stmt->error;
      }
      $stmt->close();
    }
  }elseif (isset($_POST["delete"])) {
    // Handle reservation deletion
    // Code for deleting reservation from database
    $nameToDelete = $_POST["nameToDelete"]; // Assuming this is the name you want to delete

    // Prepare and execute SQL query to delete reservation from dayuse table using prepared statements
    $sqlDelete = "DELETE FROM feedback WHERE name = ?";
    $stmt = $conn->prepare($sqlDelete);
    if (!$stmt) {
        echo "Error preparing delete query: " . $conn->error;
    } else {
        $stmt->bind_param("s", $nameToDelete);
        if ($stmt->execute()) {
            echo "Reservation for ".$nameToDelete." deleted successfully";
        } else {
            echo "Error executing delete query: " . $stmt->error;
        }
        $stmt->close();
    }
  }elseif (isset($_POST["update"])) {
    // Handle form submission for updating a record
    // Retrieve form data
    $nameToUpdate = $_POST["name"]; // Assuming this is the name you want to update
    $email = $_POST["email"];
    $message = $_POST["message"];

    
    // Prepare and execute SQL query to update reservation in dayuse table using prepared statements
    $sqlUpdate = "UPDATE feedback SET email=?, message=? WHERE name=?";
    $stmt = $conn->prepare($sqlUpdate);
    if (!$stmt) {
      echo "Error preparing update query: " . $conn->error;
    } else {
      $stmt->bind_param("sss", $nameToUpdate,$email,  $message);
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
    $sqlSelect = "SELECT * FROM feedback WHERE name = ?";
    $stmt = $conn->prepare($sqlSelect);
    $stmt->bind_param("s", $nameToView);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      // Output the reservation data in a tabular format
      echo "<table border='1'>";
      echo "<tr><th>Name</th><th>Email</th><th>Message</th></tr>";
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["message"] . "</td>";
       
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
}else {
        // If form is not submitted via POST method
        echo "Form submission method is not POST.";
    }

   
  ?>
</body>

</html>