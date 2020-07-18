
<html>
<head>
<title>ACES- Login </title>
</head>

<style>
input[type=text], select {
    width: 100%;
    padding: 10px 5px;
    margin: 5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
}
input[type=text]:focus {
    border: 1px solid #555;
}

input[type=password], select {
    width: 100%;
    padding: 10px 5px;
    margin: 5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
}
input[type=password]:focus {
    border: 1px solid #555;
}

input[type=submit] {
    width: 80%;
    background-color: orange;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
	border: 1px solid #ccc;
    border-radius: 8px;
    cursor: pointer;
	}

input[type=submit]:hover{
background-color: blue;
    border: none;
    color: white;
	}
	
div {
    height: 250px;
    width: 300px;
	position:absolute;
    top: 170px;
    right: 80px;
	border-radius: 10px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<body background="ACESTEMP.png" type="fill"></body>
<body>
<div>
  <form method="post" action="">
	
	<label  for="reg"><font face="bookman old style">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLogin</label><br><br>
    <input id="name" placeholder="Username" type="text" name="name" required="" tabindex="1" value="<?php if(isset($_POST['name'])){ echo htmlentities($_POST['name']);}?>"/>
    <input id="password" placeholder="Password" type="password" name="password" required="" tabindex="1">

     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" name="submit" color="black"  value="Submit">
	 <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="register.php" font face="bookman old style">Sign up</a></p>

</form>
</div>
</body>
<?php
//APRIL 16 2017. NishYou.
session_start();
$con=mysqli_connect("localhost","root","vain","aces");

 //LE CHECKING DA CONNECTION---------------------------------------------------
 
 if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   
 //LE SENDING STUFF-----------------------------------------------------------
 
if(isset($_POST['submit']))
{
$name=mysql_real_escape_string($_POST['name']);
 $password=$_POST['password'];
 
//LE CHECKING FOR UNFILLED FIELDS------------------------------------------------
if($name =='')
{
echo "<script> alert('Please enter your name')</script>";
exit();
}
if($password =='')
{
echo "<script> alert('Please enter your password')</script>";
exit();
}

//LE CHECK AND LOGIN--------------------------------------------

$query="select * from logindetails where name='$name' and password='$password'" or die(mysqli_error());
   $run=mysqli_query($con,$query);
   if(mysqli_num_rows($run)>0)
   {
     $_SESSION['name']=mysql_real_escape_string($name);

	 
	 $getinfo = "select faculty,admin from logindetails where name='$name' and password='$password'";

if ($result = $con->query($getinfo)) {    
     while ($row = $result->fetch_object()) {
        $faculty = $row->faculty;
		$admin = $row->admin;
		$_SESSION['faculty']=$faculty;
		$_SESSION['admin']=$admin;
    }
    $result->close();
	 }
	 
	 
   echo "<script> window.open('userhome.php','_self')</script>";
   }
   else
   {
    echo "<script> alert('Invalid Login')</script>";
   }
}
mysqli_close($con);
?>

</html>