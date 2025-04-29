<!DOCTYPE html>
<html>
<head>
    <title>Indian Cricket Players</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 30px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 50%;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h2>Indian Cricket Players</h2>

<?php
// PHP array of Indian Cricket Players
$players = array(
    "Sanju Samsun",
    "Virat Kohli",
    "Rohit Sharma",
    "Jasprit Bumrah",
    "Ravindra Jadeja",
    "KL Rahul",
    "Shubman Gill",
    "Ravichandran Ashwin",
    "Suryakumar Yadav",
    "Hardik Pandya",
    "Mohammed Siraj"
);

// Display players in HTML table
echo "<table>";
echo "<tr><th>S.No</th><th>Player Name</th></tr>";

foreach ($players as $index => $player) {
    $sno = $index + 1;
    echo "<tr><td>$sno</td><td>$player</td></tr>";
}

echo "</table>";
?>

</body>
</html>
