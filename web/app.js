let left = document.getElementById('left');
let right = document.getElementById('right');

left.addEventListener('click', function () {
    fetchNewImages();
});

right.addEventListener('click', function () {
    fetchNewImages();
});

function updateImages(image1Path, image2Path,image1id,image2id) {
    left.setAttribute('src',image1Path)
    right.setAttribute('src',image2Path)
    left.setAttribute('data-id',image1id)
    right.data-id == image2id; 
}

function fetchNewImages() {
    let xhr = new XMLHttpRequest();

    xhr.open('GET', 'ajax.php', true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            let response = JSON.parse(xhr.responseText);
            let image1Path = response.image1;
            let image2Path = response.image2;
            let image1id =response.image1Id;
            let image2id =response.image2Id;

            updateImages(image1Path, image2Path,image1id,image2id);
        }
    };

    xhr.send();
}
fetchNewImages();