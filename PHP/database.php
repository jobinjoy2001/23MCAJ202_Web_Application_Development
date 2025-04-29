<!DOCTYPE html>
<html>
<head>
    <title>Players Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(119, 185, 201);
            padding: 30px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 70%;
            margin: auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0px 0px 10px #aaa;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Players Records</h2>

<?php
// Step 1: Database configuration
$servername = "localhost"; // or use 127.0.0.1
$username = "root";        // default for local XAMPP/WAMP
$password = "";            // default is empty for XAMPP/WAMP
$dbname = "sports";

// Step 2: Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Step 3: Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 4: Run a query
$sql = "SELECT id, name, club, country FROM footballers";
$result = $conn->query($sql);

// Step 5: Display results
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Club</th><th>Country</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['club']}</td>
                <td>{$row['country']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p style='text-align:center;'>No records found.</p>";
}

// Step 6: Close connection
$conn->close();
?>

</body>
</html>
