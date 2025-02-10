<?php
// Connect to database
$mysqli = new mysqli("localhost","root","25374Az123!","db_swopnil");
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "SELECT *
FROM tbl_weather
WHERE w_fetched >= DATE_SUB(NOW(), INTERVAL 120 SECOND)
ORDER BY w_fetched DESC limit 1";
$result = $mysqli -> query($sql);


// No data? Import fresh data and run query again!
if ($result->num_rows == 0) {
include('data_import.php');
$result = $mysqli -> query($sql); // Run query again after import
}

// Error ?
if($result == false) {
echo("<h4>SQL error description: " . $mysqli -> error . "</h4>");
}

// Get data, convert to JSON and print
$row = $result -> fetch_assoc();
print json_encode($row);
// Free result set and close connection
$result -> free_result();
$mysqli -> close();
?>