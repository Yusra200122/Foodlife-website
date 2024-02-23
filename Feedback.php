
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fooddiary";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$orderid=$_POST['orderid'];
$feedbackid=$_POST['feedbackid'];
$Feedbackdate=$_POST['Feedbackdate'];
$FeedbackText=$_POST['FeedbackText'];
$rating=$_POST['rating'];


// Insert data into table
$sql = "INSERT INTO feedback (orderid,feedbackid,Feedbackdate,FeedbackText,rating) VALUES ('$orderid', '$feedbackid', '$Feedbackdate','$FeedbackText','$rating')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>