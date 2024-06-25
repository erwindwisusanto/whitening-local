<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whitening - Cepat Sehat</title>

    <!-- icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css"
        integrity="sha512-LX0YV/MWBEn2dwXCYgQHrpa9HJkwB+S+bnBpifSOTO1No27TqNMKYoAn6ff2FBh03THAzAiiCwQ+aPX+/Qt/Ow=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset("assets/img/favicon.svg") }}">

    <!-- fontello -->
    <link rel="stylesheet" href="assets/fontello/css/csehat.css">

    <!-- swiper -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <!-- custom -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <x-navbar/>

    {{ $slot }}

    <x-btn-float/>
    <x-footer/>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(
            tooltipTriggerEl));

        $(document).ready(function () {
            new Swiper('.swiper-article', {
                loop: true,
                slidesPerView: 3,
                centeredSlides: true,
                spaceBetween: 6,
                speed: 1300,
                autoplay: {
                    delay: 1500,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    // when window width is >= 320px
                    320: {
                        slidesPerView: 1.5
                    },
                    // when window width is >= 480px
                    480: {
                        slidesPerView: 2.5,
                    },

                    // when window width is >= 640px
                    768: {
                        slidesPerView: 3.5
                    }
                }
            });

            new Swiper('.swiper-product', {
                loop: true,
                slidesPerView: 3,
                centeredSlides: false,
                spaceBetween: 6,
                speed: 1000,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    // when window width is >= 320px
                    320: {
                        slidesPerView: 2.3
                    },
                    // when window width is >= 480px
                    480: {
                        slidesPerView: 2.5,
                    },

                    // when window width is >= 640px
                    768: {
                        slidesPerView: 3.5
                    }
                }
            });

            $('.hero-banner').find('a').click(function () {
                var $href = $(this).attr('href');
                var $anchor = $($href).offset();
                var offsetValue = 100;
                $('html, body').animate({
                    scrollTop: $anchor.top - offsetValue
                }, 1000); // added duration for smooth scrolling
                return false;
            });
        });

        window.addEventListener('beforeunload', function (e) {
            navigator.sendBeacon('/destroy-session');
        });
    </script>

</body>

</html>
