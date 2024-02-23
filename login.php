<?php
session_start();

$username=$_POST['username'] ;
$password=$_POST['password'] ;
$con = new mysqli("localhost","root","","fooddiary");
if ($con->connect_error) {
    # code...
    die("Failed to connect".$con->connect_error);
}
else{
    $stmt = $con->prepare("select * from register where Username=?");
    $stmt -> bind_param("s",$username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        # code...
        $data =$stmt_result->fetch_assoc();

        if ($data['password']=== $password) 
        {
            header("Location:Home.html");
        }
        else {
            echo "Invalid Username or Password!";
        }
    }
    else {
        echo"<h2>Invalid Username or Password ! </h2>";
    }
}

?>