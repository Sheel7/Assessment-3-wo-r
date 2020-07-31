<?php
	
$name = $_REQUEST['name'];
$comments = $_REQUEST['comments'];

date_default_timezone_set("Asia/Kolkata");
$date = date('d/m/Y h:i:s a', time());
require("dbcon.php");

mysqli_query($con, "INSERT INTO comments(name, comments, date_publish) VALUES('$name','$comments', '$date')"); //insert query to insert user input message and username to database

$result = mysqli_query($con, "SELECT * FROM comments ORDER BY id ASC");  //select query to display messages from database.
while($row=mysqli_fetch_array($result)){
echo "<div class='comments_content'>";
echo "<h4 style='display:none;'><a href='delete.php?id=" . $row['id'] . "'> X</a></h4>";
echo "<h1>" . $row['name'] . "</h1>";
echo "<h2>" . $row['date_publish'] . "</h2></br></br>";
echo "<h3>" . $row['comments'] . "</h3>";
echo "</div>";
}
mysqli_close($con);
?>