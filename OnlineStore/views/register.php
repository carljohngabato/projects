<?php
  ob_start();
  session_start();
  $error=''; // Variable To Store Error Message
  if (isset($_POST['register'])) {
    if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['userName']) || empty($_POST['emailAddress']) || empty($_POST['userPass'])) {
      $error = "Please fill out all the fields";
    }
    else{
      include '../obj/register_act.php';
    }
  }
?>


<form class="form-horizontal"  method="post">
  <fieldset>
    <div id="legend">
      <legend align="center" style="font-size: 35px;">Register</legend>
    </div>
      <!--Psersonal Information Sections-->
    <div class="control-group">
        <!-- Fullname -->
        <label class="control-label"  for="fname">First Name</label>
        <div class="controls">
          <input type="text" id="fname" name="firstName" placeholder="" class="input-xlarge" required>
        </div>
        <label class="control-label"  for="lname">Last Name</label>
        <div class="controls">
          <input type="text" id="lname" name="lastName" placeholder="" class="input-xlarge" required>
        </div>
    </div>
    <!--User Accounts Section-->
    <div class="control-group">
        <!-- username -->
        <label class="control-label" for="username">Username</label>
        <div class="controls">
          <input type="text" id="uName" name="userName" placeholder="" class="input-xlarge" onBlur="checkAvailability()"  required>
          <span id="user-availability-status" style="font-size:12px;"></span>
        </div>
    </div>

    <div class="control-group">
        <!--email-->
        <label class="control-label" for="password">e-Mail</label>
        <div class="controls">
          <input type="email" id="email" name="emailAddress" placeholder="" class="input-xlarge" required>
        </div>
    </div>

    <div class="control-group">
        <!-- Password -->
        <label class="control-label" for="userPass">Password</label>
        <div class="controls">
          <input type="password" id="uPass" name="userPass" placeholder="" class="input-xlarge" required>
        </div>
    </div>

    <div class="control-group">
      <!-- Button -->
        <div class="controls">
          <input  class="btn btn-success" id="submit" type="submit" value='register' name="register">
        </div>
    </div>

    <div class="control-group">
      <div class="controls">
       <p class="message">Already registered. <a href="login.php">login here</a></p>
      </div>
    </div>

  </fieldset>
</form>
