<html>
<head>
	<title>SQL Viewer</title>
</head>
<body>
	<form action="view_sql.php" method="post">
		<textarea name="query" rows="10" cols="50"></textarea>
		<br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
<?php
// Connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Execute the SQL query
$sql = $_POST['query'];
$result = mysqli_query($conn, $sql);

// Display the results
if (mysqli_num_rows($result) > 0) {
    echo "<table><tr>";
    while ($fieldinfo = mysqli_fetch_field($result)) {
        echo "<th>" . $fieldinfo->name . "</th>";
    }
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

// Close the database connection
mysqli_close($conn);
?>

