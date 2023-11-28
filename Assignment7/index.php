<?php
// Function to set a cookie with the current date, time, and day
function setDateTimeCookie() {
    // Check if the 'datetime_cookies' cookie already exists
    if (isset($_COOKIE['datetime_cookies'])) {
        $cookieData = json_decode($_COOKIE['datetime_cookies'], true);
    } else {
        $cookieData = [];
    }

    // Add the current date and time to the array
    $currentDateTime = date("Y-m-d H:i:s");
    $cookieData[] = $currentDateTime;

    // Encode the array as JSON and set the cookie to expire in 1 hour
    setcookie("datetime_cookies", json_encode($cookieData), time() + 3600);
}

// Check if the "List Cookies" button is clicked
if (isset($_POST['list_cookies'])) {
    echo "<h1>Stored Cookies:</h1>";
    if (isset($_COOKIE['datetime_cookies'])) {
        $cookieData = json_decode($_COOKIE['datetime_cookies'], true);
        if (!empty($cookieData)) {
            echo "<ul>";
            foreach ($cookieData as $storedDateTime) {
                echo "<li>Stored Date and Time: $storedDateTime</li>";
            }
            echo "</ul>";
        } else {
            echo "No cookies found.";
        }
    } else {
        echo "No cookies found.";
    }
}

// Set the cookie when the page loads
setDateTimeCookie();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Current Date and Time</title>
</head>
<body>
    <h1>Current Date and Time</h1>
    <p>
        Date: <?php echo date("Y-m-d"); ?><br>
        Time: <?php echo date("H:i:s"); ?><br>
        Day: <?php echo date("l"); ?>
    </p>

    <form method="post">
        <input type="submit" name="list_cookies" value="List Cookies">
    </form>
</body>
</html>
