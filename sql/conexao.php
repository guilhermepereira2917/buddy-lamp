<?php

$servername = "localhost";
$username = "root";
$password = "";
$name = "buddy_lamp";

$connection = mysqli_connect($servername, $username, $password, $name);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
