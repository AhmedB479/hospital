<?php
    session_start();
function checker(){
  if (isset($_SESSION["Username"])){
  
  }
  else{
    session_destroy();
    echo '<script type ="text/javascript"> alert("Please login"); window.location.href = "frontend.php"; </script>';
}}

?>