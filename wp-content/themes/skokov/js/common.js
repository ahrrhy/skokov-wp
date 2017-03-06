$('.slides').slick({
    dots: true,
    arrows: true,
    infinite: false,
    speed: 300,
    slidesToShow: 8,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 8,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                arrows: true,
                slidesToShow: 4,
                slidesToScroll: 4
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});
$(document).ready(function() {
    $(".fancybox").fancybox();
});