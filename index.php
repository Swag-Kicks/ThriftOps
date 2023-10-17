<?php
session_start();
include_once("include/mysql_connection.php"); 
error_reporting(0);


if(isset($_POST['submit']))
{
  $c_uname =$_POST['username'];
  $cp_ass =$_POST['password'];

  $user=mysqli_real_escape_string($mysql, $c_uname);
  $pass=mysqli_real_escape_string($mysql, $cp_ass);
  $pass=md5($pass);
  

  $sql = "SELECT * FROM User WHERE Username='$user' AND Password='$pass'";
  $result = mysqli_query($mysql, $sql);

  $row=mysqli_fetch_array($result);
  $name=$row['Username'];
  $counter=mysqli_num_rows ($result);
  $id=$row['User_ID'];
  if ($counter == 0) 
  {
    echo '<script>alert("Invalid ID Or Password");window.location.href="index.php";</script>';

  }
  else
  {
    $_SESSION['id']=$id;
    $_SESSION['Username']=$name;

    echo '<script>window.location.href="Dashboard/Home.php";</script>';
  }



}

?>

 <script>
//       var session = localStorage.getItem('lastpage', window.location.href)
//       var URL = "https://backup.thriftops.com"
//       if (session == URL){
//           localStorage.setItem('lastpage', " ")
//       console.log(session)
//       }
 </script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
     <link rel="icon" href="https://thriftops.com/fav.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>ThriftOps</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
         <!-- Custom css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <section>
      <div class="container-fluid">
        <div class="row">
            <div class="main-header-left">
            <!--<div class="login-wrapper" ><a href="../home"><img class="img-fluid" src="../assets/images/logo-b.png" style="width: 160px;" alt=""></a></div>-->
            <div class="dark-login-wrapper"></div>
          </div>
          <div class="col-xl-5 profile-greeting" id="random" style="filter: brightness(0.7);"> </div>
          <div class="col-xl-7 p-0">  
          
            <div class="login-card">
                
              <form class="theme-form login-form" role="form" id='login' action="" method='post' accept-charset='UTF-8'>
                  <a href="../index"><img class="img-fluid" src="../assets/images/logo-b.png" style="width: 228px;margin-bottom: 45px;
    margin-left: 81px;image-rendering: -webkit-optimize-contrast;" alt=""></a>
                <h4>Login</h4>
                <br>
                <div class="form-group">
                  <label>User Name</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                    <input class="form-control" type="text" required="" placeholder="123@gmail.com" name='username' id='username'  maxlength="50" placeholder="Username" aria-label="Email" aria-describedby="email-addon">
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                    <input class="form-control" type="password" name='password' id='password' maxlength="50"  placeholder="*********">
                    <div class="show-hide"><span id="show-password-btn" class="show"></span></div>
                  </div>
                  <!--<a href="forgot-password.html" class="btn1 btn-link f-right">Forgot password?</a>-->
                </div>
                <div class="form-group">
                  <!--<div class="checkbox">-->
                  <!--  <input id="checkbox1" type="checkbox">-->
                  <!--  <label class="text-muted" for="checkbox1">Remember password</label>-->
                  <!--</div>-->
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name='submit' value='Submit'>Log in</button></div>
                 <div class="login-social-title">                
                  <h5>Thrift<span class="OO">O</span>ps</h5>
                </div>
                <!--<p>Don't have account?<a class="ms-2" href="sign-up.html">Create Account</a></p>-->
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- page-wrapper end-->
    <!-- latest jquery-->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="../assets/js/sidebar-menu.js"></script>
    <script src="../assets/js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap/popper.min.js"></script>
    <script src="../assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../assets/js/script.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>
<script>
    // Define an array of image URLs
// const bgImages = [
//   "/assets/images/login-banner/1.jpg",
//   "/assets/images/login-banner/2.jpg",
//   "/assets/images/login-banner/3.jpg",
//   "/assets/images/login-banner/4.jpg",
//   "/assets/images/login-banner/5.jpg",
//   "/assets/images/login-banner/6.jpg",
// ];

// // Select a random image URL from the array
// const randomImage = bgImages[Math.floor(Math.random() * bgImages.length)];

// // Set the background image of the #bg-image element to the selected image
// document.getElementById("bg-image").style.backgroundImage = `url(${randomImage})`;

var image = new Array ();
image[0] = "https://backup.thriftops.com/assets/images/login-banner/1.jpg";
image[1] = "https://backup.thriftops.com/assets/images/login-banner/2.jpg";
image[2] = "https://backup.thriftops.com/assets/images/login-banner/3.jpg";
image[3] = "https://backup.thriftops.com/assets/images/login-banner/4.jpg";
image[4] = "https://backup.thriftops.com/assets/images/login-banner/5.jpg";
image[5] = "https://backup.thriftops.com/assets/images/login-banner/6.jpg";
image[6] = "https://backup.thriftops.com/assets/images/login-banner/7.jpg";
image[7] = "https://backup.thriftops.com/assets/images/login-banner/8.jpg";
image[8] = "https://backup.thriftops.com/assets/images/login-banner/9.jpg";
image[9] = "https://backup.thriftops.com/assets/images/login-banner/10.jpg";
image[10] = "https://backup.thriftops.com/assets/images/login-banner/11.jpg";

var size = image.length
var x = Math.floor(size*Math.random());
document.getElementById("random").style.backgroundImage = `url(${image[x]})`;
document.getElementById("random").style.backgroundSize = "cover";


</script>
<script>
    const passwordInput = document.getElementById('password');
const showPasswordButton = document.getElementById('show-password-btn');

showPasswordButton.addEventListener('click', () => {
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    showPasswordButton.textContent = 'Hide';
  } else {
    passwordInput.type = 'password';
    showPasswordButton.textContent = '';
  }
});
</script>