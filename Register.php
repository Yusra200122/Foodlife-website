<?php
session_start();

$cmname=$_POST['cmname'];
$email=$_POST['email'];
$password=$_POST['password'];
$username=$_POST['username'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$mobno=$_POST['mobno'];
$nic=$_POST['nic'];

//Database connection
$con = new mysqli("localhost","root","","fooddiary");
if ($con->connect_error) {
    # code...
    die("Failed to connect".$con->connect_error);
}else{
    $stmt = $con->prepare("insert into register (cmname,email,password,username,DOB,address,mobno,nic) values(?,?,?,?,?,?,?,?)");
    $stmt -> bind_param("ssssssis",$cmname,$email,$password,$username,$dob,$address,$mobno,$nic);
    $stmt->execute();
    echo "Registration succesful!";
    $stmt->close();
    $con->close();
}
?>