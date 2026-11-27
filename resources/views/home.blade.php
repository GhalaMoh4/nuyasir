<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>nuyasir</title>
    <meta property="og:title" content="nuyasir" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}?v={{ filemtime(public_path('css/bootstrap.min.css')) }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/contact3.css') }}?v={{ filemtime(public_path('css/contact3.css')) }}">
    <style>
        @font-face {
            font-family: 'Bahij TheSansArabic SemiBold';
            src: url('{{ asset('fonts/Bahij_TheSansArabic-SemiBold.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
    </style>
    <style data-tag="reset-style-sheet">
        html {
            line-height: 1.15;
        }

        body {
            margin: 0;
        }

        * {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
        }

        p,
        li,
        ul,
        pre,
        div,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        figure,
        blockquote,
        figcaption {
            margin: 0;
            padding: 0;
        }

        button {
            background-color: transparent;
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;
            font-size: 100%;
            line-height: 1.15;
            margin: 0;
        }

        button,
        select {
            text-transform: none;
        }

        button,[type="button"],
        [type="reset"],
        [type="submit"] {
            -webkit-appearance: button;
        }

        button::-moz-focus-inner,[type="button"]::-moz-focus-inner,
        [type="reset"]::-moz-focus-inner,
        [type="submit"]::-moz-focus-inner {
            border-style: none;
            padding: 0;
        }

        button:-moz-focus,[type="button"]:-moz-focus,
        [type="reset"]:-moz-focus,
        [type="submit"]:-moz-focus {
            outline: 1px dotted ButtonText;
        }

        a {
            color: inherit;
            text-decoration: inherit;
        }

        input {
            padding: 2px 4px;
        }

        img {
            display: block;
        }

        html {
            scroll-behavior: smooth
        }

        @keyframes float {
            0% {
                box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
                transform: translatey(0px);
            }

            50% {
                box-shadow: 0 25px 15px 0px rgba(0, 0, 0, 0.2);
                transform: translatey(-20px);
            }

            100% {
                box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
                transform: translatey(0px);
            }
        }

        .container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .avatar {
            width: 150px;
            height: 150px;
            box-sizing: border-box;
            /* border: 5px white solid; */
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
            transform: translatey(0px);
            animation: float 6s ease-in-out infinite;

            img {
                width: 100%;
                height: auto;
                margin-top: 40px;
            }
        }

        .content {
            width: 100%;
            max-width: 600px;
            padding: 20px 40px;
            box-sizing: border-box;
            text-align: center;
        }

        .suppoprt-me {
            display: inline-block;
            position: fixed;
            bottom: 10px;
            left: 10px;
            width: 20vw;
            max-width: 250px;
            min-width: 200px;
            z-index: 9;

            img {
                width: 100%;
                height: auto;
            }
        }
    </style>
    <style data-tag="default-style-sheet">
        html {
            font-family: Inter;
            font-size: 16px;
        }

        body {
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            text-transform: none;
            letter-spacing: normal;
            line-height: 1.15;
            color: var(--dl-color-theme-neutral-dark);
            background-color: var(--dl-color-theme-neutral-light);

            fill: var(--dl-color-theme-neutral-dark);
        }
    </style>

</head>

<body>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}?v={{ filemtime(public_path('css/style1.css')) }}" />
    <div>
        <link href="{{ asset('css/index.css') }}?v={{ filemtime(public_path('css/index.css')) }}" rel="stylesheet" />
        <div class="home-container" id = "home">
            <header class="navbar8-container">
                <header data-thq="thq-navbar" class="navbar8-navbar-interactive">
                    <img alt="Website Logo" src="{{ asset('images/university-logo-placeholder.svg') }}" class="navbar8-image1" />
                    <div data-thq="thq-navbar-nav" class="navbar8-desktop-menu">
                        <nav class="navbar8-links">
                            <span class="thq-link thq-body-small" onclick="document.getElementById('1212').scrollIntoView({behavior: 'smooth'})"><span
                                    style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">الصفحة الرئيسية
                                </span></span>
                            <span class="thq-link thq-body-small" onclick="document.getElementById('Funding_steps').scrollIntoView({behavior: 'smooth'})">
                                <span style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">خطوات التمويل
                                </span>
                            </span>
                            <span class="thq-link thq-body-small"><span
                                    style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; "> <a
                                        href="{{ route('form') }}" class="nav-link" aria-current="page"
                                        style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; "> نموذج التسجيل
                                    </a></span></span>
                            <div class="navbar8-link5-dropdown-trigger">
                                <span class="thq-link thq-body-small" onclick="document.getElementById('contact-section').scrollIntoView({behavior: 'smooth'})">
                                    <span style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; "> تواصل معنا
                                    </span>
                                </span>

                            </div>
                        </nav>
                        <div class="navbar8-buttons"><a href="{{ route('form') }}" class="nav-link"
                                aria-current="page"></a>
                                <button type="button" class="navbar8-action1 thq-button-filled thq-button-animated"data-toggle="modal" data-target="#loginModal"
    style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">
    تسجيل الدخول
</button>
                            <button type="button" class="navbar8-action1 thq-button-filled thq-button-animated"
                                data-toggle="modal" data-target="#statusModal"
                                style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                                الإستعلام عن حالة الطلب
                            </button>


                            <script>
                                function checkStatus() {
                                    var applicationNumber = document.getElementById("application-number").value;
                                    console.log(applicationNumber); // Check if the application number is correct

                                    fetch(`/check-status/${applicationNumber}`)
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.status) {
                                                document.getElementById("status-message").textContent = `حالة طلبك هي : ${data.status}`;
                                            } else {
                                                document.getElementById("status-message").textContent = "لم يتم العثور على الطلب";
                                            }
                                            document.getElementById("status-container").style.display = "block";
                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                            document.getElementById("status-message").textContent = "حدث خطأ أثناء محاولة التحقق من حالة طلبك ";
                                        });
                                }
                            </script>
                        </div>

                    </div>
                    <div data-thq="thq-burger-menu" class="navbar8-burger-menu" id="burger-menu-trigger">
                        <svg viewBox="0 0 1024 1024" class="navbar8-icon04">
                            <path
                                d="M128 554.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 298.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 810.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667z">
                            </path>
                        </svg>
                    </div>
                    <div class="navbar8-mobile-menu" id="mobile-menu">
                        <div class="navbar8-top">
                            <img alt="Website Logo" src="{{ asset('images/university-logo-placeholder.svg') }}" class="navbar8-logo" />
                            <div class="navbar8-close-menu" id="mobile-menu-close">
                                <svg viewBox="0 0 1024 1024" class="navbar8-icon06">
                                    <path
                                        d="M810 274l-238 238 238 238-60 60-238-238-238 238-60-60 238-238-238-238 60-60 238 238 238-238z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <nav class="navbar8-links1">
                            <span class="thq-link thq-body-small mobile-menu-link" onclick="document.getElementById('1212').scrollIntoView({behavior: 'smooth'})">
                                <span style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">الصفحة الرئيسية</span>
                            </span>
                            <span class="thq-link thq-body-small mobile-menu-link" onclick="document.getElementById('Funding_steps').scrollIntoView({behavior: 'smooth'})">
                                <span style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">خطوات التمويل</span>
                            </span>
                            <span class="thq-link thq-body-small mobile-menu-link">
                                <a href="{{ route('form') }}" class="nav-link" aria-current="page"
                                    style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">نموذج التسجيل</a>
                            </span>
                            <span class="thq-link thq-body-small mobile-menu-link" onclick="document.getElementById('contact-section').scrollIntoView({behavior: 'smooth'})">
                                <span style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">تواصل معنا</span>
                            </span>
                            <button type="button" class="navbar8-action1 thq-button-filled thq-button-animated"
                                data-toggle="modal" data-target="#loginModal"
                                style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; width: 100%; margin-top: var(--dl-space-space-twounits);">
                                تسجيل الدخول
                            </button>
                            <button type="button" class="navbar8-action1 thq-button-filled thq-button-animated"
                                data-toggle="modal" data-target="#statusModal"
                                style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; width: 100%; margin-top: var(--dl-space-space-unit);">
                                الإستعلام عن حالة الطلب
                            </button>
                        </nav>
                    </div>
                    <script>
                        (function () {
                            var trigger = document.getElementById('burger-menu-trigger');
                            var closeBtn = document.getElementById('mobile-menu-close');
                            var menu = document.getElementById('mobile-menu');

                            trigger.addEventListener('click', function () {
                                menu.style.display = 'flex';
                            });
                            closeBtn.addEventListener('click', function () {
                                menu.style.display = 'none';
                            });
                            document.querySelectorAll('.mobile-menu-link').forEach(function (link) {
                                link.addEventListener('click', function () {
                                    menu.style.display = 'none';
                                });
                            });
                        })();
                    </script>

        </div>
        </header>
        </header>
        <!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">تسجيل الدخول</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="navbar8-buttons">
                    <!-- Login Button -->
                    <button class="navbar8-action1 thq-button-filled thq-button-animated" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">
                        <a href="{{ route('login') }}" class="nav-link" aria-current="page"> تسجيل الدخول</a>
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="thq-button-outline thq-button-animated" data-dismiss="modal" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">إغلاق</button>
            </div>
        </div>
    </div>
</div>

        <!-- The Modal -->
        <div class="modal fade" id="statusModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">
                            الإستعلام عن حالة الطلب</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container1" style="display: flex; flex-direction: column; gap: var(--dl-space-space-unit);">
                            <input type="text" id="application-number" placeholder="ادخل رقم الطلب "
                                class="thq-input" style="width: 100%; font-family:'Bahij TheSansArabic SemiBold', sans-serif;">
                            <button onclick="checkStatus()" type="button" class="thq-button-filled thq-button-animated"
                                style="justify-content: center; align-self: flex-start;">
                                <span class="thq-link thq-body-small"
                                    style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">التحقق </span>
                            </button>
                            <div id="status-container" style="display: none;">
                                <h3 style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">حالة طلبك هي :
                                </h3>
                                <p id="status-message"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="thq-button-outline thq-button-animated" data-dismiss="modal"
                            style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">إغلاق</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="thq-section-padding" id="1212">
            <div class="thq-section-max-width">
                <div class="cta26-accent2-bg">


                    <div class="cta26-accent1-bg"
                        style="background-image: url('{{ asset('images/newbg.jpg') }}'); background-repeat: no-repeat; background-size: 100% 100%;">
                        <div class="cta26-container1">
                            <div class="cta26-content">
                                <span class="thq-heading-2"
                                    style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                                    <span>نُيسـر </span>
                                </span>
                                <p class="thq-body-large"
                                    style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                                    <span>
                                        منتج نيسر عبارة عن ﺗﻤويل مالي لتغطية كامل الرسوم الدراسية أو جزء منها بنسبه
                                        فائدة صفر% على المستفيد من الخدمة.
                                    </span>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <span>
                                        <br>
                                    </span>
                                </p>
                            </div>
                            <div class="cta26-actions">
                                <button type="button" class="thq-button-filled cta26-button">
                                    <span style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; "><a
                                            href="{{ route('form') }}" class="nav-link" aria-current="page"
                                            style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">ابدأ
                                            تمويلك الآن </a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="thq-section-padding">
            <div class="thq-section-max-width">
                <div class="cta26-accent2-bg">
                    <div class="cta26-accent1-bg">
                        <div class="cta26-container1">
                            <div class="cta26-content">

                                <span class="thq-heading-2"
                                    style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                                    <span>الفئة المستهدفة </span>
                                </span>

                                <p class="thq-body-large"
                                    style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                                <h4 style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">طلاب وطالبات
                                    البرامج المدفوعة </h4>
                                <ul style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; "
                                    class="thq-body-large">
                                    <li>ماجستير</li>
                                    <li>دبلوم عال</li>
                                    <li>الدبلومات التطبيقية المتوسطة</li>
                                    <li>برامج التجسير </li>
                                </ul>
                                </p>
                            </div>
                            <div class="cta26-actions">

                                <span class="client-box-image-wrapper"><a href="javascript:void(0)"><img class="client-box-image"
                                            src="{{ asset('images/targetAud.png') }}"
                                            alt="Logo Bestrating Van Duivenboden Export" /></a> </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--===============================================================================================-->
        <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/tilt/tilt.jquery.min.js') }}"></script>

        <script>
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>

        <div class="steps2-container thq-section-padding" id="Funding_steps">
            <div class="steps2-max-width thq-section-max-width">
                <div class="steps2-container1 thq-grid-2">
                    <div class="steps2-section-header">
                        <h2 class="thq-heading-2" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                            خطوات التمويل
                        </h2>
                        <p class="thq-body-large" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                            من هنا تستطيع تتبع خطوات عملية طلب تمويلك عبر بوابة نُيسـر
                        </p>
                        <div class="steps2-actions">
                            <button class="thq-button-filled thq-button-animated steps2-button">
                                <span class="thq-body-small"
                                    style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; "> <a
                                        href="{{ route('form') }}" class="nav-link" aria-current="page"
                                        style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; "> البدء
                                    </a></span>
                            </button>
                        </div>
                    </div>
                    <div class="steps2-container2">
                        <div class="steps2-container3 thq-card">
                            <h2 class="thq-heading-2"
                                style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                                <span>تعبئة النماذج</span>
                            </h2>
                            <span class="steps2-text04 thq-body-small"
                                style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                                <span>
                                    قم بتعبئة النماذج لاكمال التسجيل
                                </span>
                            </span>
                            <label class="steps2-text05 thq-heading-3">01</label>
                        </div>
                        <div class="steps2-container4 thq-card">
                            <h2 class="thq-heading-2"
                                style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                                <span>التدقيق والمراجعة

                                </span>
                            </h2>
                            <span class="steps2-text07 thq-body-small"
                                style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                                <span>
                                    تبدأ مرحلة التدقيق والمراجعة مباشرة بعد تعبئتك وإرسالك للنماذج المطلوبة
                                </span>
                            </span>
                            <label class="steps2-text08 thq-heading-3">02</label>
                        </div>
                        <div class="steps2-container5 thq-card">
                            <h2 class="thq-heading-2"
                                style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                                <span>تحديث الحالة </span>
                            </h2>
                            <span class="steps2-text10 thq-body-small"
                                style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                                <span>
                                    سيتم تحديث حالة طلبك بالقبول أو الرفض أو التعديل
                                </span>
                            </span>
                            <label class="steps2-text11 thq-heading-3">03</label>
                        </div>
                        <div class="steps2-container6 thq-card">
                            <h2 class="thq-heading-2"
                                style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                                <span>بدء إيداع التمويل </span>
                            </h2>
                            <span class="steps2-text13 thq-body-small"
                                style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                                <span>
                                    مباشرة بعد قبول طلبك من الجهة التمويلية سيتم التواصل معك من قبلها لإستكمال الإجراءات وبدء التمويل
                                </span>
                            </span>
                            <label class="steps2-text14 thq-heading-3">04</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="big-section wow animate__fadeIn">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-10 text-center sm-margin-30px-bottom">
                        <h5
                            class="alt-font text-dark-charcoal font-weight-700 text-uppercase letter-spacing-minus-1px mb-0">
                            <strong class="text-yellow-ochre text-decoration-underline"
                                style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">شركاؤنا</strong>
                        </h5>
                    </div>
                </div>
                <div
                    class="row row-cols-1 row-cols-lg-5 row-cols-md-1 row-cols-sm-1 client-logo-style-01 align-items-center margin-7-half-rem-top sm-margin-5-rem-top"style=" padding-top: 90px; ">
                    <!-- start client logo item -->
                    <div class="col text-center margin-30px-bottom sm-margin-15px-bottom wow animate__fadeIn"
                        data-wow-delay="0.1s">
                        <div class="avatar">
                            <a href="https://rdf.org.sa/ar">
                                <img src="{{ asset('images/logo-rajhi-min.png') }}" alt="Skytsunami" />
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <div class="contact3-contact20 thq-section-padding" id="contact-section">
            <div class="contact3-max-width thq-section-max-width">
                <div class="contact3-section-title">
                    <span class="thq-body-small">
                        <span></span>
                    </span>
                    <div class="contact3-content">
                        <h2 class="thq-heading-2"style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                            <span>تواصل معنا </span>
                        </h2>
                        <p class="contact3-text2 thq-body-large"
                            style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                            <span>
                                لأي استفسار سنكون بخدمتكم من الساعة ٧:٣٠ صباحا حتى الساعة ٢:٣٠ مساءا عبر وسائل التواصل
                                التالية
                            </span>
                        </p>
                    </div>
                </div>
                <div class="contact3-row" style= " ">
                    <div class="contact3-content1">
                        <svg viewBox="0 0 1024 1024" class="thq-icon-medium">
                            <path
                                d="M854 342v-86l-342 214-342-214v86l342 212zM854 170q34 0 59 26t25 60v512q0 34-25 60t-59 26h-684q-34 0-59-26t-25-60v-512q0-34 25-60t59-26h684z">
                            </path>
                        </svg>
                        <div class="contact3-contact-info">
                            <div class="contact3-content2">
                                <h3 class="contact3-text3 thq-heading-3"
                                    style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">Email</h3>
                                <p class="contact3-text4 thq-body-large">
                                    <span>

                                    </span>
                                </p>
                            </div>
                            <span class="contact3-email thq-body-small"
                                style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">
                                <span>info@example.edu</span>
                            </span>
                        </div>
                    </div>
                    <div class="contact3-content3">
                        <svg viewBox="0 0 1024 1024" class="thq-icon-medium">
                            <path
                                d="M282 460q96 186 282 282l94-94q20-20 44-10 72 24 152 24 18 0 30 12t12 30v150q0 18-12 30t-30 12q-300 0-513-213t-213-513q0-18 12-30t30-12h150q18 0 30 12t12 30q0 80 24 152 8 26-10 44z">
                            </path>
                        </svg>
                        <div class="contact3-contact-info1">
                            <div class="contact3-content4">
                                <h3 class="contact3-text5 thq-heading-3"
                                    style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">Phone</h3>
                                <p class="contact3-text6 thq-body-large">
                                    <span>

                                    </span>
                                </p>
                            </div>
                            <span class="contact3-phone thq-body-small">
                                <span>
                                    0112345678<br>
                                    0112345679<br>
                                    0112345680<br>
                                    0112345681
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="contact3-content5">
                        <svg viewBox="0 0 1024 1024" class="thq-icon-medium">
                            <path
                                d="M512 0c-176.732 0-320 143.268-320 320 0 320 320 704 320 704s320-384 320-704c0-176.732-143.27-320-320-320zM512 512c-106.040 0-192-85.96-192-192s85.96-192 192-192 192 85.96 192 192-85.96 192-192 192z">
                            </path>
                        </svg>
                        <div class="contact3-contact-info2">
                            <div class="contact3-content6">
                                <h3 class="contact3-text7 thq-heading-3"
                                    style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">Office</h3>
                                <p class="contact3-text8 thq-body-large">
                                    <span>

                                    </span>
                                </p>
                            </div>
                            <span class="contact3-address thq-body-small">
                                <span style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; ">مركز
                                    الأعمال - اسم الجامعة - الفرعاء</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer4-footer7 thq-section-padding">
        </footer>
    </div>
</body>

</html>
