

<!-- Page Body Start-->
<div class="page-body-wrapper horizontal-menu">
  <!-- Page Sidebar Start-->
  <header class="main-nav">
    <!--<div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="../assets/images/dashboard/1.png" alt="">-->
    <!--  <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html">-->
    <!--    <h6 class="mt-3 f-14 f-w-600"><?php echo $_SESSION['Username']; ?></h6></a>-->
    <!--  <p class="mb-0 font-roboto">Product</p>-->
    <!--</div>-->
<nav id="dept_17" class="none">
</nav>
    



  </header>
  <!-- Page Sidebar Ends-->
<input value="<?php echo $_SESSION['Username']; ?>" id="uname" style="display:none"/>  

<script>
    
    var uname = $("#uname").val()
    
var settings = {
  "url": "https://backup.thriftops.com/include/api/fetchid.php?id="+uname,
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
};

$.ajax(settings).done(function (response) {
    
 
 if (response == 1) {
  var navElement = document.getElementById('dept_1');
  navElement.classList.remove('none');
  const purchaseRequestsLink = document.querySelector('#purchase-requests a');
  purchaseRequestsLink.href = '../include/rider';
}
// console.log(response);

});


    
</script>


    

    
