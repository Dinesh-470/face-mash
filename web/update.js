let image1Id = left.getAttribute('data-id');
let image2Id = right.getAttribute('data-id');

function updateRatings(choice, image1Id,image2Id) {
let xhr = new XMLHttpRequest();

xhr.open('POST', 'update_ratings.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
            // Ratings updated successfully
            // Handle any response if needed
        } else {
            // Error occurred during rating update
            // Handle the error if needed
        }
    }
};

xhr.send('choice=' + choice + '&image1Id=' + image1Id + '&image2Id=' + image2Id);
}

// Add event listeners to the choices
left.addEventListener('click', function() {
updateRatings('first_one', image1Id,image2Id);
});

right.addEventListener('click', function() {
updateRatings('second_one', image1Id,image2Id);
});