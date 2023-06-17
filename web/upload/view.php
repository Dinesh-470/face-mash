<?php 
include("connect.php");

$sql = "SELECT * FROM college ORDER BY rool_no ASC";
$result = $conn->query($sql);
$conn->close()
?>
<html>
   <head>

   </head>
      <style>
         body {
            background-color: wheat;
            text-align: center;
        }
      </style>
   <body>
   <?php 
        while($rows = $result->fetch_assoc())
        {
        ?> 
            <b class="name"><?php echo $rows['name']; ?></b></br>
            <p class="roolno"><?php echo $rows['rool_no']; ?></p>
            <img src="<?php echo $rows['image']; ?>" alt="<?php echo $rows['image']; ?>" height="80%",width="80%">
            <hr>
        <?php
        }
        ?>
   </body>
</html>