<?php 
include('config.php');

$parent_cat = $_GET['parent_cat'];

$query = mysql_query("SELECT * FROM subjects WHERE semid = {$parent_cat}");
while($row = mysql_fetch_array($query)) {
	echo "<option value='$row[id]'>$row[sub]</option>";
}
?> 