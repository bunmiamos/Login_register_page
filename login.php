<?php
session_start();
include "connect.php";
include "config.php";
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST["login"])) {
	$recaptchaResponse = $_POST["g-recaptcha-response"];
    $userIp = $_SERVER["REMOTE_ADDR"];

    $request = "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}&remoteip={$userIp}";
    $content = file_get_contents($request);
    $json = json_decode($content);
    if ($json->success == "true") {
       
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	 }
 
	 $email = validate($_POST['email']);
	 $password = validate($_POST['password']);
	 $recaptchaResponse = $_POST["g-recaptcha-response"];
	 $userIp = $_SERVER["REMOTE_ADDR"];
 
	 $request = "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}&remoteip={$userIp}";
	 $content = file_get_contents($request);
	 $json = json_decode($content);
	
	 if (empty($email)) {
		 header("Location:fyi.php? error=User Name is required");
		 exit();
	 }else if(empty($password)){
		 header("Location:fyi.php?error=Password is required");
		 exit();
	 
	 }else{
 
		 $sql ="SELECT * FROM user WHERE user_name='$email' AND password='$password'";
 
		 $res = mysqli_query($link, $sql);
 
		 if (mysqli_num_rows($res) === 1) {
			 $row = mysqli_fetch_assoc($res);
			 if ($row['user_name']===$email && $row ['password']===$password) {
				 $_SESSION['user_name'] = $row['user_name'];
				 $_SESSION['name'] = $row['name'];
				 $_SESSION['id'] = $row['id'];
				 header("Location:home.php");
				 exit();
			 }else{
				 header("Location: fyi.php?error=Incorect User name or password");
				 exit();
			 }
		 }else{
			 header("Location: fyi.php?error=Incorect User name or password");
			 exit();
		 }
 
	 }
    } else {
        $msg = "You have failed to pass recaptcha. What does this means? ROBOT!";
		header("Location: fyi.php?error$msg");

}
}
?>