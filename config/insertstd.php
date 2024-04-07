<?php 
    require 'db.php';

    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
    
        $sql = "INSERT INTO students (name, birthday, address, phone, email) VALUES ('$name', '$birthday', '$address', '$phone', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    $conn->close();
?>