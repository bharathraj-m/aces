<?php
include('includes/header.php');

$name = $_SESSION["name"] ;
$faculty = $_SESSION["faculty"] ;
$admin = $_SESSION['admin'];

?>
<!DOCTYPE html>
<html>
<head>
    </head><body background="includes/files.jpg" style=" background-size: 1366px 768px;"></body>
<body>   

<div style="text-align:center;
	height: 400px;
    width: 260px;
	position:absolute;
    top: 140px;
    left: 980px;
	font-size:24px;
	border-radius: 10px;
	border-style:solid;
	border-color: orange;
    background-color: #f2f2f2;
    padding: 20px;">
	  <font face="Garamond">
	  
	 <br>
<b><i>Guided by</i></b><br>
Sharath K R
<br>	  <br>
<b><i>The team</i></b><br>
Amith Shankar P<br>
Bharathraj M<br>
Nishanth Anchan K N<br>
Ramachandra Bhat
<br><br>
<b><i>Feedback</i></b>
acesportal@gmail.com
</font>
</div>
<div style="text-align:center;
	height: 400px;
    width: 800px;
	position:absolute;
    top: 140px;
    left: 80px;
	font-size:24px;
	border-radius: 10px;
	border-style:solid;
	border-color: orange;
    background-color: #f2f2f2;
    padding: 20px;">
	  <font face="Garamond">
	  <b><u><br>ACES PORTAL</u></b><br><br>
	  A mini-project to create a file uploading/downloading hub for the faculty and students under ACES. <i>Uses: HTML, PHP, CSS, JavaScript etc.</i>
	 <br><br>
	 This project is still in development.<br><br>
	 <b>Upcoming planned features include:</b><br>
	 Events list<br>
	 File info editing(Faculty)<br>
	 Search by filename(Users)<br>
	 File request form(Users)
</font>
</div>
    </body>
</html>
 <?php
			include('includes/footer.php');
           ?>