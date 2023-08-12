// window.addEventListener("beforeunload", function(e){
//   localStorage.setItem("lastpage", window.location.href);
// });
<?php
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
  // Check the session on page load
  var sessionId = "<?php echo $_SESSION['id'] ?>";
  if(sessionId == '') {
    window.location.href = '../index.php';
  } else {
    // Do nothing
  }

  // Run the session check every 5 seconds
  setInterval(function() {
    var sessionId = "<?php echo $_SESSION['id'] ?>";
    if(sessionId == '') {
      window.location.href = '../index.php';
    } else {
      console.log("present");
    }
  }, 5000); // 5000 milliseconds = 5 seconds
});
    
</script>

