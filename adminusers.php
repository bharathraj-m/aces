<?php

include('includes/header.php');
$name = $_SESSION["name"] ;
include('config.php'); 
$query_parent = mysql_query("SELECT * FROM semester") or die("Query failed: ".mysql_error());
?>
<!DOCTYPE html>
<html>
<head>
<style>



</style>
</head><body background="includes/files.jpg" style=" background-size: 1366px 768px;"></body>
<body>
<br>
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

<?php
$file = "uploads/Aesop_s Fables (Aesop).epub";
?>

<?php

$sql = "SELECT name,realname,email,faculty,admin FROM logindetails where admin=0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table><tr><th>Username</th><th>Name</th><th>Email</th><th>Faculty</th><th>Faculty Permission</th><th>Delete</th></tr>";
     // output data of each row
     while($roww = $result->fetch_assoc()) {
	
         echo "<tr><td>" . $roww["name"]. "</td><td>" . $roww["realname"]. "</td><td>" . $roww["email"]. "</td><td>" . $roww["faculty"]. "</td><td>" . '<a href="?changeperm='.$roww["name"].'" >Change</a>' . "</td><td>" . '<a href="?delete='.$roww["name"].'" >Delete</a>' . "</td></tr>";
     }
     echo "</table>";
}
 else {?>
      <div class ="jj">
	  <font face="bookman old style">
Well... There's no one here :(
</font>
</div>
<?php
	 }


?> 

<?php
    if (isset($_GET['delete'])) 
	{ $filee=$_GET['delete'];
	$sqll = "DELETE FROM logindetails where name='$filee'";
	$resulst = $conn->query($sqll);
	header( "Location:http://localhost/aces/adminusers.php" );
	}
?>

<?php
    if (isset($_GET['changeperm'])) 
	{ $filee=$_GET['changeperm'];
	
	$sqls = "SELECT faculty FROM logindetails where name='$filee'";
	$resulsts = $conn->query($sqls);
	$rowww = $resulsts->fetch_assoc();
	
	if($rowww["faculty"]=='1')
	{
    $sqlll = "UPDATE logindetails SET faculty='0' where name='$filee'";
	$resulsst = $conn->query($sqlll);
	}
	else
	{
    $sqllll = "UPDATE logindetails SET faculty='1' where name='$filee'";
	$resulsssst = $conn->query($sqllll);
	}
	
	header( "Location:http://localhost/aces/adminusers.php" );
	}
?>

<?php
if(isset($_POST['submit'])){
header("Location:http://localhost/aces/files.php");
exit;
}
?><br><br><br></body>
</html>
<?php
			include('includes/footer.php');
           ?>