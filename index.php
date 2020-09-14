<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbhotel";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    return;
}
$sql = "
        SELECT *
        FROM pagamenti
    ";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "pagante: " . $row['name'] . " " . $row['lastname'] . " " . $row['price'] . " " . $row['status'] . '<br>';
        }
    } elseif ($result) {
        echo "0 results";
    } else {
        echo "query error";
    }
    $conn->close();
