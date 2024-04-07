<?php
require 'db.php';

if(isset($_POST['student_id'])) {
    $studentId = $_POST['student_id'];

    $sql = "DELETE FROM students WHERE std_Id = '$studentId'";
    if ($conn->query($sql) === TRUE) {
        echo "Student record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Student ID not provided";
}

$conn->close();
?>
