let imgIndex = 0;
showImages();

function showImages() {
    let i;
    let images = document.getElementsByClassName("sliderImgs");
    for (i = 0; i < images.length; i++) {
        images[i].style.display = "none";
    }
    imgIndex++;
    if (imgIndex > images.length) {
        imgIndex = 1;
    }
    images[imgIndex - 1].style.display = "block";

    sliderTimeout = setTimeout(showImages, 2500); // Change image every 2.5 seconds
}
