<?php
include('../includes/sessions.php');
//validating session
if(strlen($_SESSION['login']) ==  0)
  {
    header('location:login.php');
  }
else{
?>
      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="utf-8">
          <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
          <title>Welcome  Page</title>
              <meta name="viewport" content="width=device-width, initial-scale=1">
          <!--<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">-->
          
          <?php include('../layouts/navigation.php'); ?>
        </head>
        <body>
          <div class="container">
          </div>
        </body>
      </html>
<?php }
?>
