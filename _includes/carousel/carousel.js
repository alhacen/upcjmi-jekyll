document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, {
        fullWidth: true,
        duration: 300
    });
    setInterval(function () {
        M.Carousel.getInstance(document.querySelector('.carousel')).next();
    }, 5000);
});