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
</head>
<body><body background="includes/files.jpg" style=" background-size: 1366px 768px;"></body>
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

$sql = "SELECT filepath,filename, sem, sub, type, author FROM files where author='$name' order by(sem)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table><tr><th>Filename</th><th>Semester</th><th>Subject</th><th>Type</th><th>Uploader</th><th>Download</th><th>Delete</th></tr>";
     // output data of each row
     while($roww = $result->fetch_assoc()) {
	
	 //-------
	 $getsem = "select sem from semester where id='$roww[sem]'";
if ($resultt = $conn->query($getsem)) {    
     while ($row = $resultt->fetch_object()) {
        $sem = $row->sem;
    }
	$resultt->close();
	}
	 //-------
	 $getsub = "select sub from subjects where id='$roww[sub]'";
if ($resulttt = $conn->query($getsub)) {    
     while ($ro = $resulttt->fetch_object()) {
        $sub = $ro->sub;
    }
	$resulttt->close();
	}
 //--------------
 $gettype = "select type from types where id='$roww[type]'";
if ($resultttt = $conn->query($gettype)) {    
     while ($rowt = $resultttt->fetch_object()) {
        $type = $rowt->type;
    }
	$resultttt->close();
	}
	//-----------
	$getname = "select realname from logindetails where name='$roww[author]'";
if ($resulttttt = $conn->query($getname)) {    
     while ($rown = $resulttttt->fetch_object()) {
        $realname = $rown->realname;
    }
	$resulttttt->close();
	}
	//--------------------------------
	
         echo "<tr><td>" . $roww["filename"]. "</td><td>" . $sem. "</td><td>" . $sub. "</td><td>" . $type. "</td><td>" . $realname. "</td><td>" . '<a href="' . $roww["filepath"] . '"> <img border="0" src="includes/downloadicon.png" width="17" height="16" align="center"> </a>' . "</td><td>" . '<a href="?delete='.$roww["filepath"].'" >Delete</a>' . "</td></tr>";
     }
     echo "</table>";
}
 else {?>
      <div class ="jj">
	  <font face="bookman old style">
You haven't uploaded anything yet :(
</font>
</div>
<?php
	 }


?> 

<?php
    if (isset($_GET['delete'])) 
	{ $filee=$_GET['delete'];
        unlink($_GET['delete']);
    echo "<script> alert('Deleted')</script>";
	$sqll = "DELETE FROM files where filepath='$filee'";
	$resulst = $conn->query($sqll);
	header( "Location:http://localhost/aces/myfiles.php" );
	}
?>

<?php
if(isset($_POST['submit'])){
header("Location:http://localhost/aces/files.php");
exit;
}
?></body>
</html>
<?php
			include('includes/footer.php');
           ?>