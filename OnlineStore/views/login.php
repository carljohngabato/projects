<?php
  ob_start();
  session_start();
  $error=''; // Variable To Store Error Message
  if (isset($_POST['login'])) {
    if (empty($_POST['userName']) || empty($_POST['userPass'])) {
      $error = "Username or Password is invalid";
    }
    else{
      include '../obj/login_action.php';
    }
  }
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>
<div class="login-page">
  <div class="form">
    <form class="login-form" method="post">
      <input type="text" class="userName" placeholder="Username" name="userName" required />
      <input type="password" class="userPass" placeholder="Password" name="userPass" required />
      <button type="submit" name="login">login</button>
      <p class="message">Not registered? <a href="register.php">Create an account</a></p>
    </form>
  </div>
</div>
