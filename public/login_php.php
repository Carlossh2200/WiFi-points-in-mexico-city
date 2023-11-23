<?php
// Replace these with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "puntos_wifi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to check if the username and password match
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Successful login
        header("Location: /Bases_de_Datos/public/search");
        exit();
        //echo "Login successful!";
    } else {
        // Invalid login
        echo "Invalid username or password";
    }
}

// Close the connection
$conn->close();
?>