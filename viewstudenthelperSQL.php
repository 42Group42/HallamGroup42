<section>
  <h2>View Student Information</h2>
  <form action="view_student.php" method="GET">
    <label for="student_id">Enter Student ID:</label>
    <input type="text" id="student_id" name="student_id" required>
    <button type="submit">View</button>
  </form>
</section>
<?php
// Get the student ID from the query string
$student_id = $_GET['student_id'];

// Connect to the database
$connection = mysqli_connect('localhost', 'username', 'password', 'database');

// Execute the SQL query to retrieve the student information
$query = "SELECT name, id, program, advisor
          FROM students
          WHERE id = '$student_id'";
$result = mysqli_query($connection, $query);

// Display the student information in HTML format
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  echo "<h2>Student Information</h2>";
  echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
  echo "<p><strong>ID:</strong> " . $row['id'] . "</p>";
  echo "<p><strong>Program:</strong> " . $row['program'] . "</p>";
  echo "<p><strong>Advisor:</strong> " . $row['advisor'] . "</p>";
} else {
  echo "<p>No student found with ID $student_id</p>";
}

// Close the database connection
mysqli_close($connection);
?>

