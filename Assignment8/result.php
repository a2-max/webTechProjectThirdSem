<?php

$conn = mysqli_connect("localhost", "root", "", "bcathirdsem");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h1>Books Available in Database</h1>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>Title</th>";
    echo "<th>Author</th>";
    echo "<th>Genre</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['author'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No books found";
}

mysqli_close($conn);