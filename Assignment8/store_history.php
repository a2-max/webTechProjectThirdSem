<?php

$searchType = $_POST['searchType'];
$keyword = $_POST['keyword'];

$conn = mysqli_connect("localhost", "root", "", "bcathirdsem");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO search_history (search_type, keyword) VALUES ('$searchType', '$keyword')";

if (mysqli_query($conn, $sql)) {
    echo "Search history recorded successfully";
} else {
    echo "Error recording search history: " . mysqli_error($conn);
}

mysqli_close($conn);