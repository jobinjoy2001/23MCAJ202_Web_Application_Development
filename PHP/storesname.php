<?php
// Step 1: Store student names in an array
$students = array("Akash", "Vishnu", "Nihal", "Chetan", "Rahul", "Gokul");

// Step 2: Display original array using print_r()
echo "<h3>Original Array:</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";

// Step 3: Sort and display using asort (ascending order, maintain index association)
$ascSorted = $students;
asort($ascSorted);
echo "<h3>Sorted Array in Ascending Order (asort):</h3>";
echo "<pre>";
print_r($ascSorted);
echo "</pre>";

// Step 4: Sort and display using arsort (descending order, maintain index association)
$descSorted = $students;
arsort($descSorted);
echo "<h3>Sorted Array in Descending Order (arsort):</h3>";
echo "<pre>";
print_r($descSorted);
echo "</pre>";
?>
