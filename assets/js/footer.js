
        $(document).ready(function(){
            $(".certification-carousel").owlCarousel({
                loop: true,
                margin: 20,
                nav: false, // Removed navigation arrows
                dots: false,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                autoplaySpeed: 2000,
                fluidSpeed: 2000,
                smartSpeed: 2000,
                slideTransition: 'linear',
                responsive: {
                    0: {
                        items: 2
                    },
                    480: {
                        items: 3
                    },
                    768: {
                        items: 4
                    },
                    992: {
                        items: 5
                    },
                    1200: {
                        items: 6
                    }
                }
            });
            
            // Force continuous autoplay
            setInterval(function() {
                $('.owl-carousel').trigger('next.owl.carousel');
            }, 2000);
        });
    