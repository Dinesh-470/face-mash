<?php
include('connect.php');

$name = strtoupper($_POST["namee"]);
$roolno = strtoupper($_POST["rolno"]);
$mail = $_POST["emaill"];
$img_name = $_FILES['image']['name'];
$temp_name = $_FILES['image']['tmp_name'];

$img_exc = pathinfo($img_name,PATHINFO_EXTENSION);
$img_exc_lc = strtolower($img_exc);
$allowed_exc = array("jpg","jpeg","png");
if ($_FILES['image']['error'] === 0) {
    if(in_array($img_exc_lc,$allowed_exc)) {
        $new_img_name = uniqid($name).'.'.$img_exc_lc;
        $image_upload_loc = 'img_uploads/'.$new_img_name;
        if(move_uploaded_file($temp_name,$image_upload_loc)) {
            $insert = "INSERT INTO college(id,name,rool_no,email,image)
                       VALUES(NULL,'$name','$roolno','$mail','$image_upload_loc')";
            if(mysqli_query($conn,$insert)) {
                $err = "uploaded succesfully";
            }else{
                $err = "connection error";
            }
        }else{
            $err = "error";
        }
    }else{
    $err = "cannot upload this  type of file";
    }
}else{
    $err = "unknown error occured";
}
?>
<html>
    <head>
<style>
    html {
        background-color: #252525;
        font-size: 30px;
        font-family: monospace;
    }
    body {
        border: 2px solid green;
        text-align: center;
        justify-content: center;
        color: #fff;
    }
    a{
        
        font-size: 20px;
        text-align: left;
        justify-content: left;
        color: wheat;
        text-decoration: dashed;
    }
    img {
        border: 1px solid red;
        align-items: center;
    }    
</style>
    </head>
    <body>
        <h2><?php echo $err; ?></h2>
        <img src="<?php echo $image_upload_loc; ?>" alt="image" height="60%",width="80%">
        <hr>
        <p><a href="index.html">back</a></p>
    </body>
</html>