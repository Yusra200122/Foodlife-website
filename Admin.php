<?php
session_start();

$ID=$_POST['ID'];
$name=$_POST['name'];
$number=$_POST['number'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];


//Database connection
$con = new mysqli("localhost","root","","fooddiary");
if ($con->connect_error) {
    # code...
    die("Failed to connect".$con->connect_error);
}else{
    $stmt = $con->prepare("insert into admin (ID,name,number,email,username,password) values(?,?,?,?,?,?)");
    $stmt -> bind_param("isisss",$ID,$name,$number,$email,$username,$password);
    $stmt->execute();
    echo "Registration succesful!";
    $stmt->close();
    $con->close();
}
?>