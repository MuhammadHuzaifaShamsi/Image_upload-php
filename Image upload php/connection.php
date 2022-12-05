<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'image_upload';

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    echo "Does not connect to the database...";
}

?>