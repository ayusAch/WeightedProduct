<?php
$host = "localhost";//untuk host
$username = "root";//untuk username
$password = ""; //untuk password
$database = "metodewp";//untuk nama database
$koneksi = mysqli_connect($host, $username, $password, $database);
if ($koneksi) {
echo "";
} else {
echo "Server not connected";
}
?>