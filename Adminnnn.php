<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Ensure session_start is at the beginning to avoid header issues

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $username = isset($_POST["username"]) ? $_POST["username"] : 'default_name';
  $email = isset($_POST["email"]) ? $_POST["email"] : 'd_e';
  $phonenumber = isset($_POST["phonenumber"]) ? $_POST["phonenumber"] : '';
  $category = isset($_POST["category"]) ? $_POST["category"] : '';

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
      $username = isset($_POST["username"]) ? $_POST["username"] : 'default_name';
      $email = isset($_POST["email"]) ? $_POST["email"] : 'd_e';
      $phonenumber = isset($_POST["phonenumber"]) ? $_POST["phonenumber"] : '';
      $category = isset($_POST["category"]) ? $_POST["category"] : '';

      $sqlInsert = "INSERT INTO adminhome2 (username,email,phonenumber,category) VALUES (?, ?, ?,?)";
      $stmt = $conn->prepare($sqlInsert);
      $stmt->bind_param("ssss", $username, $email, $phonenumber, $category);
      if ($stmt->execute()) {
        echo "Reservation inserted successfully.";
      } else {
        echo "Error executing insert query: " . $stmt->error;
      }
      $stmt->close();
      break;
    case 'update':
      // Update logic
      $username = isset($_POST["username"]) ? $_POST["username"] : 'default_name';
      $email = isset($_POST["email"]) ? $_POST["email"] : 'd_e';
      $phonenumber = isset($_POST["phonenumber"]) ? $_POST["phonenumber"] : '';
      $category = isset($_POST["category"]) ? $_POST["category"] : '';

      $sqlUpdate = "UPDATE adminhome2 SET username=?, phonenumber=?, category=? WHERE email=?";
      $stmt = $conn->prepare($sqlUpdate);
      $stmt->bind_param("ssss", $username, $phonenumber, $category, $email);
      if ($stmt->execute()) {
        echo "Reservation updated successfully.";
      } else {
        echo "Error executing update query: " . $stmt->error;
      }
      $stmt->close();
      break;
    case 'delete':
      // Delete logic
      $sqlDelete = "DELETE FROM adminhome2 WHERE email=?";
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
      $sqlView = "SELECT * FROM adminhome2 WHERE email=?";
      $stmt = $conn->prepare($sqlView);
      $stmt->bind_param("s", $email);
      if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
          echo "<table border='1' style='width:100%; border-collapse: collapse;'>";
          echo "<tr><th>Name</th><th>Email</th><th>category</th><th>Phone Number</th></tr>";
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars((string) $row["username"]) . "</td>";
            echo "<td>" . htmlspecialchars((string) $row["email"]) . "</td>";
            echo "<td>" . htmlspecialchars((string) $row["phonenumber"]) . "</td>";
            echo "<td>" . htmlspecialchars((string) $row["category"]) . "</td>";

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


<?php include 'includes/headeradmin.php'; ?>

<body>
  <div class="container" style="margin-left: 500px;">
    <section id="users" style="background-color: white;">
      <h2 style="margin-top: 60px;">User Management</h2>
      <form id="user-form" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="email">Category:</label>
        <input type="phonenumber" id="phonenumber" name="phonenumber" required>
        <label for="phonenumber"> Phone Number:</label>
        <input type="category" id="category" name="category" required>
        <label for="category"> Category:</label>
        <button type="submit" name="action" value="insert">Add User</button>
        <button type="submit" name="action" value="update">Update User</button>
        <button type="submit" name="action" value="delete">Delete User</button>
        <button type="submit" name="action" value="view">View User</button>
      </form>
      <table id="user-table">
        <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- User data will be dynamically populated here -->
        </tbody>
      </table>
    </section>





  </div>

  <script src="script.js"></script>
</body>

</html>

</div>
</section>

<section class="cards" id="services">
  <h2 class="title" id="restaurantsc">Restaurants</h2>
  <div class="content">
    <div class="card">
      <div class="romantic">
        <img src="images/romantic.jpeg" style="width: 250px; height: 200px; margin: 10px" />
        <h1>Romantic dinners</h1>
        <p style="margin: 10px">
          Where love and flavor unite. Explore our menus and intimate
          settings for unforgettable romantic evenings.
        </p>
      </div>
    </div>

    <div class="card">
      <div class="quickoutings">
        <a href="cafes.php">
          <img src="images/quickoutings.jpg" style="width: 270px; height: 200px; margin: 10px" />
        </a>
        <h1>Quick Outings</h1>
        <p style="margin: 10px">
          Easier planning, charming cafes, scenic walks, and cozy spots for
          those spur-of-the-momentÂ escapes.
        </p>
      </div>
    </div>

    <div class="card">
      <div class="familyoutings">
        <a href="restaurant.php">
          <img src="images/familyoutings.jpg" alt="family outing" style="width: 270px; height: 200px; margin: 10px" />
        </a>
        <h1>Family Outings</h1>
        <p style="margin: 10px">
          Enjoy family outings with ease! Discover venues where parents can
          relax while kids have fun in dedicated play areas.
        </p>
      </div>
    </div>
    <div>
      <a href="AdminHomee.php"><img src="images/plus-button.png" id="addCategoryBtn" width="250px"
          style="margin-bottom: 110px;"> </a>
      <a href="AdminHomee.php"> <img src="images/minus.png" id="removeCategoryBtn" width="250px"
          style="margin-bottom: 110px;"> </a>

    </div>
  </div>
</section>

<section class="cards" id="services">
  <h2 id="activitiesc" class="title">Activities</h2>
  <div class="content">
    <div class="card">
      <div class="padel">
        <img src="images/padel.jpg" style="width: 270px; height: 200px; margin: 10px" />
        <h1>Padel</h1>
        <p style="margin: 10px"></p>
      </div>
    </div>

    <div class="card">
      <div class="hiking">
        <img src="images/hiking.jpg" style="width: 270px; height: 200px; margin: 10px" />
        <h1>Hiking</h1>
        <p style="margin: 10px"></p>
      </div>
    </div>

    <div class="card">
      <div class="kayaking">
        <img src="images/kayaking.jpeg" style="width: 270px; height: 200px; margin: 10px" />
        <h1>Kayaking</h1>
        <p style="margin: 10px"></p>
      </div>
    </div>

    <div>
      <a href="AdminHomee.php"><img src="images/plus-button.png" id="addCategoryBtn" width="250px"
          style="margin-bottom: 110px;"> </a>
      <a href="AdminHomee.php"> <img src="images/minus.png" id="removeCategoryBtn" width="250px"
          style="margin-bottom: 110px;"> </a>

    </div>

  </div>
</section>

<section class="cards" id="services">
  <h2 id="dayusec" class="title">Day Use</h2>
  <div class="content">
    <div class="card">
      <div class="padel">
        <img src="images/alexdayuse.jpg" style="width: 270px; height: 200px; margin: 10px" />
        <a href="DayUse.php">
          <h1>Alexandria</h1>
        </a>

        <p style="margin: 10px"></p>
      </div>
    </div>
    <div class="card">
      <div class="hiking">
        <img src="images/sokhnadayusee.jpg" style="width: 270px; height: 200px; margin: 10px" />

        <a href="DayUse.php">
          <h1>Sokhna</h1>
        </a>
        <p style="margin: 10px"></p>
      </div>
    </div>
    <div class="card">
      <div class="kayaking">
        <img src="images/fayoumdayuse.jpeg" style="width: 270px; height: 200px; margin: 10px" />

        <a href="DayUse.php">
          <h1>fayoum</h1>
        </a>
        <p style="margin: 10px"></p>
      </div>
    </div>
    <div>
      <a href="AdminHomee.php"><img src="images/plus-button.png" id="addCategoryBtn" width="250px"
          style="margin-bottom: 250px;"> </a>
      <a href="AdminHomee.php"> <img src="images/minus.png" id="removeCategoryBtn" width="250px"
          style="margin-bottom: 250px;"> </a>

    </div>

  </div>
  </div>
</section>
<style>
  body {
    background-image: url("images/backgrnd2.jpg");
    background-repeat: repeat;
    background-size: auto 100%;
  }
</style>
</body>

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
        <form class="Form-container">
          <button type=" button" class="Closebtnn" onclick="closeSignUpForm()">
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
          <a> Already have an account? <a href="login.php">LogÂ In</a></a>
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
<!-- <script> // Sample data arrays (replace with actual data)
  let userData = [];
  let hotelData = [];
  let resortData = [];
  let companyData = [];

  // Function to add a new user
  function addUser(username, email, phonenumber, category) {
    userData.push({ username: username, email: email, phonenumber: phonenumber, category: category });
  }

  // Function to populate user table
  function populateUserTable() {
    const userTableBody = document.querySelector("#user-table tbody");
    userTableBody.innerHTML = "";
    userData.forEach(user => {
      const row = document.createElement("tr");
      row.innerHTML = `
                <td>${user.username}</td>
                <td>${user.email}</td>
                <td>${user.phonenumber}</td>
                <td>${user.category}</td>
                <td><button onclick="deleteUser('${user.username}')">Delete</button></td>
            `;
      userTableBody.appendChild(row);
    });
  }

  // Function to handle user form submission
  document.querySelector("#user-form").addEventListener("submit", function (event) {
    event.preventDefault();
    const username = document.querySelector("#username").value;
    const email = document.querySelector("#email").value;
    const phone_number = document.querySelector("#phonenumber").value;
    const category = document.querySelector("#category").value;
    addUser(username, email, phone_number, category);
    populateUserTable();
    // Clear the form fields
    document.querySelector("#user-form").reset();
  });

  // Function to delete a user
  function deleteUser(username) {
    userData = userData.filter(user => user.username !== username);
    populateUserTable();
  }

  // Similar functions for hotel, resort, and company management can be added here 

  // JavaScript to add labels dynamically
  document.addEventListener("DOMContentLoaded", function () {
    var form = document.getElementById("myForm");
    var labelContainer = document.getElementById("label-container");

    // Function to create label element
    function createLabel(text) {
      var label = document.createElement("label");
      label.textContent = text;
      return label;
    }

    // Add "Category" label
    var categoryLabel = createLabel("Category: ");
    labelContainer.appendChild(categoryLabel);

    // Add "Mobile Phone" label
    var mobileLabel = createLabel("Mobile Phone: ");
    labelContainer.appendChild(mobileLabel);
  });
</script> -->
</body>

</html>