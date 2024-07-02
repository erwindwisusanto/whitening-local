<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        const baseUrl = "{{ request()->root() }}";
        const campaignName = "{{ request()->query('camp') }}";
        const webSource = "whitening_clinics";

        const visitCounter = async () => {
            const resp =  await $.ajax({
                _token: $('meta[name="csrf-token"]').attr('content'),
                url: '{{ route('visit-count') }}',
                type: 'POST',
                data: {
                    url: baseUrl,
                    campaign: campaignName,
                    source: webSource,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Visit count saved successfully');
                },
                error: function(xhr, status, error) {
                    console.error('Error saving visit count:', error);
                }
            });
        }

        $('.whatsapp-link').on('click', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');
            const platform = "whatsapp";
            updateCounter(campaignName, platform);
            window.open(url, '_blank');
        });

        $('.telegram-link').on('click', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');
            const platform = "telegram";
            updateCounter(campaignName, platform);
            window.open(url, '_blank');
        });

        const updateCounter = async (campaign, platform) => {
            try {
                campaignValid = campaign === "" ? "root": campaign;
                const storageKey = `click_counter_${campaignValid}_${platform}`;

                let clickCount = localStorage.getItem(storageKey);

                clickCount = clickCount ? Number(clickCount) + 1 : 1;

                localStorage.setItem(storageKey, clickCount);

                const response =  await $.ajax({
                    url: '{{ route("click-count") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        count: clickCount,
                        campaign: campaign,
                        platform: platform,
                        source: webSource
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                console.log('Click count saved successfully');
            } catch (error) {
                console.error('Error saving click count:', error);
                throw error;
            }
        }

        let waword = '';
        const getWaWording = async () => {
            try {
                const response = await $.ajax({
                    url: '{{ route("get-wa-wording") }}',
                    type: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}',
                        campaign: campaignName,
                        source: webSource
                    },
                    success: function(resp) {
                        waword = resp.data?.whatsapp_wording || ''; // Assign the WhatsApp wording to waword
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                console.log('Success: get wa wording');
            } catch (error) {
                console.error('Error: get wa wording', error);
                throw error;
            }
        };

        getWaWording().then(() => {
            console.log('getWaWording completed, waword:', waword);
        }).catch((error) => {
            console.error('Error in getWaWording:', error);
        });

        const directurl = (platform) => {
            const numberphone = "6285212500030";
            switch (platform) {
                case "wa":
                    window.open(`https://web.WhatsApp.com/send?phone=${encodeURIComponent(numberphone)}&text=${encodeURIComponent(waword)}`, '_blank');
                    break;
                case "tele":
                    const telegramUsername = 'cepat_sehat';
                    window.open(`https://t.me/${telegramUsername}?text=${encodeURIComponent(waword)}`, '_blank');
                    break;
                default:
                    break;
            }
        }

        $(document).ready(function () {
            visitCounter();
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
