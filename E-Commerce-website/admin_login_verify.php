<?php
// index.php
include "db.php";

session_start();

if(isset($_POST['admin_login_form'])){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_info WHERE admin_email= '$email' AND admin_password= '$password'";
    $run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);
    $row = mysqli_fetch_array($run_query);
    // Set sessions between server and browser if admin is available in DB
    if($count == 1){
        $_SESSION['admin_name'] = $row['admin_name'];
        $_SESSION['admin_email'] = $row['admin_email'];
        header("Location:admin/index.php");
        exit();
    }else{
        header("Location:admin_login.php");
        exit();
    }
}

?>
