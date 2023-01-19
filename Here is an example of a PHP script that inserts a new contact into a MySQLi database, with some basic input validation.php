<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_dbname";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    if (!empty($name) && !empty($email) && !empty($phone)) {
        // check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
        } else {
            $sql = "INSERT INTO contacts (name, email, phone) VALUES ('$name', '$email', '$phone')";

            if ($conn->query($sql) === TRUE) {
                echo "New contact created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "All fields are required";
    }
}
$conn->close();
?>
