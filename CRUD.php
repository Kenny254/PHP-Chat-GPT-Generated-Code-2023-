<?php
// Connect to the database
$conn = mysqli_connect("hostname", "username", "password", "database_name");

// Create a new record
$sql = "INSERT INTO table_name (column1, column2, column3) VALUES ('value1', 'value2', 'value3')";
$result = mysqli_query($conn, $sql);

// Read all records
$sql = "SELECT * FROM table_name";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["lastname"]. "<br>";
}

// Update a record
$sql = "UPDATE table_name SET column1 = 'new_value1', column2 = 'new_value2' WHERE id = 1";
$result = mysqli_query($conn, $sql);

// Delete a record
$sql = "DELETE FROM table_name WHERE id = 2";
$result = mysqli_query($conn, $sql);

// Close the connection
mysqli_close($conn);
?>
