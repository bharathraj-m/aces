<html>
<head>
<title>ACES- Login </title>
</head>

<style>
input[type=text], select {
    width: 100%;
    padding: 3px 5px;
    margin: 5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
}
input[type=text]:focus {
    border: 1px solid #555;
}
input[type=email], select {
    width: 100%;
    padding: 3px 5px;
    margin: 5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
}
input[type=email]:focus {
    border: 1px solid #555;
}

input[type=password], select {
    width: 100%;
    padding: 3px 5px;
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
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
	border: 1px solid #ccc;
    border-radius: 8px;
    cursor: pointer;
	}

input[type=submit]:hover{
background-color: grey;
    border: none;
    color: black;
	}
	
div {
    height: 350px;
    width: 300px;
	position:absolute;
    top: 20px;
    right: 20px;
	border-radius: 10px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<body>
<div>
  <form method="post" action="">
	
	<label  for="reg">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<u><b>USER&nbsp&nbspLOGIN</b></u></label><br><br>
    <input placeholder="username" type="text" name="name">
    <input placeholder="password" type="password" name="password">

     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" name="submit" color="black"  value="Submit">
	 <p><a href="admin_login.php" font face="verdana">Admin Login</a></p>
	 <p><a href="customer_details.php" font face="verdana">User Registration</a></p>

</form>
</div>
</body>
<?php
session_start();
$con=mysqli_connect("localhost","root","vain","aces");
 // Check connection
 if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
if(isset($_POST['submit']))
{
$name=$_POST['name'];
 $password=$_POST['password'];
 

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

$query="select * from logindetails where name='$name' and password='$password'" or die(mysqli_error());
   $run=mysqli_query($con,$query);
   if(mysqli_num_rows($run)>0)
   {
     $_SESSION['name']=$name;
   echo "<script> window.open('user_home.php','_self')</script>";
   }
   else
   {
    echo "<script> alert('Invalid Login')</script>";
   }
}
mysqli_close($con);
?>

</html>