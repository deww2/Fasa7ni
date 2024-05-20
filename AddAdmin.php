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
    <h2>Add New Activity</h2>
    <label for="newactivityname">Activity Name:</label>
    <input type="text" id="newactivityname" name="newactivityname">
    <label for="newactivitydescription">Description:</label>
    <textarea id="newactivitydescription" name="newactivitydescription" rows="4"></textarea>
    <label for="newactivitylocation">Location:</label>
    <input type="text" id="newactivitylocation" name="newactivitylocation">
    <button type="button" onclick="addActivity()">Add Activity</button>
</section>
<script src="AdminJavascript.js"></script>
</body>
</html>