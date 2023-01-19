<?php
// Connect to the MySQLi database
$conn = new mysqli("host", "username", "password", "database_name");

// Query the database for the latest data
$result = $conn->query("SELECT * FROM table_name ORDER BY id DESC LIMIT 1");
$row = $result->fetch_assoc();

// Output the data as a JSON object
echo json_encode($row);
?>




<script>
// Call the PHP script to get the latest data
function getData() {
  fetch('data.php')
  .then(response => response.json())
  .then(data => {
    // Update the web page with the new data
    document.getElementById("data-id").innerHTML = data.id;
    document.getElementById("data-name").innerHTML = data.name;
    document.getElementById("data-value").innerHTML = data.value;
  });
}

// Refresh the data every 5 seconds
setInterval(getData, 5000);

// Call the function for the first time
getData();
</script>




<div>
  <p>ID: <span id="data-id"></span></p>
  <p>Name: <span id="data-name"></span></p>
  <p>Value: <span id="data-value"></span></p>
</div>
