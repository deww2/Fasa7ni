<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        section {
            margin: 20px auto;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        textarea,
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .delete-button {
            background-color: #dc3545;
            margin-left: 10px;
        }

        #editactivitydescription {
            /* Other styles... */
            resize: none; /* Prevent resizing */
        }
    </style>
</head>
<body>
<section>
    <h2>Edit Existing Activity</h2>
    <form method="post" action="EditAdmin.php">
        <label for="editactivityname">Activity Name:</label>
        <input type="text" id="editactivityname" name="editactivityname">
        <label for="editactivitydescription">Description:</label>
        <textarea id="editactivitydescription" name="editactivitydescription" rows="4"></textarea>
        <label for="editactivitylocation">Location:</label>
        <input type="text" id="editactivitylocation" name="editactivitylocation">
        <button type="submit" name="submit">Add activity</button>
        <button type="submit" name="update">Update activity</button>
        <button type="submit" class="deletebutton" name="delete">Delete Activity</button>
    </form>
</section>

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

    if (isset($_POST["submit"])) {
        // Handle form submission for inserting a new record
        $name = $_POST["editactivityname"];
        $description = $_POST["editactivitydescription"];
        $location = $_POST["editactivitylocation"];

        // Prepare and execute SQL query to insert into activity table
        $sqlInsert = "INSERT INTO activity (editactivityname, editactivitydescription, editactivitylocation) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sqlInsert);
        if (!$stmt) {
            echo "Error preparing query: " . $conn->error;
        } else {
            $stmt->bind_param("sss", $name, $description, $location);
            if ($stmt->execute()) {
                echo "Activity added successfully";
            } else {
                echo "Error executing query: " . $stmt->error;
            }
            $stmt->close();
        }
    } elseif (isset($_POST["delete"])) {
        // Handle form submission for deleting a record
        $nameToDelete = $_POST["editactivityname"]; // Assuming this is the name you want to delete

        // Prepare and execute SQL query to delete from activity table
        $sqlDelete = "DELETE FROM activity WHERE editactivityname = ?";
        $stmt = $conn->prepare($sqlDelete);
        if (!$stmt) {
            echo "Error preparing delete query: " . $conn->error;
        } else {
            $stmt->bind_param("s", $nameToDelete);
            if ($stmt->execute()) {
                echo "Activity deleted successfully";
            } else {
                echo "Error executing delete query: " . $stmt->error;
            }
            $stmt->close();
        }
    } elseif (isset($_POST["update"])) {
        // Handle form submission for updating a record
        $nameToUpdate = $_POST["editactivityname"]; // Assuming this is the name you want to update
        $description = $_POST["editactivitydescription"];
        $location = $_POST["editactivitylocation"];

        // Prepare and execute SQL query to update activity table
        $sqlUpdate = "UPDATE activity SET editactivitydescription=?, editactivitylocation=? WHERE editactivityname=?";
        $stmt = $conn->prepare($sqlUpdate);
        if (!$stmt) {
            echo "Error preparing update query: " . $conn->error;
        } else {
            $stmt->bind_param("sss", $description, $location, $nameToUpdate);
            if ($stmt->execute()) {
                echo "Activity updated successfully";
            } else {
                echo "Error executing update query: " . $stmt->error;
            }
            $stmt->close();
        }
    } else {
        // If form is not submitted via POST method
        echo "Form submission method is not POST.";
    }

    // Close connection
    $conn->close();
}
?>

</body>
</html>
