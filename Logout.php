<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['Username']);
header("Location: index.php");

?>
<script>
      localStorage.setItem('lastpage', " ")
</script>