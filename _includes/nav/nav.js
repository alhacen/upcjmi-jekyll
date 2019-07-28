var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("mobile_nav_links").style.top = "56px";
    } else {
        document.getElementById("mobile_nav_links").style.top = "-56px";
    }
    prevScrollpos = currentScrollPos;
}