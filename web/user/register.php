<?php
include('connect.php');

$name = strtoupper($_POST["username"]);
$mail = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$password2 = $_POST["password2"];
$uniqid = uniqid($name);

$sql = "select * from login where email='$mail'";
$res = mysqli_query($conn,$sql);
$result = $res->fetch_assoc();
if(empty($result)) {
    if ($password === $password2) {
         $sql2 = "insert into login (id,name,email,phone,password,uniqid)
                     values(NULL,'$name','$mail','$phone',$password,'$uniqid')";
                if (mysqli_query($conn,$sql2)) {
                    $err = "successfully registered";
            }else{
                $err = "unkonwn error";
            }
        }else{
            $err =  "Password Did't Match";
        }
}
else {
    $err =  "email already exists";
}
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