<?php
    $conn = mysqli_connect("localhost", "root", "", "user_info_db");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
