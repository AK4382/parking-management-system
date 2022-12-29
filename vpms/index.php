<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['vpmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VPMS Login | Admin</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
	<style>
	body {margin: 0;padding: 0;font-family: 'Poppins', sans-serif;}
	body:before {
	content: '';
	position:fixed;
	width: 100vw;
	height: 100vh;
	background-image: url(images/1.jpg);
	background-position: center center;
	background-repeat: no-repeat;
	background-attachment: fixed;
	-webkit-background-size: cover;
	background-size: cover;
	-webkit-filter: blur(8px);
	-moz-filter: blur(8px);
	filter: blur(8px);}
	.contact-form {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 400px;
	height: 350px;
	padding: 80px 300px;
	border-radius: 15px ;
	background: rgba(90, 88, 88, 0.5);
	box-shadow: 0 10px 10px -2px rgba(0, 0, 0, 0.651);}
	.avatar {
	position: absolute;
	width: 80px;
	height: 80px;
	border-radius: 50%;
	overflow: hidden;
	top: calc(-80px/2);
	left: 700px;
	box-shadow: 0 10px 10px -2px rgba(0, 0, 0, 0.651);}
	.contact-form h2{
	margin: 0;
	padding: 0 0 20px;
	color: #fff;
	text-shadow: 2px 2px #050505af;
	text-align: center;
	text-transform: uppercase;
	letter-spacing: 1px;
	font-family: "Courier New", monospace;}
	.contact-form h3{
	margin: 0;
	padding: 0 0 20px;
	color: #fff;
	text-shadow: 2px 2px #050505af;
	margin-bottom: 2%;
	text-align: center;
	font-family: "Courier New", monospace;}
	.contact-form p {
	margin: 0;
	padding: 0;
	color: #fff;
	margin-bottom: 5px;
	text-shadow: 2px 2px #050505af;}
	.contact-form input {
	width: 100%;
	margin-bottom: 20px;}
	.contact-form input[type=text], .contact-form input[type=password] {
	border: none;
	box-shadow: 0 10px 10px -2px rgba(0, 0, 0, 0.5);
	outline: none;
	border-radius:15px;
	text-indent: 10px;
	height: 40px;
	background: #bdbebe;
	color: rgb(0, 0, 0);
	font-size: 16px;}
	.contact-form input[type=submit] {
	height: 30px;
	color: #fff;
	font-size: 15px;
    background: linear-gradient(to right,#131db1,#769fd4);
	cursor: pointer;
	border-radius: 25px;
	border: none;
	outline: none;
	margin-top: 4%;
	opacity: 80% ;
	width: 200px;
	box-shadow: 0 10px 10px -2px rgba(0, 0, 0, 0.5);
	margin-left: 25%;}
	.contact-form a {
	color: #fff;
	font-size: 15px;
	text-decoration:underline;
	margin: 33%;}
	.contact-form input[type=submit]:hover{
	opacity: 100%;
	background-color: rgb(27, 94, 182);}
	.contact-form input[type=text]:focus, .contact-form input[type=password]:focus{
	background-color: #9fdfdf;}
	.rightshift{
	position: absolute;
	top: 20%;
	left: 55%;}
	.vl {
	border-left: 2px solid rgba(37, 37, 37, 0.89);
	height: 400px;
	position: absolute;
	left: 50%;
	margin-left: -3px;
	top: 10%;}
	.parkingpic{
	position: absolute;
	width: 450px;
	height: 400px;
	overflow:initial;
	top:auto;
	left: 40px;}
	</style>
</head>
<body>
	<div class="contact-form">
		<img alt="" class="avatar" src="images/a1.jpg">
		<div class="rightshift">
			<h2>Parking Management</h2><h3>Administrator</h3>
			<form  method="post">
				<p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}  ?> </p>
			<p>Username :</p>
			<input placeholder="Enter Username" type="text" name="username" required="true">
			<p>Password :</p>
			<input placeholder="Enter Password" type="password" name="password" required="true">
			<input type="submit" name="login" value="Sign in" >
			<br>
			<a href="forgot-password.php">Forgot Password?</a>
			</form>
		</div>
		<div class="vl"></div>
		<div class="parking"><img class="parkingpic" src="images/parking.png" alt="Parking"></div>
	</div>
</body>
</html>
