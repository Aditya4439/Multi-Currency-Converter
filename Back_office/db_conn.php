<?php
$conn = new mysqli("localhost", "root", "", "converter_admin");

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}
?>
