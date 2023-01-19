



$conn = mysqli_connect("host", "username", "password", "database_name");
$result = mysqli_query($conn, "SELECT * FROM table_name WHERE id = 'specific_value'");
while($row = mysqli_fetch_assoc($result)) {
    echo $row['column_name'];
}
