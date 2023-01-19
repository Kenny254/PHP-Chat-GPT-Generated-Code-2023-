<?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "myDB";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT id, firstname, lastname FROM MyGuests WHERE id = ? OR id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $first_id, $second_id);
    $first_id = 1;
    $second_id = 2;
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $firstname, $lastname);
    while(mysqli_stmt_fetch($stmt)){
        printf("%s %s\n", $firstname, $lastname);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
