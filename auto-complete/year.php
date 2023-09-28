<?php

// Create connection
$conn = new mysqli('localhost', 'root', '', 'ajax_test');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
$dId = $_POST['degree'];

$q = "select * from class where degree_id= {$dId} ";

$year = $conn->query($q);
if ($year->num_rows > 0) {
    while ($row = $year->fetch_assoc()) {
     echo '<option value="' . $row['id'] . '">' . $row['year'] . '</option>';
    }
}else{
    echo '<option value="-1">No years available</option>';
}
$conn->close();
?>