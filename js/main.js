$(document).ready(function () {
    $("#slide").owlCarousel({
        loop: true,
        center: true,
        margin: 0,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        navText: [
            '<img src="../../img/seja-franqueado/s-esquerda.png">', '<img src="../../img/seja-franqueado/s-direita.png">'
        ],
        responsive: {
            0: {
                items: 3
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
});