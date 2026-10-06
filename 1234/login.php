<?php
session_start();
error_reporting(0);
include('includes/config.php');
// Code user Registration
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$contactno=$_POST['contactno'];
$password=md5($_POST['password']);
$query=mysqli_query($conn,"insert into users(name,email,contactno,password) values('$name','$email','$contactno','$password')");
if($query)
{
	echo "<script>alert('You are successfully register');</script>";
}
else{
echo "<script>alert('Not register something went worng');</script>";
}
}
// Code for User login
if(isset($_POST['login']))
{
   $email=$_POST['email'];
   $password=md5($_POST['password']);
$query=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="my-cart.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($conn,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$extra="login.php";
$email=$_POST['email'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
$log=mysqli_query($conn,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Invalid email id or Password";
exit();
}
}


?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        h2{
            color: green;font-size: 34px;text-align: center;margin-bottom: 20px;
        }
        .form-box.active{
            width: 100%;max-width: 450px;padding: 30px;background: #fff;border-radius: 10px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);display: block;
        }
        
        p{
            color: #6e6702;margin-bottom: 10px;font-size:14.5px;
        }
        input{
            width: 100%;padding: 12px;background: #eee;border-radius: 6px;border: none;outline: none;font-size: 16px;color: #333;margin-bottom: 20px;
        }
        button{
            width: 100%;padding: 12px;background: #7494ec;border-radius: 6px;border: none;cursor: pointer;font-size: 16px;color: #fff;font-weight: 500;margin-bottom: 20px;transition: 0.5s;
        }
        button:hover{
            background: #060adb;
        }
        a{
            color: #060adb;text-decoration:underline;
        }
        .error-message {
            padding: 12px;
            background: #f8d7da;
            border-radius: 6px;
            font-size: 16px;
            color: #a42834;
            text-align: center;
            margin-bottom: 20px;
        }
   
        
    </style>
</head>
<body style="display: flex;justify-content: center;align-items: center;min-height: 100vh;background: linear-gradient(to right, #e2e2e2, #c9d6ff);color: #333;">
    <div style="margin: 0 15px;" class="container">
        <div class="form-box" id="login-form">
            <form action="login_register.php" method="post">
                <h2>Welcome to YHWH.</h2>
                <p>YHWH secure your details.</p>
                <input type="email" name="email" placeholder="Enter Email" required autocomplete="New-Email">
                <p style="color: red;margin-bottom: 10px;font-size:14.5px;">Please remember your password</p>
                <input type="password" name="password" placeholder="Enter password" required autocomplete="New-password">
                <button type="submit" name="login">Login</button>
                <p style="color: green;"font-size: 20.5px;text-align: center;>Don't heve an account? <a href="#">Register here</a></p>
            </form>

        </div>
        
    </div>


<script src="js/script4.js"></script>
</body>
</html>