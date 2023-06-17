<?php
session_start();
include("connect.php");

$user = strtoupper($_POST["username"]);
$password = $_POST["password"];

$sql = "select * from login where name='$user'";
$res = mysqli_query($conn,$sql);
$result = $res->fetch_assoc();

if(empty($result)) {
    $err = "Username Does't exist , Register";
}else{
   if ($_POST['password'] ===  $result['password']) {
    session_regenerate_id();
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['name'] = $user;
    $_SESSION['id'] = $result['uniqid'];
    header('location: u/index.php');
    }else {
        $err =  "incorrect password";
    }
}
$conn->close();
?>
<html>
    <head>
        <style>
            body {
                margin:0;
            }
            h1 {
                font-size: 20px;
                text-align: center;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <h1><?php echo $err; ?></h1>
        <a href="index.html"><h1>Back</h1></a>
    </body>
</html>