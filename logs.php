<?php

require("dbcon.php");
$result = mysqli_query($con, "SELECT * FROM comments ORDER BY id ASC");  //select query to select all data from database to display
while($row=mysqli_fetch_array($result)){
echo "<div class='comments_content' id=" . $row['name'] . ">";
echo "<h4 style='display:none;'><a href='delete.php?id=" . $row['id'] . "'> X</a></h4>";
echo "<h1>" . $row['name'] . "</h1><h2>" . $row['date_publish'] . "</h2>";
echo "</br>";
echo "<h3>" . $row['comments'] . "</h3>";
echo "</div>";
echo "";
}
mysqli_close($con);
?>

<script>
//script to define css color for individual message
var i = 0;

$('.comments_content').each(function(i){
	$('.comments_content:first').addClass('blueBox');
var elmIdt = $(this);
var p = $(this).prev();
var elmId = elmIdt.attr('id');
var pre = p.attr('id');
var preclass = p.hasClass("blueBox");

if ((elmId===pre) &&( $(this).prev().hasClass("blueBox"))){
     
	elmIdt.addClass('blueBox');
 
}

else if ((elmId===pre) && ( $(this).prev().hasClass("blackBox"))){
     
	elmIdt.addClass('blackBox');
 
}

else if ((elmId!=pre) &&( $(this).prev().hasClass("blueBox"))){
     
	elmIdt.addClass('blackBox');
 
}
else if ((elmId!=pre) &&( $(this).prev().hasClass("blackBox"))){
     
	elmIdt.addClass('blueBox');
 
}


});

</script>

<style>.blueBox{background-color:#0974B0;float:right;}
.blackBox{background-color:#575656;float:left;}</style>

