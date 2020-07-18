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
<form method="get">
    <select name="parent_cat" id="parent_cat">
        <?php while($row = mysql_fetch_array($query_parent)): ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['sem']; ?></option>
        <?php endwhile; ?>
    </select>
    
 
    <select name="sub_cat" id="sub_cat"></select>
</form>
<?php

$sql = "SELECT filepath,filename, sem, sub, type, author FROM files order by(sem)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table><tr><th>Filename</th><th>Semester</th><th>Subject</th><th>Type</th><th>Uploader</th><th>Download</th></tr>";
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
	
         echo "<tr><td>" . $roww["filename"]. "</td><td>" . $sem. "</td><td>" . $sub. "</td><td>" . $type. "</td><td>" . $realname. "</td><td>" . '<a href="' . $roww["filepath"] . '"> <img border="0" src="includes/downloadicon.png" width="17" height="16" align="center"> </a>' . "</td></tr>";
     }
     echo "</table>";
}
 else {
     echo "0 results";
}

$conn->close();
?> 
</body>
</html>