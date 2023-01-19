<?php
//connect to database
$db = new mysqli('host','username','password','dbname');

//query to get data from the table
$query = $db->query('SELECT * FROM tablename');

//create array to hold data
$data = array();
while ($row = $query->fetch_assoc()) {
    $data[] = $row;
}

//close connection
$db->close();

//iterate through data and generate bar graph
foreach ($data as $row) {
    echo '<div style="height:'.$row['value'].'px; width:20px; background-color:green;"></div>';
}
?>
