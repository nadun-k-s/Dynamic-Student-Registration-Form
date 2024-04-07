<?php
require 'db.php';

$stdID = $_GET["student_id"];

$sql = "SELECT * FROM students WHERE std_id = '$stdID'";
$result = $conn->query($sql);

$students = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

echo json_encode($students);

$conn->close();
?>
