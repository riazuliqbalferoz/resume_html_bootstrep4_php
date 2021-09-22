
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Contatc with admin.</title>
  
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        
      </div>
      <div class="login-box2">
        <!-- <form action="" method="post" enctype="multipart/form-data"> -->
          
       
        <form action="contact.php" method="post" class="login-form" enctype="multipart/form-data">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-users"></i>Send Message</h3>
          
          <div class="form-group">
            <label class="control-label"> YOUR NAME <span class="text-danger">*</span></label>
            <input type="text" name="name" id="" class="form-control" placeholder="Name" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="control-label"> USER EMAIL <span class="text-danger">*</span></label>
            <input type="email" name="email" id="" class="form-control" placeholder="Email" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="control-label"> MOBILE <span class="text-danger">*</span></label>
            <input type="tel" name="mobile" id="" class="form-control" placeholder="Mobile no" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="control-label"> Message <span class="text-danger">*</span></label>
            <input height="48" type="message" name="message" class="form-control" placeholder="message" autocomplete="off" id="message" >
</br>
</br>

    <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="submit" value="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SEND MESSAGE</button>
          </div>

        </form>
        
      </div>
   
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/js/plugins/pace.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#password, #confirmpassword').on('keyup', function () {
          if ($('#password').val() == $('#confirmpassword').val()) {
            $('#message').html('Matching').css('color', 'green');
          } else 
            $('#message').html('Not Matching').css('color', 'red');
        });
      });
    </script>
  </body>
</html>



<?php
session_start();
//connect to DB
require_once('include/conn.php');

//Flash Message
$message="";
if(isset($dbh)){
//connection check
if(isset($_POST['submit'])){



$stmt = $dbh->prepare("INSERT INTO `hire_req`(`name`,`email`,`phone`,`message`) VALUES (:name, :email, :phone, :message)");

//$stmt1 = $dbh->prepare("INSERT INTO `login`(`email`,`password`,`user`) VALUES (:email, :password,:user)");

//bindParam FOR LOGIN TABLE
/*$stmt1->bindParam(':email', $email);
$stmt1->bindParam(':password', $password);
$stmt1->bindParam(':user', $user);
*/
//bindParam
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':message', $message);





//insert File

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['mobile'];
$message = $_POST['message'];

//confiramation of first value inseration ....

if($stmt->execute()){
  $message="Insert Row Scuccess";
 header("Location:index.html");
}
else{
 $message="Insert Row Fail";

}

//STMT1 FOR LOGIN TABLE
if($stmt1->execute()){
  $message="Insert Row Scuccess";
 header("Location:dashboard.php");
}
else{
 $message="Insert Row Fail";
} 
//end of the second condition

}
}
?>


