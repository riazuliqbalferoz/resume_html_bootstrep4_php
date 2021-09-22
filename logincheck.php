<?php
session_start();
//connect to DB
require_once('include/conn.php');

//Flash Message
$message="";
if(isset($dbh)){
//connection check
if(isset($_POST['submit'])){

$stmt = $dbh->prepare("SELECT * FROM login WHERE email = :email );


 
//bindParam
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
//Fatch data user form


$email = $_POST['email'];
$password = ($_POST['password']);

//Facth data form Database

$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check Valid User

if($row != null) {
    
foreach ($row as $value) {

$_SESSION["email"] = $value['email'];
$_SESSION["user"] = $value['status'];
$_SESSION["password"] = $value['password'];

}
}
else {
$message = "Invalid Username or Password!";
}
}
}

if(!empty($value)){
if(($value['status']=="admin")) 
{
    header("Location:profile.html");
}
else{
    echo("Invalid Id or password");
    header("Location:login.html");
}
}


?>
