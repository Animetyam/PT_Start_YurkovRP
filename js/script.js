document.getElementById("my_button").addEventListener("click", function() {
    var image = document.getElementById("image");
    if (image.style.display === "none") {
        image.style.display = "block";
        this.textContent = "Спрятать изображение";
    } else {
        image.style.display = "none";
        this.textContent = "Надо нажать";
    }
});