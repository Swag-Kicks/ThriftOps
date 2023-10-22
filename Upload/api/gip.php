<?php
  $ip = $_SERVER['REMOTE_ADDR'];
  $user_agent = $_SERVER['HTTP_USER_AGENT'];
  $url = $_POST['url'];
  $file = fopen("ip.txt", "a"); // open the file in append mode
  fwrite($file, "IP Address: " . $ip . "\nUser Agent: " . $user_agent . "\nURL: " . $url . "\n\n"); // append the data to the file
  fclose($file);
  echo "IP Address: " . $ip . "<br>User Agent: " . $user_agent . "<br>URL: " . $url;
?>