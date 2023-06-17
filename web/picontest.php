<?php
include("connect.php");

function first_one($conn) {
    $image1Id = $_POST['image1'];
    $image2Id = $_POST['image2'];
        
            // Get the Elo ratings of the selected images from the database
    $image1Rating = getImageRating($conn, $image1Id);
    $image2Rating = getImageRating($conn, $image2Id);
        
            // Calculate Elo rating changes based on the outcome
    $kFactor = 50; // Adjust the k-factor as per your requirement
        
    $expectedScore1 = getExpectedScore($image2Rating, $image1Rating);
    $expectedScore2 = getExpectedScore($image1Rating, $image2Rating);

    $newRating1 = calculateNewRating($image1Rating, 1, $expectedScore1, $kFactor);
    $newRating2 = calculateNewRating($image2Rating, 0, $expectedScore2, $kFactor);
             // Update the Elo ratings in the database
    updateImageRating($conn, $image1Id, $newRating1);
    updateImageRating($conn, $image2Id, $newRating2);
}
        
function second_one($conn) {
    $image1Id = $_POST['image1'];
    $image2Id = $_POST['image2'];
        
            // Get the Elo ratings of the selected images from the database
    $image1Rating = getImageRating($conn, $image1Id);
    $image2Rating = getImageRating($conn, $image2Id);
        
            // Calculate Elo rating changes based on the outcome
    $kFactor = 50; // Adjust the k-factor as per your requirement
            
    $expectedScore1 = getExpectedScore($image2Rating, $image1Rating);
    $expectedScore2 = getExpectedScore($image1Rating, $image2Rating);

    $newRating1 = calculateNewRating($image1Rating, 0, $expectedScore1, $kFactor);
    $newRating2 = calculateNewRating($image2Rating, 1, $expectedScore2, $kFactor);
             // Update the Elo ratings in the database
    updateImageRating($conn, $image1Id, $newRating1);
    updateImageRating($conn, $image2Id, $newRating2);
}

// Function to retrieve the Elo rating of an image from the database
function getImageRating($conn, $imageId) {
    $query = "SELECT rating FROM images WHERE id = $imageId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['rating'];
}

// Function to calculate the expected score of an image
function getExpectedScore($ratingA, $ratingB) {
    $expectedScore = 1 / (1 + pow(10, ($ratingB - $ratingA) / 400));
    return $expectedScore;
}

// Function to calculate the new Elo rating of an image
function calculateNewRating($currentRating, $actualScore, $expectedScore, $kFactor) {
    $newRating = $currentRating + $kFactor * ($actualScore - $expectedScore);
    return $newRating;
}

// Function to update the Elo rating of an image in the database
function updateImageRating($conn, $imageId, $newRating) {
    $query = "UPDATE images SET rating = $newRating WHERE id = $imageId";
    mysqli_query($conn, $query);
}
