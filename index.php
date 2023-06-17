<?php 
include("connect.php");
function selectRandomImages($conn) {
    $query = "SELECT id, path FROM images ORDER BY RAND() LIMIT 2";
    $result = mysqli_query($conn, $query);
    $imageSelection = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $imageSelection[] = $row;
    }
    
    return [
        'image1' => $imageSelection[0],
        'image2' => $imageSelection[1]
    ];
}

// Select two random images for the initial comparison
$imageSelection = selectRandomImages($conn);
$image1 = $imageSelection['image1'];
$image2 = $imageSelection['image2'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="images/x-icon" href="#">
    <link rel="stylesheet" href="style.css">
    <title>picontest</title>
</head>
<body>
    <h1>pic-contest</h1>
    <div class="main">

    </div>
    <p>we will always be judged by our looks..? isn't it ..?</p>
    <h2>Choose the best one</h2>
    <div class="photos">
    <img src="<?php echo $image1['path']; ?>" id="left" data-id="<?php echo $image1['id']; ?>">
    <div class="or">
        <span>OR</span>
    </div>
    <img src="<?php echo $image2['path']; ?>" id="right"  data-id="<?php echo $image2['id']; ?>">
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="update.js"></script>
<script src="app.js"></script>
</body>
</html>