<?php
   session_start();
   unset($_SESSION["logedIn"]);
   
   header('Location:../../page-login.php');
?>