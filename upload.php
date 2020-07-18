<?php
include('includes/header.php');
?>
<?php 
//LE BASIC STUFF--------------------------------------------
include('config.php'); 
$query_parent = mysql_query("SELECT * FROM semester") or die("Query failed: ".mysql_error());
$name = $_SESSION["name"] ;
?>
<script type="text/javascript">function preventBack(){window.history.forward();}setTimeout("preventBack()",0);window.onunload=function(){null};</script>


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

</style><body background="includes/files.jpg" style=" background-size: 1366px 768px;"></body>
<body>
 <div class="uplad">
<form action="" method="post" enctype="multipart/form-data">
    <font face="bookman old style"><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSelect file:
    <input type="file" name="fileToUpload" id="fileToUpload">
	<br><br>
    <input id="filename" placeholder="Title" type="text" name="filename" required="" tabindex="1" value="<?php if(isset($_POST['filename'])){ echo htmlentities($_POST['filename']);}?>"/>
<form method="get">
    <select name="parent_cat" id="parent_cat">
        <?php while($row = mysql_fetch_array($query_parent)): ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['sem']; ?></option>
        <?php endwhile; ?>
    </select>
    
 
    <select name="sub_cat" id="sub_cat"></select>
</form>


<select name="type" >
	 <option value="def">--Select Type--</option>
  <option value="1">Notes</option>
  <option value="2">Question Paper</option>
  <option value="3">Other</option>
  </select>
    <input type="submit" value="Upload File" name="submit">
<br><br>	Upload by: <?php echo $name ?>
</form>
 </div>
</body>
</html>

<?php
$con=mysqli_connect("localhost","root","vain","aces");
if(isset($_POST['submit']))
{
$type=$_POST['type'];
$sem=$_POST['parent_cat'];

$filename=mysql_real_escape_string($_POST['filename']);
$target_dir = "uploads/";
$target_file = $target_dir . basename(str_replace("'", "_", str_replace("#",'_',$_FILES["fileToUpload"]["name"])));
//$target_file = $target_dir . basename(stripslashes($_FILES["fileToUpload"]["name"]));
$uplfl=mysql_real_escape_string($target_dir . basename($_FILES["fileToUpload"]["name"]));
//$target_file = mysql_real_escape_string($target_dir.$filename));
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uplfl = mysql_real_escape_string($target_dir. basename($_FILES["fileToUpload"]["tmp_name"]));

//LE CHECK FOR COMPLEZION-------------\
if($filename =='')
{
echo "<script> alert('Please enter filename')</script>";
exit();
}
if($sem ==0)
{
echo "<script> alert('Please select Semester and subject')</script>";
exit();
}
$sub=$_POST['sub_cat'];
if($type =='def')
{
echo "<script> alert('Please select type')</script>";
exit();
}
// Check if file already exists
if($_FILES["fileToUpload"]["tmp_name"]==NULL)
{
 echo "<script> alert('Select a file')</script>";
    $uploadOk = 0;
	}
else if (file_exists($target_file)) {
    echo "<script> alert('File Already exists')</script>";
    $uploadOk = 0;
}

// if everything is ok, try to upload file
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	//if (move_uploaded_file($uplfl, $target_file)){
        echo "<script> alert('Upload success | Filename: $filename | Author: $name')</script>";
		//LE ALL THE STUFF TO SEND--------------------------------------
		$query= "insert into files(filepath,filename,sem,sub,type,author) values ('$target_file','$filename','$sem','$sub','$type','$name')";
		mysqli_query($con,$query);
		
		
		exit();
		}
		}
		}
?>
<?php
			include('includes/footer.php');
           ?>