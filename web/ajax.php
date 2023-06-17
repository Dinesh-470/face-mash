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

$imageSelection = selectRandomImages($conn);
$image1 = $imageSelection['image1'];
$image2 = $imageSelection['image2'];

$image1Path = $image1['path'];
$image2Path = $image2['path'];
$image1id = $image1['id'];
$image2id = $image2['id'];

$response = array(
    'image1' => $image1Path,
    'image2' => $image2Path,
    'image1id' => $image1id,
    'image2id' => $image2id
);


header('Content-Type: application/json');

echo json_encode($response);
?>
