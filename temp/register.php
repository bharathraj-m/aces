<html>
<head>
<title>ACES- Sign up </title>
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
input[type=email], select {
    width: 100%;
    padding: 10px 5px;
    margin: 5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
}
input[type=email]:focus {
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
    height: 350px;
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
	
	<label  for="reg"><font face="bookman old style">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSign up</label><br><br>
    <input placeholder="Name" type="text" name="realname">
	<input placeholder="Unique username" type="text" name="name">
    <input placeholder="Password" type="password" name="password">
	<input placeholder="Email" type="email" name="email">
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" name="submit" color="black"  value="Submit">
	 <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="login.php" font face="bookman old style">login</a></p>

</form>
</div>
</body> 

<?php
session_start();
$con=mysqli_connect("localhost","root","vain","aces");

 //CHECK CONNECTION----------------------------------------------------------------
 if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   
 //LE SENDING STUFF-------------------------------------------------------------------
if(isset($_POST['submit']))
{
$realname=$_POST['realname'];
$name=$_POST['name'];
  $password=$_POST['password'];
 $email=$_POST['email'];
 
//LE CHECKING FOR UNFILLED FIELDS-----------------------------------------------------

if($realname =='')
{
echo "<script> alert('Please enter your name')</script>";
exit();
}

if($name =='')
{
echo "<script> alert('Please enter your username')</script>";
exit();
}

if($password =='')
{
echo "<script> alert('Please enter your password')</script>";
exit();
}
if($email =='')
{
echo "<script> alert('Please enter your email')</script>";
exit();
}

//LE CHECKING IF STUFF ALREADY EXISTS--------------------------------------------

$check_email="select * from logindetails where email='$email'";

$run=mysqli_query($con,$check_email);

if(mysqli_num_rows($run)>0)
{
echo "<script> alert('Email already exists') </script>";
exit();
}

$check_usrname="select * from logindetails where name='$name'";

$go=mysqli_query($con,$check_usrname);

if(mysqli_num_rows($go)>0)
{
echo "<script> alert(':( Username already taken, try another.') </script>";
exit();
}

//LE INSERTING STUFF INTO DA TABLE---------------------------------------------------

$query= "insert into logindetails(realname,name,password,email) values ('$realname','$name','$password','$email')";

if(mysqli_query($con,$query))
{
$_SESSION['name']=$name;
echo "<script> alert('User is Succussfully registered')</script>";

}
}
mysqli_close($con);
?>

</html>