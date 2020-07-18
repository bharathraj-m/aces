<?php
session_set_cookie_params(0);
session_start();
if($_SESSION["name"]==null)
{
sleep(3);
header("location:login.php");
}
$name = mysql_real_escape_string($_SESSION["name"]) ;
$faculty = $_SESSION["faculty"] ;
$admin = $_SESSION['admin'];
?>

<!DOCTYPE html>
<html>
 <head>
  <title> ACES PORTAL</title>
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  </head>

 <body>
 <div class="wrap">
      <div class="header">
		   <div class="header-left">
		   <h2><b>ACES</b></h2>
		    <h5>Association of Computer Engineering Students</h5>
		    </div>
			<div class="header-right">
		     <ul>
			 <li><a href="userhome.php">HOME</a></li>
			 <li><a href="faculty.php">FACULTY</a></li>
			 			 <li><a href="files.php">FILES</a></li>
			 <?php
if($faculty=='1')
//9/5/17 1700
{?>


			 <li><a href="upload.php">UPLOAD</a></li>

			 <li><a href="myfiles.php">MY FILES</a></li>
			 
			<?php
}
?> 
<?php
if($admin=='1')
//9/5/17 1700
{?>


			 <li><a href="adminfiles.php">ALL FILES</a></li>
			 <li><a href="adminusers.php">USERS</a></li>
			<?php
}
?> 
			 <li class="last"><a href="logout.php">LOGOUT<b><font color="brown">[<?php echo $name; ?>]</font></b></a></li>
			 </ul>
			 
		    </div>
        </div>
  
    
</div>
 </body>
</html>