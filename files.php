<?php

include('includes/header.php');
$name = $_SESSION["name"] ;

include('config.php'); 
$query_parent = mysql_query("SELECT * FROM semester") or die("Query failed: ".mysql_error());
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    
	$("#parent_cat").change(function() {
		$(this).after('');
		$.get('loadsubcat.php?parent_cat=' + $(this).val(), function(data) {
			$("#sub_cat").html(data);
			$('#loader').slideUp(200, function() {
				$(this).remove();
			});
		});	
    });

});
</script>
<style>

</style>
</head>
  <body background="includes/files.jpg" style=" background-size: 1366px 768px;"></body>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "vain";
$dbname = "aces";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}?>
 <div class ="upladd">
<form method="post">
    
	<br><select name="parent_cat" id="parent_cat">
        <?php while($row = mysql_fetch_array($query_parent)): ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['sem']; ?></option>
        <?php endwhile; ?>
    </select>
	
    <br>
 
    <select name="sub_cat" id="sub_cat"></select>
	<br><br>
	<input type="submit" name="submit" color="black"  value="Submit">
	
</form>
</div>
<?php
if(isset($_POST['submit']))
{
$seme=($_POST['parent_cat']);

//LE CHECKING FOR UNFILLED FIELDS------------------------------------------------
if($seme ==0)
{
echo "<script> alert('Please select semester and subject')</script>";
exit();
}
$subj=$_POST['sub_cat'];
$_SESSION['seme']=$seme;
$_SESSION['subj']=$subj; 
echo "<script> window.open('filechange.php','_self')</script>";
}
?> 
</body>
</html>
<?php
			include('includes/footer.php');
           ?>