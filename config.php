<?php

$host = 'localhost';
$database = 'db_umkm_pariwisata';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}