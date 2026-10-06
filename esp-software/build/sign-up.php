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

  // SAVE ALL DETAILS IN THE DATABASE.
  if(isset($_POST['submit']))
    
        //BUTTON CLICKED.
        {
            //echo "BUTTON CLICKED.";
            // GET DATA FROM REGISTRATION FORM

            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $number = $_POST['number'];
            $password = md5($_POST['password']);// md5 Means password encryption.

            // SET THEM IN THE DATABASE
            $sql = "INSERT INTO tbl_register SET
                full_name = '$full_name',
                email = '$email',
                number = '$number',
                password = '$password'
            ";

            //EXECUTE THE QUERY
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            // CHECK WHETHER THE QUERY IS EXECUTED OR NOT. 
            //HERE IS PLACE WE DISPLAY THE MASSEGES
            if($res==TRUE)
                {
                    //DISPLAY THE MESSAGE
                    $_SESSION['register'] = "<div style='color:green;font-size:25px;display:flex;flex-direction:column;align-items:center;'>Registered: Sign-in Now</div>";
                    //REDIRECTING THE PAGE
                    header('location:' .SITEURL. 'build/sign-in.php');
                    exit();
                }else 
                {
                    // BUTTON NOT CLICKED. 
                    //echo "BUTTON NOT CLICKED."; 
                    // IF FAIL TO REGISTER
                    $_SESSION['register'] = "Registration Fail";
                    // REDIRECTING THE PAGE
                    header('location:' .SITEURL. 'build/sign-up.php');
                    exit();
                }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="" method="POST">
    <div class="registration-form">
        <div class="form-tittle">Create Account.</div>
        <div class="form-substitle">
            
        </div>

        <div class="form-group">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" name="full_name" id="full_name" class="form-input" 
            placeholder="Full Name" />
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email Adress</label>
            <input type="email" id="email" name="email" class="form-input" 
            placeholder="example@gmail.com" />
        </div>
        <div class="form-group">
            <label for="number" class="form-label">Phone Number</label>
            <input type="number" id="number" name="number" class="form-input" 
            placeholder="+255 000 000 000" />
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-password" 
            placeholder="********" />
        </div>
        <button type="submit" name="submit" value="sign-up" class="sign-up">sign-up</button>
        <div class="form-footer">
            <h5>Already Have Account!<a href="sign-in.php">sign-in</a></h5>
        </div>
    </div>
</form>


</body>
</html>