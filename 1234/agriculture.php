    // Authorization - Access Control
// check whether the user is loged in or not
if(!isset($_SESSION['user'])) //If user session is not set
    {
        //user is not logged in
        //redirect to login page
        $_SESSION['no-login-message'] = "<div style='color: #6e0000;' class='error'>Please Login First To Access Admin System.</div>";
        //Redirect to login page.
        header('location:'.SITEURL. 'admin/login.php');
    }
