function changeBigImage(src) {
    bigImage = document.getElementById("big-image");
    closeIcon = document.getElementById("close");
    bigImage.classList.remove("hidden");
    closeIcon.classList.remove("hidden");
    bigImage.src=src;
}
function closeBigImage() {
    bigImage = document.getElementById("big-image");
    closeIcon = document.getElementById("close");
    bigImage.classList.add("hidden");
    closeIcon.classList.add("hidden");
    window.location.href="#top";
}