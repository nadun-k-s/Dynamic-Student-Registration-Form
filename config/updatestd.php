<?php
require 'db.php';

$studentId = $_POST['updateId'];
$name = $_POST['updateName'];
$birthday = $_POST['updateBirthday'];
$address = $_POST['updateAddress'];
$phone = $_POST['updatePhone'];
$email = $_POST['updateEmail'];

$sql = "UPDATE students SET name='$name', birthday='$birthday', address='$address', phone='$phone', email='$email' WHERE std_Id=$studentId";

if ($conn->query($sql) === TRUE) {
    echo "Student record updated successfully";
} else {
    echo "Error updating student record: " . $conn->error;
}

$conn->close();
?>
