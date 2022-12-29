<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

    $query=mysqli_query($con,"select ID from tbladmin where  Email='$email' and MobileNumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
    $_SESSION['contactno']=$contactno;
    $_SESSION['email']=$email;
    header('location:dashboard.php');
    }
    else{
    $msg="Access denied! Unauthorized user";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VPMS|Password Recovery</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
	<style>
	body {
	margin: 0;
	padding: 0;
	font-family: 'Poppins', sans-serif;}
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
	}
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
	margin: 43%;}
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
	height: 450px;
	overflow:initial;
	top:auto;
	left: 40px;}
	</style>
</head>
<body>
	<div class="contact-form">
		<img alt="" class="avatar" src="images/a2.png">
		<div class="rightshift">
			<h2>Parking Management</h2><h3>Forgot Password</h3>
			<form  method="post">
				<p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}  ?> </p>
			<p>Email :</p>
			<input placeholder="Enter registered E-mail" type="text" name="email" required="true">
			<p>Mobile Number :</p>
			<input placeholder="Enter registered Mobile Number" type="text" name="contactno" required="true">
			<input type="submit" name="submit" value="Bypass" >
			<br>
			<a href="index.php">Sign In</a>
			</form>
		</div>
		<div class="vl"></div>
		<div class="parking"><img class="parkingpic" src="images/forgot.png" alt="Parking"></div>
	</div>
</body>
</html>
