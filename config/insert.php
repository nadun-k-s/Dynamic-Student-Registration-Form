<?php
require 'db.php';

$name = $_POST['name'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$sql = "INSERT INTO students (name, birthday, address, phone, email) VALUES ('$name', '$birthday', '$address', '$phone', '$email')";

$response = array();

if ($conn->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = "Student record inserted successfully";
} else {
    $response['status'] = 'error';
    // $response['message'] = "Error: " . $sql . "<br>" . $conn->error;
    $response['message'] = "Error !";
}

echo json_encode($response);

$conn->close();
?>
