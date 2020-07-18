<?php 
include('config.php'); 
$query_parent = mysql_query("SELECT * FROM semester") or die("Query failed: ".mysql_error());
session_start();
$name = $_SESSION["name"] ;
?>
<script type="text/javascript">function preventBack(){window.history.forward();}setTimeout("preventBack()",0);window.onunload=function(){null};</script>

<?php
include('includes/header.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Upload a file</title>
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
</head>
<style>

</style>
<body>
 <div class="uplad">
<form action="" method="post" enctype="multipart/form-data">
    <font face="bookman old style"><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSelect file:
    <input type="file" name="fileToUpload" id="fileToUpload">
	<br><br>
    <input placeholder="Title" type="text" name="filename">
<form method="get">
    <select name="parent_cat" id="parent_cat">
        <?php while($row = mysql_fetch_array($query_parent)): ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['sem']; ?></option>
        <?php endwhile; ?>
    </select>
    
 
    <select name="sub_cat" id="sub_cat"></select>
</form>


<select name="Semester" >
	 <option value="def">--Select Type--</option>
  <option value="1">Notes</option>
  <option value="2">Question Paper</option>
  <option value="3">Other</option>
  </select>
    <input type="submit" value="Upload File" name="submit">
<br>	Upload by: <?php echo $name ?>
</form>
 </div>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if file already exists
if (file_exists($target_file)) {
    echo "<script> alert('File Already exists')</script>";
    $uploadOk = 0;
}
// if everything is ok, try to upload file
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<script> alert('Upload success.')</script>";
		exit();
		}
		}
		}
?>