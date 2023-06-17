<?php 
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('location: /web/user/index.html');
}
$username = $_SESSION['name'];
$ID = $_SESSION['id'];
?>
<html>
    <head>
    </head>
    <body>
            <h3>WELCOME <?php echo $_SESSION['name'];?></h3>
            <a href="logout.php" class="log">log out</a>
</body>
</html>