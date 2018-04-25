function slider() {
    var h = window.innerHeight;
    document.getElementsByClassName("slider")[0].style.height = h + "px";
    document.getElementsByClassName("slider")[0].innerHTML = '<p style="color: white;">Height: ' + h + '</p>';
}
slider();
