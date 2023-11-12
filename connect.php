<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    $conn = new mysqli('localhost','root','','form');
    if ($conn->connect_error) {
        die('Connection Failed : '. $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into data(username, email, password, confirm)
        values(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $password, $confirm);
        $stmt->execute();
        echo "registration success";
        $stmt->close();
        $conn->close();
    }
?>

