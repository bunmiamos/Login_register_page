<?php
include("config.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reder</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
   
</head>
<!----?php
if(isset($_POST['submit']))
{
    print_r($_POST);die;
} 
?>-->
<body>
    <div class="full-page">
        <div class="navbar">
            <nav >
                <ul id='MenuItems' >
                    <li><a href='about.html'>About Us</a></li>
                    <li><a href='services.html'>Services</a></li>
                    <li><a href='contact.html'>Contact</a></li>
                    
                </ul>
            </nav>
        
        <div id='login-form'class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button'onclick='login()'class='toggle-btn'>Log In</button>
                    <button type='button'onclick='register()'class='toggle-btn'>Register</button>
                </div>
                <form  m-+ethod="POST" action="login.php"  id='login' class='input-group-login'>
                <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
            <input type='email' name="email" class='input-field' placeholder='Email Id' required >
		    <input type='password' name="password" class='input-field' placeholder='Enter Password' required>
		    <!--input type='checkbox'  class='check-box'><span>Remember Password</span>-->
            <div class="g-recaptcha" name="recaptcha" data-sitekey="6Lc7vqMhAAAAANrwk7bG7E0tsU_aFbaWPrHDVmz7"></div><br> 
		    <button  type='submit' name= "login" class='submit-btn'>login</button>
		 </form>
         
		  <form method="POST" action ="register.php" id ='register'class='input-group-register'>
          
          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
          <input type='text' name="namez"class='input-field'placeholder='Name' required>   
          <input type='email' name="email" class='input-field' placeholder='Email Id' required >
             <input type='password'name="password"class='input-field'placeholder='Enter Password' required>
		     <input type='password'name="c_password" class='input-field'placeholder='Confirm Password'  required>
		     <input type='checkbox'class='check-box'><span >I agree to the terms and conditions</span2>
             <div class="g-recaptcha" data-sitekey="6Lc7vqMhAAAAANrwk7bG7E0tsU_aFbaWPrHDVmz7"></div>
                    <button type='submit' name="register"class='submit-btn'>Register</button>
	         </form>
             
            <!---- <div class="icons">
                     <a href="https://www.facebook.com/"><ion-icon name="logo-facebook"></ion-icon></a>
                     <a href="https://www.instagram.com/accounts/login/"><ion-icon name="logo-instagram"></ion-icon></a>
                     <a href="https://twitter.com/i/flow/login"><ion-icon name="logo-twitter"></ion-icon></a>
                     <a href="https://accounts.google.com/signin/v2/identifier?hl=en&flowName=GlifWebSignIn&flowEntry=ServiceLogin"><ion-icon name="logo-google"></ion-icon></a>
                     <a href="https://www.linkedin.com/login?fromSignIn=true&trk=guest_homepage-basic_nav-header-signin"><ion-icon name="logo-linkedin"></ion-icon></a>
                    </div>
                 </form>
                ---->
            </div>
            <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        </div>
    </div>
    
	<script src ="script.js"></script>

        
    
</body>
</html>
<script>
      
        grecaptcha.ready(function() {
          grecaptcha.execute('6LfvrJohAAAAALbKhnmi0Rx_ZPEEyeCJmecZGP0R', {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
              function(token){
                var response =document.getElementById('token_generate')
                response.value =token;
              }
          });
        });
      
  </script>+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++