<?php
// Connect to the database
$conn = new mysqli('host', 'username', 'password', 'database');

// Query to get data from the table
$query = "SELECT category, SUM(amount) as total FROM expenses GROUP BY category";
$result = $conn->query($query);

// Initialize the data array
$data = array();

// Fetch the data from the result set
while ($row = $result->fetch_assoc()) {
    $data[] = array(
        'label' => $row['category'],
        'value' => $row['total']
    );
}

// Close the connection
$conn->close();

// Encode the data array as JSON
$jsonData = json_encode($data);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Pie Chart</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.css">
</head>
<body>

<div id="chart"></div>

<script type="text/javascript">
    var chart = c3.generate({
        bindto: '#chart',
        data: {
            json: <?php echo $jsonData; ?>,
            type : 'pie'
        }
    });
</script>

</body>
</html>
