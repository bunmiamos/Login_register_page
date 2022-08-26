<?php 
session_start(); 
include "connect.php";
if(isset($_POST['register'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
	
  $name = $_POST['namez'];
	$sql2 = "SELECT * FROM user WHERE user_name='$email' ";
	$result2 = mysqli_query($link, $sql2);

    if (mysqli_num_rows($result2) > 0) {
			header("Location: fyi.php?error=The username is taken try another&$user_data");
	    exit();
    }else{
      $sql2 = "INSERT INTO user (id, user_name, password, name) VALUES(null,'$email', '$password','$name')";
      $result2 = mysqli_query($link, $sql2);
       if ($result2) {
        header("Location: fyi.php?success=Your account has been created successfully");
        exit();
      }else {
        header("Location: fyi.php?error=unknown error occurred&$user_data");
        exit();

      }
  }
}
	
