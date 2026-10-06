<?php 
    //DATABASE CONNECTION.
 session_start();

  define('SITEURL', 'http://localhost/esp-software/');
  define('LOCALHOST', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'esp_registration');

  $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD); //db connection
  $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //selecting db


  // CHECK WHETHER THE SIGN-IN BUTTON IS CLICKED OR NOT
  if(isset($_POST['submit']))
    {
    

    
        //BUTTON CLICKED
        //print "BUTTON CLICKED";
        //GET ALL THE DATA FROM THE SIGN-IN FORM
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            ;

        //SQL QUERY TO CHECK IF THE DATA PROVIDED EXIST OR NOT
        $sql = "SELECT * FROM tbl_register WHERE email = '$email' AND password = '$password'";

        //EXECUTE THE QUERY
        $res = mysqli_query($conn, $sql);
                    if (!$res) {
                        die(mysqli_error($conn));
                    }


        //COUNT THE ROWS TO CHECK IF THE USER EXIST OR NOT
            $count = mysqli_num_rows($res);


            if($count==1)
                {
                    //USE FOUND AND ALLOWED TO LOG IN.
                    $_SESSION['login'] = "<div style='color:green;' class='success'>Login successfuly. </div>";
                    $_SESSION['user'] = $email;// check whether user loged in if not denie the acsses

                    //REDIRECTING
                        header('location:' .SITEURL. 'build/user-dashboard.php');
                        
                        exit();

                }
                
                else
                    {
                    //USER NOT FOUNT AND LOGIN FAILED
                        //user not available and login fail
                        $_SESSION['login'] = "<div style='color:red;padding: 5px;font-size: large;' class='error'>Login failed , Try Again.<br> Incorrect username or password </div>";

                        //REDIRECTING
                        header('location:' .SITEURL. 'build/sign-in.php');
                        exit();
                }
                
        
        
                
    }

    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="" method="POST">
    <div class="login-form">
        <?php 
                if(isset($_SESSION['register'])){
                    echo $_SESSION['register'];  //displaying session message
                    unset ($_SESSION['register']); //removing session message
                }
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];  //displaying session message
                    unset ($_SESSION['login']); //removing session message
                }
                
                
        ?>
        <div class="login-title">
            <h1 class="imog"><img 
            src="Incubator-project-logo.png" width="100px" height="100px"></h1>
            
            <p class="paragraph">welcome back !  <br/><span>Login to your account.</span> </p>
        </div>
        
        <div class="form-group">
            <h1>Email | Phone number:</h1>
            <input type="email" id="email" name="email" placeholder="example@gmail.com">
        </div>
        <div class="form-group">
            <h1>Password</h1>
            <input type="password" id="password" name="password" placeholder="******">
        </div>
        <div class="form-group">
            <button type="submit" id="submit" name="submit" value="sign-in" class="sign-in">sign-in</button>
        </div>
        <div class="form-footer">
            <h5>Don't have an Account!<a href="sign-up.php">sign-up</a></h5>
        </div>

        
    </div>
</form>
</body>
</html>