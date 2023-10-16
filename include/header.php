<?php
// session_start();

//   if (isset($_SESSION['id']) && $_SESSION['id'] == true) {
      
//       echo "<script>var flag = 1</script>";
//   }
//   else {
      
//       echo '<script>window.location.href="../index.php";</script>';
//   }

// ?>
<?php 
// include ("../include/sessioncheck.php"); 
?>

<html lang="en">
  <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="KICK START YOUR THRIFTOPS SELLING JOURNEY TODAY!">
    <meta name="keywords" content="KICK START YOUR THRIFTOPS SELLING JOURNEY TODAY!">
    <meta name="author" content="ThriftOps">
    <link rel="icon" href="https://thriftops.com/fav.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>ThriftOps</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
     <!-- Custom css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
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
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/date-picker.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/prism.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vector-map.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
     <!--custom cdn-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
     <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css" >
    <link rel="stylesheet" type="text/css" href="../assets/css/select2.css">

    <!--custom js-->
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" defer></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
  
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
    <div class="page-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-main-header">
        <div class="main-header-right row m-0">
          <div class="main-header-left">
            <div class="logo-wrapper" ><a href="../Dashboard/Home.php"><img class="img-fluid" src="../assets/images/logo-b.png" style="width: 160px;" alt=""></a></div>
            <div class="dark-logo-wrapper"><a href="../home"><img class="img-fluid" src="../assets/images/logo.png" style="width: 160px;" alt=""></a></div>
            <!--<div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>-->
          </div>
          <div class="left-menu-header col">
            <ul style="margin-bottom: 0;">
              <li>
                <form class="form-inline search-form" style="margin-bottom: 0;">
                  <div class="search-bg"><i class="fa fa-search"></i>
                    <input class="form-control-plaintext" placeholder="Search here....." id="textdata">
                    <a href="#" id="serachord" class="btn btn-md btn-primary">Search</a>
                  </div>
                </form><span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
              </li>
            </ul>
          </div>
          <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
                <li></li>
              <li class="pt-3"><h4><?php echo $_SESSION['Username']; ?></h4></li>
              
            
              <li class="onhover-c p-0">
               <a href="../Logout"><button id="logoutbtn" class="btn btn-primary-light" type="button" style="padding: 22px 22px;border-radius:2em;"><i class="fa fa-power-off fa-lg"></i></button></a>
              </li>
            </ul>
          </div>
          <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
      </div>
      
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '262619996620703');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=262619996620703&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
      
      
      
  <script>
    document.addEventListener('DOMContentLoaded', function() {
  // Check the session on page load
  var sessionId = "<?php echo $_SESSION['id'] ?>";
  if(sessionId == '') {
    window.location.href = '../include/session.php';
  } else {
    
  }

  // Run the session check every 5 seconds
  setInterval(function() {
    var sessionId = "<?php echo $_SESSION['id'] ?>";
    if(sessionId == '') {
      window.location.href = '../include/session.php';
    } else {
    //   console.log("present");
    }
  }, 5000); // 5000 milliseconds = 5 seconds
});

//  //CUSTOM SCRIPT 
//         $.ajax({
//           url: "https://backup.thriftops.com/ShopifyPush/api/gip.php",
//           type: "POST",
//           data: {url: window.location.href},
//           success: function(response) {
//             // console.log(response);
//             // console.log("WORKING")
//           }
//         });
      
    
</script>
<script>
    // Function to clear localStorage on logout
function clearLocalStorageOnLogout() {
  localStorage.removeItem("redirected"); // Remove the "redirected" flag or any other item from localStorage
  // Add any other localStorage items that you want to clear on logout
}

// Call the function when the logout event occurs
document.getElementById('logoutbtn').addEventListener('click', function() {
  // Call the function to clear localStorage
  clearLocalStorageOnLogout();
  // Add any other logout functionality here, such as redirecting to the login page, etc.
});

$(document).ready(function()
{
    $(document).on('click', '#serachord', function()
    {
        var val=document.getElementById("textdata").value;
        let result = val.includes("-");
        var link=window.location.origin;
        if(result==true)
        {	
        	href=link+'/include/viewProduct.php?id='+val;
            window.open(href);
        }
        else
        {
            href=link+'/include/Order_View.php?GETID='+val;
            window.open(href);
        }
        
    });
});
</script>