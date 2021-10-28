<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "housing";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST["email"];
    $password = $_POST["password"];
   
    // insert data
    $sql = "INSERT INTO login VALUES ('$email', '$password')";
    $conn->query($sql);
    
    header('location: table.php');
?>