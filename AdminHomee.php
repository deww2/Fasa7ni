<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Ensure session_start is at the beginning to avoid header issues

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $name = isset($_POST["name"]) ? $_POST["name"] : 'default_name';
  $email = isset($_POST["email"]) ? $_POST["email"] : 'd_e';
  $password = isset($_POST["password"]) ? $_POST["password"] : '';

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
  // $sqlInsert = "INSERT INTO adminhome (name,email,password) VALUES (?, ?, ?)";
  // $stmt = $conn->prepare($sqlInsert);
  // if (!$stmt) {
  //   echo "Error preparing query: " . $conn->error;
  // } else {
  //   $stmt->bind_param("sss", $name, $email, $password);
  //   if ($stmt->execute()) {
  //     echo "Reservation successful";
  //   } else {
  //     echo "Error executing query: " . $stmt->error;
  //   }
  //   $stmt->close();
  // }
  $action = $_POST['action'] ?? null;

  switch ($action) {
    case 'insert':
      // Insert logic
      $name = $_POST["name"] ?? 'default_name';
      $email = $_POST["email"] ?? 'd_e';
      $password = $_POST["password"] ?? '';
      $sqlInsert = "INSERT INTO adminhome (name,email,password) VALUES (?, ?, ?)";
      $stmt = $conn->prepare($sqlInsert);
      $stmt->bind_param("sss", $name, $email, $password);
      if ($stmt->execute()) {
        echo "Reservation inserted successfully.";
      } else {
        echo "Error executing insert query: " . $stmt->error;
      }
      $stmt->close();
      break;
    case 'update':
      // Update logic
      $name = $_POST["name"] ?? 'default_name';
      $email = $_POST["email"] ?? null;
      $password = $_POST["password"] ?? '';
      $sqlUpdate = "UPDATE adminhome SET name=?, password=? WHERE email=?";
      $stmt = $conn->prepare($sqlUpdate);
      $stmt->bind_param("sss", $name, $password, $email);
      if ($stmt->execute()) {
        echo "Reservation updated successfully.";
      } else {
        echo "Error executing update query: " . $stmt->error;
      }
      $stmt->close();
      break;
    case 'delete':
      // Delete logic
      $sqlDelete = "DELETE FROM adminhome WHERE email=?";
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
      $sqlView = "SELECT * FROM adminhome WHERE email=?";
      $stmt = $conn->prepare($sqlView);
      $stmt->bind_param("s", $email);
      if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
          echo "<table border='1' style='width:100%; border-collapse: collapse;'>";
          echo "<tr><th>Name</th><th>Email</th><th>Password</th></tr>";
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars((string) $row["name"]) . "</td>";
            echo "<td>" . htmlspecialchars((string) $row["email"]) . "</td>";
            echo "<td>" . htmlspecialchars((string) $row["password"]) . "</td>";

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

  // Close database connection
  $conn->close();
} else {
  // If form is not submitted via POST method
  echo "Form submission method is not POST.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Style.css">
  <title>Admin Dashboard</title>
</head>

<body>
  <header>
    <a href="#" class="logo">Fasa7ni</a>
    <nav class="navigation">
      <a href="#" class="active">Dashboard</a>
      <a href="#">Logout</a>
    </nav>
  </header>

  <section class="admin-dashboard">
    <h2>Admin Dashboard</h2>

    <div class="dashboard">
      <h1>Admin Dashboard</h1>
      <p id="greeting"></p>
      <button id="updateInfoBtn">Update Personal Information</button>
      <!-- Personal Information Section -->
      <h2>Personal Information</h2>
      <form id="updateInfoForm" method="POST">
        <div class="form-group">
          <label for="adminName">Name:</label>
          <input type="text" id="adminName" name="name" placeholder="Enter Name" required>
        </div>
        <div class="form-group">
          <label for="adminEmail">Email:</label>
          <input type="email" id="adminEmail" name="email" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
          <label for="adminPassword">Password:</label>
          <input type="password" id="adminPassword" name="password" placeholder="Enter Password" required>
        </div>
        <button type="submit" name="action" value="insert">Insert</button>
        <button type="submit" name="action" value="update">Update</button>
        <button type="submit" name="action" value="delete">Delete</button>
        <button type="submit" name="action" value="view">View</button>
      </form>
    </div>
    <div class="dashboard-options">
      <div class="add-category">
        <h3>Add Category</h3>
        <form id="addCategoryForm" method="POST">
          <input type="text" id="categoryName" placeholder="Category Name" required>
          <button type="submit">Add</button>
        </form>
      </div>
      <div class="remove-category">
        <h3>Remove Category</h3>
        <form id="removeCategoryForm" method="POST">
          <select id="categoryList" required>
            <option value="">Select Category</option>
            <!-- Options will be populated dynamically using JavaScript -->
          </select>
          <button type="submit">Remove</button>
        </form>
      </div>


      <div class="feedback">
        <h2>Feedback</h2>
        <div id="feedbackList">
          <!-- Feedback items will be displayed dynamically using JavaScript -->
        </div>
      </div>
  </section>

  <!--style for admin -->
  <style>
    .admin-dashboard {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .dashboard-options {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .add-category,
    .remove-category {
      flex: 1;
      margin-right: 10px;
    }

    .add-category input,
    .remove-category select {
      width: calc(100% - 80px);
      margin-bottom: 10px;
    }

    .feedback-list {
      margin-top: 20px;
    }

    .feedback-item {
      background-color: #f9f9f9;
      border: 1px solid #ddd;
      padding: 10px;
      margin-bottom: 10px;
    }

    .feedback-item p {
      margin: 5px 0;
    }

    .feedback-item p span {
      font-weight: bold;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .dashboard {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: #f9f9f9;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1,
    h2 {
      color: rgb(127, 85, 164);
    }

    button {
      padding: 10px 20px;
      margin-top: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }

    input[type="text"] {
      padding: 8px;
      margin-right: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    #feedbackList {
      margin-top: 20px;
    }

    .feedback-item {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 10px;
    }

    .feedback-item p {
      margin: 0;
    }

    .feedback-item p:last-child {
      margin-top: 5px;
    }

    .feedback-item p span {
      font-weight: bold;
    }
  </style>

  <!-- Footer content goes here -->
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
        <a class="footerbtn">Log In </a>

        <!-- ADD FROM HEREEEEE -->

        <button onclick="toggleSignUpPopup()" class="footerbtn">Sign Up</button>
        <!-- Button to open popup -->
        <div class="Form-popup" id="SignUpForm">
          <form class="Form-container" method="POST">
            <button type="button" class="Closebtnn" onclick="closeSignUpForm()">
              Close
            </button>
            <h1>Sign Up</h1>
            <input type="name" placeholder="First Name" class="Form-container" name="name" required />
            <input type="name" placeholder="Last Name" class="Form-container" name="name" required />
            <input type="email" placeholder="Email" class="Form-container" name="email" required />
            <input type="date" placeholder="Date of Birth" class="Form-container" name="date" required />
            <input type="password" placeholder="Password" class="Form-container" name="password" required />

            <button type="submit" class="Formbtn">Sign Up</button>
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

  <script>  document.addEventListener('DOMContentLoaded', function () {
      // Populate the category list dropdown
      var categoryList = document.getElementById('categoryList');
      var categories = ['Category 1', 'Category 2', 'Category 3']; // Example categories
      categories.forEach(function (category) {
        var option = document.createElement('option');
        option.textContent = category;
        option.value = category;
        categoryList.appendChild(option);
      });

      // Handle form submission to add a new category
      var addCategoryForm = document.getElementById('addCategoryForm');
      addCategoryForm.addEventListener('submit', function (event) {
        event.preventDefault();
        var categoryName = document.getElementById('categoryName').value;
        if (categoryName.trim() !== '') {
          // Add the category to the list (you can implement this based on your backend logic)
          var option = document.createElement('option');
          option.textContent = categoryName;
          option.value = categoryName;
          categoryList.appendChild(option);
          // Clear the input field
          document.getElementById('categoryName').value = '';
        } else {
          alert('Please enter a category name.');
        }
      });

      // Handle form submission to remove a category
      var removeCategoryForm = document.getElementById('removeCategoryForm');
      removeCategoryForm.addEventListener('submit', function (event) {
        event.preventDefault();
        var selectedOption = categoryList.options[categoryList.selectedIndex];
        if (selectedOption.value !== '') {
          // Remove the selected category from the list (you can implement this based on your backend logic)
          selectedOption.remove();
        } else {
          alert('Please select a category to remove.');
        }
      });

      // Populate feedback list (you can implement this based on your backend logic)
      var feedbackList = document.getElementById('feedbackList');
      var feedbackItems = [
        { text: 'Sara: "Authentic taste of Egypt! Loved the variety of koshary dishes served here. Quick service and reasonable prices. A must-visit for anyone craving traditional Egyptian food."', rating: 8 },
        { text: 'Emily: "Fantastic way to explore the Red Sea! The kayaking tour was well-organized, and we got to see beautiful coral reefs and marine life up close. ', rating: 6 },
        { text: 'Omar: "Relaxing day spent at San Stefano! The beach is beautiful, and the facilities are clean and comfortable. A perfect escape from the city hustle."', rating: 7.5 },
        { text: ' Fatima: "Hidden gem in Fayoum! Magic Lake offers serene surroundings and plenty of activities like swimming and paddle boating. Ideal for a peaceful day trip with family."', rating: 8 },

      ]; // Example feedback items
      feedbackItems.forEach(function (item) {
        var div = document.createElement('div');
        div.className = 'feedback-item';
        div.innerHTML = '<p>' + item.text + '</p><p>Rating: <span>' + item.rating + '</span></p>';
        feedbackList.appendChild(div);
      });
    });



    //java for dashboard 
    document.addEventListener('DOMContentLoaded', function () {
      // Function to greet the admin
      function greetAdmin() {
        var adminName = prompt('Please enter your name:');
        if (adminName) {
          alert('Hi ' + adminName + '! Welcome to the Admin Dashboard.');
        } else {
          alert('Welcome to the Admin Dashboard.');
        }
      }

      // Call the greetAdmin function when the dashboard is loaded
      greetAdmin();
      // Function to handle the submission of the personal information update form
      function handleUpdateInfoFormSubmit(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Retrieve input values
        const adminName = document.getElementById('adminName').value;
        const adminEmail = document.getElementById('adminEmail').value;
        const adminPassword = document.getElementById('adminPassword').value;

        // Perform validation if needed

        // Simulate updating the admin's personal information (replace this with actual backend logic)
        console.log("Updating admin's personal information...");
        console.log("New Name:", adminName);
        console.log("New Email:", adminEmail);
        console.log("New Password:", adminPassword);

        // Clear the form after submission
        event.target.reset();
      }

      // Function to initialize the admin dashboard
      function initAdminDashboard() {
        // Display greeting message
        displayGreeting();

        // Add event listener to the personal information update form
        const updateInfoForm = document.getElementById('updateInfoForm');
        updateInfoForm.addEventListener('submit', handleUpdateInfoFormSubmit);
      }

      // Initialize the admin dashboard when the page loads
      document.addEventListener('DOMContentLoaded', initAdminDashboard);

    });



  </script>


  <script src="scripts.js"></script>
</body>

</html>