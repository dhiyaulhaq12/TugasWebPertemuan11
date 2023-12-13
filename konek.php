<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$mysqli = new mysqli($dbhost, $dbuser, $dbpass);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "Connected successfully<br>";

if($mysqli->query("CREATE DATABASE IF NOT EXISTS tugaspm11") === TRUE){
   echo "Database created successfully<br>";
}else{
   echo "Error creating database: " . $mysqli->error . "<br>";
}

// Select db
$mysqli->select_db("tugaspm11");


// Create Table db
$query = "CREATE TABLE IF NOT EXISTS Customer (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   nama VARCHAR(30) NOT NULL,
   alamat VARCHAR(30) NOT NULL,
   nomorTelpon INT(50) NOT NULL,
   reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($mysqli->query($query) === TRUE) {
   echo "Table created successfully<br>";
} else {
   echo "Error creating table: " . $mysqli->error . "<br>";
}


// Insert data in db
$insertDataQuery = "INSERT INTO Customer (nama, alamat, nomorTelpon) VALUES ('Tom', 'jln panggung baru', '081241435054')";

if ($mysqli->query($insertDataQuery) === TRUE) {
    echo "Data inserted successfully<br>";
} else {
    echo "Error inserting data: " . $mysqli->error . "<br>";
}


// Update Data in db
$sql = "UPDATE Customer SET nama='yanto' WHERE id=3";

if ($mysqli->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
?>