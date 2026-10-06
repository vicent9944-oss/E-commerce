<?php 
// GET ALL DETAILS FROM THE TABLE.
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$number = $_POST['number'];

// Hash the password OR ENCRYPT THE PASSWORD.
    $password = md5($password);

//SAVE THE DATA IN TO THE DATA BASE
$conn = new mysqli('localhost', 'root', '','esp_registration');
//Check the connection
if($conn->connect_error){
    die('Connection Failed : ' .$conn->connect_error);
    
}
else{
        //we save the data
        $stmt = $conn->prepare("insert into tbl_register(full_name, email, password, number)values(?,?,?,?)");
$full_name = $_POST['full_name'];
        $stmt->bind_param("sssi",$full_name, $email, $password, $number);
        

        if ($stmt->execute()) {

    // Registration successful
    header("Location: sign-in.php");
    exit();

} else {
    echo "Registration failed: " . $stmt->error;
}
        
}

?>