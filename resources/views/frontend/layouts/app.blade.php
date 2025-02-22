<!DOCTYPE html>

@php
    $rtl = get_session_language()->rtl;
@endphp

@if ($rtl == 1)
    <html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endif

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ getBaseURL() }}">
    <meta name="file-base-url" content="{{ getFileBaseURL() }}">

    <title>@yield('meta_title', get_setting('website_name') . ' | ' . get_setting('site_motto'))</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="@yield('meta_description', get_setting('meta_description'))" />
    <meta name="keywords" content="@yield('meta_keywords', get_setting('meta_keywords'))">

    @yield('meta')

    @if (!isset($detailedProduct) && !isset($customer_product) && !isset($shop) && !isset($page) && !isset($blog))
        @php
            $meta_image = uploaded_asset(get_setting('meta_image'));
        @endphp
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{ get_setting('meta_title') }}">
        <meta itemprop="description" content="{{ get_setting('meta_description') }}">
        <meta itemprop="image" content="{{ $meta_image }}">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="{{ get_setting('meta_title') }}">
        <meta name="twitter:description" content="{{ get_setting('meta_description') }}">
        <meta name="twitter:creator" content="@author_handle">
        <meta name="twitter:image" content="{{ $meta_image }}">

        <!-- Open Graph data -->
        <meta property="og:title" content="{{ get_setting('meta_title') }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ route('home') }}" />
        <meta property="og:image" content="{{ $meta_image }}" />
        <meta property="og:description" content="{{ get_setting('meta_description') }}" />
        <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
        <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
    @endif

    <!-- Favicon -->
    @php
        $site_icon = uploaded_asset(get_setting('site_icon'));
    @endphp
    <link rel="icon" href="{{ $site_icon }}">
    <link rel="apple-touch-icon" href="{{ $site_icon }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ static_asset('assets/css/vendors.css') }}">
    @if ($rtl == 1)
        <link rel="stylesheet" href="{{ static_asset('assets/css/bootstrap-rtl.min.css') }}">
    @endif
    <link rel="stylesheet" href="{{ static_asset('assets/css/aiz-core.css?v=') }}{{ rand(1000, 9999) }}">
    <link rel="stylesheet" href="{{ static_asset('assets/css/custom-style.css') }}">


    <script>
        var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: '{!! translate('Nothing selected', null, true) !!}',
            nothing_found: '{!! translate('Nothing found', null, true) !!}',
            choose_file: '{{ translate('Choose file') }}',
            file_selected: '{{ translate('File selected') }}',
            files_selected: '{{ translate('Files selected') }}',
            add_more_files: '{{ translate('Add more files') }}',
            adding_more_files: '{{ translate('Adding more files') }}',
            drop_files_here_paste_or: '{{ translate('Drop files here, paste or') }}',
            browse: '{{ translate('Browse') }}',
            upload_complete: '{{ translate('Upload complete') }}',
            upload_paused: '{{ translate('Upload paused') }}',
            resume_upload: '{{ translate('Resume upload') }}',
            pause_upload: '{{ translate('Pause upload') }}',
            retry_upload: '{{ translate('Retry upload') }}',
            cancel_upload: '{{ translate('Cancel upload') }}',
            uploading: '{{ translate('Uploading') }}',
            processing: '{{ translate('Processing') }}',
            complete: '{{ translate('Complete') }}',
            file: '{{ translate('File') }}',
            files: '{{ translate('Files') }}',
        }
    </script>

    <style>
        @media (min-width: 320px) and (max-width: 767px) {
            .chat-container {
                display: none;
            }

            #welcome-message {
                display: none !important;
            }
        }

        .chat-container {
            position: fixed;
            bottom: 65px;
            right: 20px;
            /* Place container in the bottom-right corner */
            z-index: 1000;
        }

        .chat-box {
            width: 300px;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            position: absolute;
            bottom: 55px;
            /* Position above the icon */
            right: 0;
            display: none;
            /* Initially hidden */
        }

        .chat-box.open {
            display: block;
            /* Show chat box when toggled */
        }

        .chat-header {
            text-align: center;
        }

        .chat-header h4 {
            margin: 0;
            font-size: 18px;
        }

        .chat-header p {
            margin: 5px 0;
            font-size: 14px;
        }

        .close-chat-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
        }

        .chat-options {
            margin-top: 15px;
        }

        .chat-option {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            text-align: left;
        }

        .chat-option:hover {
            background-color: #e0e0e0;
        }

        .chat-icon {
            width: 50px;
            height: 50px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-size: 24px;
            text-align: center;
            position: relative;
            z-index: 1001;
            /* Keep icon above chat box */
        }

        .hidden {
            display: none;
        }


        :root {
            --blue: #3490f3;
            --hov-blue: #2e7fd6;
            --soft-blue: rgba(0, 123, 255, 0.15);
            --secondary-base:
                {{ get_setting('secondary_base_color', '#ffc519') }}
            ;
            --hov-secondary-base:
                {{ get_setting('secondary_base_hov_color', '#dbaa17') }}
            ;
            --soft-secondary-base:
                {{ hex2rgba(get_setting('secondary_base_color', '#ffc519'), 0.15) }}
            ;
            --gray: #9d9da6;
            --gray-dark: #8d8d8d;
            --secondary: #919199;
            --soft-secondary: rgba(145, 145, 153, 0.15);
            --success: #85b567;
            --soft-success: rgba(133, 181, 103, 0.15);
            --warning: #f3af3d;
            --soft-warning: rgba(243, 175, 61, 0.15);
            --light: #f5f5f5;
            --soft-light: #dfdfe6;
            --soft-white: #b5b5bf;
            --dark: #292933;
            --soft-dark: #1b1b28;
            --primary:
                {{ get_setting('base_color', '#d43533') }}
            ;
            --hov-primary:
                {{ get_setting('base_hov_color', '#9d1b1a') }}
            ;
            --soft-primary:
                {{ hex2rgba(get_setting('base_color', '#d43533'), 0.15) }}
            ;
        }

        body {
            font-family: 'Public Sans', sans-serif;
            font-weight: 400;
        }

        .pagination .page-link,
        .page-item.disabled .page-link {
            min-width: 32px;
            min-height: 32px;
            line-height: 32px;
            text-align: center;
            padding: 0;
            border: 1px solid var(--soft-light);
            font-size: 0.875rem;
            border-radius: 0 !important;
            color: var(--dark);
        }

        .pagination .page-item {
            margin: 0 5px;
        }

        .aiz-carousel.coupon-slider .slick-track {
            margin-left: 0;
        }

        .form-control:focus {
            border-width: 2px !important;
        }

        .iti__flag-container {
            padding: 2px;
        }

        .modal-content {
            border: 0 !important;
            border-radius: 0 !important;
        }

        .tagify.tagify--focus {
            border-width: 2px;
            border-color: var(--primary);
        }

        #map {
            width: 100%;
            height: 250px;
        }

        #edit_map {
            width: 100%;
            height: 250px;
        }

        .pac-container {
            z-index: 100000;
        }

        .cart-section {
            position: fixed;
            right: 0;
            /* Positioned completely to the right */
            top: 50%;
            transform: translateY(-50%);
            background-color: white;
            color: #ff5733;
            padding: 10px;
            border: none;
            border-left: 2px solid var(--primary);
            border-radius: 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: auto;
            cursor: pointer;
            text-decoration: none;
        }

        .cart-section .cart-icon {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .cart-section .cart-count {
            font-size: 12px;
            font-weight: bold;
            background-color: #ffffff;
            color: var(--primary);
            padding: 2px 6px;
            border-radius: 50%;
            position: absolute;
            top: 5px;
            right: 5px;
            border: 1px solid var(--primary);
        }

        .cart-dropdown {
            position: fixed;
            top: 50%;
            right: 70px;
            transform: translateY(-50%);
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            padding: 15px;
            z-index: 999;
            width: 300px;
        }

        .cart-dropdown ul {
            list-style: none;
            margin: 0;
            padding: 0;
            max-height: 200px;
            overflow-y: auto;
        }

        .cart-dropdown ul li {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
        }

        .cart-total {
            margin-top: 15px;
            font-size: 16px;
            text-align: right;
        }

        .cart-dropdown button {
            margin-top: 10px;
            background-color: #ff5733;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .cart-dropdown button:hover {
            background-color: #e14a2b;
        }

        @media screen and (max-width: 768px) {
            #cartSection {
                display: none !important;
            }

            #chat-form {
                width: 309px !important;
                margin-bottom: -10px !important;
            }

            #name {
                width: 90% !important;
                height: 34px !important;
                font-size: 13px !important;
            }

            #country-code {
                height: 34px !important;
                font-size: 10px !important;
            }

            #mobile {
                height: 34px !important;
                font-size: 13px !important;
                width: 63% !important;
            }

            #query {
                width: 90% !important;
                height: 54px !important;
                font-size: 13px !important;
            }

            #submit {
                width: 90% !important;
                height: 34px !important;
                font-size: 13px !important;
            }

            #scrollToTopButton {
                display: none !important;
            }
        }
    </style>

    @if (get_setting('google_analytics') == 1)
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('TRACKING_ID') }}"></script>

        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());
            gtag('config', '{{ env('TRACKING_ID') }}');
        </script>
    @endif

    @if (get_setting('facebook_pixel') == 1)
        <!-- Facebook Pixel Code -->
        <script>
            !function (f, b, e, v, n, t, s) {
                if (f.fbq) return; n = f.fbq = function () {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
                n.queue = []; t = b.createElement(e); t.async = !0;
                t.src = v; s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ env('FACEBOOK_PIXEL_ID') }}');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id={{ env('FACEBOOK_PIXEL_ID') }}&ev=PageView&noscript=1" />
        </noscript>
        <!-- End Facebook Pixel Code -->
    @endif

    @php
        echo get_setting('header_script');
    @endphp

</head>

<body>

    <div class="chat-container">
        <div id="chat-box" class="chat-box">
            <div class="chat-header">
                <h4>Hi there!</h4>
                <p>Let us know if we can help you with anything at all.</p>
                <button id="close-chat" class="close-chat-btn">&times;</button>
            </div>
            <div class="chat-options">
                <div class="chat-option live-chat-option"
                    style="background-color: var(--primary); color: white; display: flex; align-items: center;">
                    <img src="{{ asset('photo/chat-bubble.png') }}" alt="Chat Icon"
                        style="margin-right: 8px; height: 20px;">
                    LiveChat
                </div>

                <div class="chat-option" style="color: black; display: flex; align-items: center; cursor: pointer;"
                    onmouseover="this.style.backgroundColor='var(--primary)'; this.style.color='white'"
                    onmouseout="this.style.backgroundColor=''; this.style.color='black'"
                    onclick="window.open('https://www.messenger.com/', '_blank')">
                    <img src="{{ asset('photo/messenger.png') }}" alt="Chat Icon"
                        style="margin-right: 8px; height: 20px;">
                    Messenger
                </div>


                <a href="https://wa.me/+8801897608888 " target="_blank" style="text-decoration: none;">
                    <div class="chat-option" style="color: black; display: flex; align-items: center;"
                        onmouseover="this.style.backgroundColor='var(--primary)'; this.style.color='white'"
                        onmouseout="this.style.backgroundColor=''; this.style.color='black'">
                        <img src="{{ asset('photo/whatsapp.png') }}" alt="Chat Icon"
                            style="margin-right: 8px; height: 20px;">
                        Whatsapp
                    </div>
                </a>

            </div>
        </div>
        <div id="chat-form" class="chat-box"
            style="width: 374px; background: #f3fdfb; border: 2px solid #28a745; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 15px; font-family: Arial, sans-serif; font-size: 14px;">
            <div class="chat-header"
                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                <div style="display: flex; align-items: center;">
                    @php
                        $header_logo = get_setting('header_logo');
                        $site_icon = uploaded_asset(get_setting('site_icon')); // Fetching the site icon
                    @endphp

                    <!-- Site Icon -->
                    @if ($site_icon != null)
                        <img src="{{ $site_icon }}" alt="{{ env('APP_NAME') }} Site Icon"
                            style="max-width: 30px; max-height: 30px; border-radius: 50%; object-fit: cover;">
                    @else
                        <img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }} Site Icon"
                            style="max-width: 30px; max-height: 30px; border-radius: 50%; object-fit: cover;">
                    @endif

                    <span style="margin-left: 10px; font-size: 16px; font-weight: bold; color: #28a745;">Let us know if
                        we can help you with anything at all.</span>
                </div>

                <button id="close-form" class="close-chat-btn"
                    style="background: none; border: none; font-size: 18px; cursor: pointer; color: #28a745;">&times;</button>
            </div>

            <form id="chat-form" onsubmit="sendToWhatsApp(event)">
                <div style="margin-bottom: 10px;">
                    <input type="text" id="name" placeholder="Enter your name"
                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 10px; display: flex; align-items: center; gap: 5px;">
                    <select id="country-code"
                        style="width: 25%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                        <option value="+880">+880</option>
                    </select>
                    <input type="tel" id="mobile" placeholder="Enter your mobile number"
                        style="width: 75%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 10px;">
                    <textarea id="query" placeholder="Write your query here"
                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; resize: none; height: 60px;"></textarea>
                </div>
                <button type="submit" id="submit"
                    style="width: 100%; padding: 10px; background: #28a745; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">Submit</button>
            </form>
        </div>

        <script>
            function sendToWhatsApp(event) {
                event.preventDefault();
                const name = document.getElementById('name').value;
                const query = document.getElementById('query').value;
                if (!name || !query) {
                    alert('Please fill in all fields before submitting.');
                    return;
                }
                const phoneNumber = '+8801897608888';
                const message = `Name: ${encodeURIComponent(name)}\nQuery: ${encodeURIComponent(query)}`;
                const whatsappUrl = `https://wa.me/${phoneNumber}?text=${message}`;
                window.open(whatsappUrl, '_blank');
            }
        </script>
        <!--Welcome-->

        <button id="chat-icon" class="chat-icon">
            <img src="{{ asset('photo/chat.png') }}" alt="Chat Icon" style="height: 27px;">
        </button>
    </div>

    <div id="welcome-message">
        আসসালামু আলাইকুম, <br> CelecomBazar এ স্বাগতম।<br> যেকোনো কিছু জানতে আমাদের মেসেজ করুন।<br> ধন্যবাদ।
    </div>

    <div id="scrollToTopButton" onclick="scrollToTop()" title="Go to top">
        <i class="arrow-up"></i>
    </div>

    <style>
        /* Scroll to Top Button */
        #scrollToTopButton {
            position: fixed;
            bottom: 131px;
            right: 24px;
            width: 45px;
            height: 45px;
            border: 2px solid transparent;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 999;
            opacity: 0;
            visibility: hidden;
        }

        /* Arrow Icon */
        #scrollToTopButton .arrow-up {
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 12px solid #000;
            /* White arrow */
        }

        /* Hover Effect */
        #scrollToTopButton:hover {
            background-color: var(--primary) !important;

        }

        /* Show Button When Scrolled */
        #scrollToTopButton.show {
            opacity: 1;
            visibility: visible;
        }

        /* Progress Bar Border */
        #scrollToTopButton.progress {
            border-color: #007bff;
            /* Blue border becomes visible */
        }

        #welcome-message {
            position: fixed;
            bottom: 117px;
            right: 20px;
            background: rgba(255, 255, 255, 0.86);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid #cfcbcb;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            color: black;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            display: none;
            /* Hidden initially */
            z-index: 9999;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }
    </style>

    <script>
        const scrollToTopButton = document.getElementById("scrollToTopButton");

        // Listen for scroll events
        window.addEventListener("scroll", function () {
            const scrollTop = window.scrollY || document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercentage = (scrollTop / scrollHeight) * 100;

            // Show the button when scrolling down
            if (scrollTop > 100) {
                scrollToTopButton.classList.add("show");
            } else {
                scrollToTopButton.classList.remove("show");
            }

            // Update the border to reflect scroll progress
            scrollToTopButton.style.borderWidth = "2px";
            scrollToTopButton.style.borderColor = "var(--primary) !important";
            scrollToTopButton.style.backgroundImage = `var(--primary) !important
        )`;
        });

        // Smooth scroll to top
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        }
        window.onload = function () {
            // Wait for 3 minutes (180,000 milliseconds) before showing the welcome message
            setTimeout(function () {
                var welcomeMessage = document.getElementById('welcome-message');
                welcomeMessage.style.display = 'block';

                // Optionally, hide the message after a few seconds
                setTimeout(function () {
                    welcomeMessage.style.display = 'none';
                }, 8000); // Hides the message after 8 seconds
            }, 180000); // Delays the display of the message for 3 minutes
        };

    </script>

    <!-- Cart section -->
    <div class="cart-section" id="cartSection" style="display: none;display: flex;margin-top: 1%;width: 6%;">
        @php
            $total = 0;
            $carts = get_user_cart();
            if (count($carts) > 0) {
                foreach ($carts as $key => $cartItem) {
                    $product = get_single_product($cartItem['product_id']);
                    $total = $total + cart_product_price($cartItem, $product, false) * $cartItem['quantity'];
                }
            }
        @endphp
        <!-- Cart button with cart count -->

        <a href="javascript:void(0)" class=" align-items-center text-dark px-3 h-100" data-toggle="dropdown"
            data-display="static" title="{{translate('Cart')}}" style="align-items: center; text-decoration: none;">
            <span style="margin-right: 8px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20.562" viewBox="0 0 24 20.562">
                    <g id="_5e67fc94b53aaec8ca181b806dd815ee" data-name="5e67fc94b53aaec8ca181b806dd815ee"
                        transform="translate(-33.276 -101)">
                        <path id="Path_32659" data-name="Path 32659"
                            d="M34.034,102.519H38.2l-.732-.557c.122.37.243.739.365,1.112q.441,1.333.879,2.666.528,1.6,1.058,3.211.46,1.394.917,2.788c.149.451.291.9.446,1.352l.008.02a.76.76,0,0,0,1.466-.4c-.122-.37-.243-.739-.365-1.112q-.441-1.333-.879-2.666-.528-1.607-1.058-3.213-.46-1.394-.917-2.788c-.149-.451-.289-.9-.446-1.352l-.008-.02a.783.783,0,0,0-.732-.557H34.037a.76.76,0,0,0,0,1.519Z"
                            fill="var(--primary)" />
                        <path id="Path_32660" data-name="Path 32660"
                            d="M288.931,541.934q-.615,1.1-1.233,2.193c-.058.106-.119.21-.177.317a.767.767,0,0,0,.656,1.142h11.6c.534,0,1.071.01,1.608,0h.023a.76.76,0,0,0,0-1.519h-11.6c-.534,0-1.074-.015-1.608,0h-.023l.656,1.142q.615-1.1,1.233-2.193c.058-.106.119-.21.177-.316a.759.759,0,0,0-1.312-.765Z"
                            transform="translate(-247.711 -429.41)" fill="var(--primary)" />
                        <circle id="Ellipse_553" data-name="Ellipse 553" cx="1.724" cy="1.724" r="1.724"
                            transform="translate(49.612 117.606)" fill="var(--primary)" />
                        <path id="Path_32661" data-name="Path 32661"
                            d="M658.4,739.2a2.267,2.267,0,0,0,1.489,2.1,2.232,2.232,0,0,0,2.433-.648A2.231,2.231,0,1,0,658.4,739.2a.506.506,0,0,0,1.013,0c0-.041,0-.084.005-.124a.381.381,0,0,1,.005-.053c.008-.1,0,.033-.005.03a.979.979,0,0,1,.061-.248c.008-.02.023-.106.04-.111s-.046.094-.018.043a.656.656,0,0,0,.028-.061,2.3,2.3,0,0,1,.129-.215c.048-.073-.068.078.013-.015.025-.028.051-.058.078-.086s.056-.056.084-.081l.038-.033c.018-.015.091-.051.025-.023s-.015.013,0,0,.035-.025.056-.038a.947.947,0,0,1,.086-.051c.038-.023.078-.041.119-.061.013-.008.066-.033,0,0s.025-.008.033-.01A1.56,1.56,0,0,1,660.4,738l.068-.013c.056-.013-.048.005-.048.005.046,0,.094-.01.139-.01a2.043,2.043,0,0,1,.248.008c.094.008-.1-.018.02.005.046.008.089.02.134.03s.076.023.114.035a.589.589,0,0,1,.063.023c0,.008-.094-.048-.043-.018.071.043.149.076.22.122.018.013.035.025.056.038s.056.023,0,0-.018-.015,0,0l.051.043a2.274,2.274,0,0,1,.172.177c.076.084-.035-.058.013.015.02.033.043.063.063.1s.041.068.058.1l.023.046c.048.091.01-.008,0-.013.03.01.063.192.073.225l.023.1c.02.1,0-.03,0-.033.013.013.008.071.008.086a1.749,1.749,0,0,1,0,.23.63.63,0,0,0-.005.071c0,.051-.03.043.005-.03a.791.791,0,0,0-.028.134c-.018.071-.046.139-.066.21s.046-.086.013-.028a.245.245,0,0,0-.02.046c-.02.041-.041.078-.063.117s-.041.066-.063.1c-.068.1.048-.051-.01.018a1.932,1.932,0,0,1-.172.18c-.01.01-.071.076-.089.076,0,0,.1-.071.023-.02-.015.01-.028.018-.041.028-.071.046-.144.084-.218.122s.091-.03-.018.008l-.111.038-.116.03c-.018,0-.033.008-.051.01-.111.025.081-.005.015,0a2.045,2.045,0,0,1-.248.01c-.041,0-.081-.005-.124-.008-.015,0-.076-.008,0,0s-.018-.005-.035-.008a1.912,1.912,0,0,1-.261-.076c-.015-.005-.066-.03,0,0s-.015-.008-.03-.015c-.041-.02-.078-.041-.117-.063s-.073-.048-.111-.073c-.061-.038.008.02.023.02-.01,0-.043-.035-.051-.043a1.872,1.872,0,0,1-.187-.187.3.3,0,0,1-.043-.051c0,.01.061.086.02.023-.025-.038-.051-.073-.073-.111s-.048-.089-.071-.132c-.053-.1.025.081-.015-.033a1.836,1.836,0,0,1-.073-.263.163.163,0,0,0-.01-.051c.038.084.008.071,0,.013s-.008-.106-.008-.16a.513.513,0,0,0-1.026,0Z"
                            transform="translate(-609.293 -619.872)" fill="var(--primary)" />
                        <circle id="Ellipse_554" data-name="Ellipse 554" cx="1.724" cy="1.724" r="1.724"
                            transform="translate(40.884 117.606)" fill="var(--primary)" />
                        <path id="Path_32662" data-name="Path 32662"
                            d="M270.814,272.355a2.267,2.267,0,0,0,1.489,2.1,2.232,2.232,0,0,0,2.433-.648,2.231,2.231,0,1,0-3.922-1.453.506.506,0,0,0,1.013,0c0-.041,0-.084.005-.124a.377.377,0,0,1,.005-.053c.008-.1,0,.033-.005.03a.981.981,0,0,1,.061-.248c.008-.02.023-.106.04-.111s-.046.094-.018.043a.656.656,0,0,0,.028-.061,2.3,2.3,0,0,1,.129-.215c.048-.073-.068.079.013-.015.025-.028.051-.058.078-.086s.056-.056.084-.081l.038-.033c.018-.015.091-.051.025-.023s-.015.013,0,0,.035-.025.056-.038a.96.96,0,0,1,.086-.051c.038-.023.078-.04.119-.061.013-.008.066-.033,0,0s.025-.008.033-.01a1.564,1.564,0,0,1,.213-.061l.068-.013c.056-.013-.048.005-.048.005.046,0,.094-.01.139-.01a2.031,2.031,0,0,1,.248.008c.094.008-.1-.018.02.005.046.008.089.02.134.03s.076.023.114.035a.583.583,0,0,1,.063.023c0,.008-.094-.048-.043-.018.071.043.149.076.22.122.018.013.035.025.056.038s.056.023,0,0-.018-.015,0,0l.051.043a2.257,2.257,0,0,1,.172.177c.076.084-.035-.058.013.015.02.033.043.063.063.1s.04.068.058.1l.023.046c.048.091.01-.008,0-.013.03.01.063.192.073.225l.023.1c.02.1,0-.03,0-.033.013.013.008.071.008.086a1.749,1.749,0,0,1,0,.23.622.622,0,0,0-.005.071c0,.051-.03.043.005-.03a.788.788,0,0,0-.028.134c-.018.071-.046.139-.066.21s.046-.086.013-.028a.249.249,0,0,0-.02.046c-.02.04-.041.078-.063.116s-.041.066-.063.1c-.068.1.048-.051-.01.018a1.929,1.929,0,0,1-.172.18c-.01.01-.071.076-.089.076,0,0,.1-.071.023-.02-.015.01-.028.018-.041.028-.071.046-.144.084-.218.122s.091-.03-.018.008l-.111.038-.116.03c-.018,0-.033.008-.051.01-.111.025.081-.005.015,0a2.039,2.039,0,0,1-.248.01c-.041,0-.081-.005-.124-.008-.015,0-.076-.008,0,0s-.018-.005-.035-.008a1.919,1.919,0,0,1-.261-.076c-.015-.005-.066-.03,0,0s-.015-.008-.03-.015c-.04-.02-.078-.04-.116-.063s-.073-.048-.111-.073c-.061-.038.008.02.023.02-.01,0-.043-.035-.051-.043a1.873,1.873,0,0,1-.187-.187.3.3,0,0,1-.043-.051c0,.01.061.086.02.023-.025-.038-.051-.073-.073-.111s-.048-.089-.071-.132c-.053-.1.025.081-.015-.033a1.84,1.84,0,0,1-.073-.263.164.164,0,0,0-.01-.051c.038.084.008.071,0,.013s-.008-.106-.008-.16a.513.513,0,0,0-1.026,0ZM287.2,258l-3.074,7.926H272.313L269.7,258Z"
                            transform="translate(-230.437 -153.024)" fill="var(--primary)" />
                        <path id="Path_32663" data-name="Path 32663"
                            d="M267.044,237.988q-.52,1.341-1.038,2.682-.828,2.138-1.654,4.274l-.38.983.489-.372H254.1c-.476,0-.957-.02-1.436,0h-.02l.489.372q-.444-1.348-.886-2.694-.7-2.131-1.4-4.264c-.109-.327-.215-.653-.324-.983l-.489.641h16.791c.228,0,.456.005.681,0h.03a.506.506,0,0,0,0-1.013H250.744c-.228,0-.456-.005-.681,0h-.03a.511.511,0,0,0-.489.641q.444,1.348.886,2.694.7,2.131,1.4,4.264c.109.327.215.653.324.983a.523.523,0,0,0,.489.372h10.359c.476,0,.957.018,1.436,0h.02a.526.526,0,0,0,.489-.372q.52-1.341,1.038-2.682.828-2.138,1.654-4.274l.38-.983a.508.508,0,0,0-.355-.623A.52.52,0,0,0,267.044,237.988Z"
                            transform="translate(-210.769 -133.152)" fill="var(--primary)" />
                    </g>
                </svg>
            </span>
            <!--<span>Product add</span>-->
            <div
                style="display: flex;align-items: center;justify-content: space-between;border: 1px solid var(--primary);margin-top: 8px;border-radius: 7px;padding: 3px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <!-- Total Price -->
                <span class="fs-14 fw-700 " style="font-size: 14px; font-weight: 700; color: var(--primary);">
                    {{ single_price($total) }}
                </span>

                <!-- Cart Count -->
                <span class="nav-box-text fs-12" style="font-size: 12px; color: var(--primary);">
                    <span class="cart-count" style="margin-right: 24%;font-weight: 400;height: 21px;">
                        {{ count($carts) > 0 ? count($carts) : 0 }}
                    </span>
                </span>

            </div>

        </a>

        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg p-0 stop-propagation rounded-0"
            style="right: 93px; top: -108px;">
            @if (isset($carts) && count($carts) > 0)
                    <div class="fs-16 fw-700 text-soft-dark pt-4 pb-2 mx-4 border-bottom"
                        style="border-color: #e5e5e5 !important;">
                        {{ translate('Cart Items') }}
                    </div>
                    <!-- Cart Products -->
                    <ul class="h-256px overflow-auto c-scrollbar-light list-group list-group-flush mx-1">
                        @foreach ($carts as $key => $cartItem)
                                    @php
                                        $product = get_single_product($cartItem['product_id']);
                                    @endphp
                                    @if ($product != null)
                                        <li class="list-group-item border-0 hov-scale-img">
                                            <span class="d-flex align-items-center">
                                                <a href="{{ route('product', $product->slug) }}"
                                                    class="text-reset d-flex align-items-center flex-grow-1">
                                                    <img src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                                        class="img-fit lazyload size-60px has-transition"
                                                        alt="{{ $product->getTranslation('name') }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                                    <span class="minw-0 pl-2 flex-grow-1">
                                                        <span class="fw-700 fs-13 text-dark mb-2 text-truncate-2"
                                                            title="{{ $product->getTranslation('name') }}">
                                                            {{ $product->getTranslation('name') }}
                                                        </span>
                                                        <span class="fs-14 fw-400 text-secondary">{{ $cartItem['quantity'] }}x</span>
                                                        <span
                                                            class="fs-14 fw-400 text-secondary">{{ cart_product_price($cartItem, $product) }}</span>
                                                    </span>
                                                </a>
                                                <span class="">
                                                    <button onclick="removeFromCart({{ $cartItem['id'] }})"
                                                        class="btn btn-sm btn-icon stop-propagation">
                                                        <i class="la la-close fs-18 fw-600 text-secondary"></i>
                                                    </button>
                                                </span>
                                            </span>
                                        </li>
                                    @endif
                        @endforeach
                    </ul>
                    <!-- Subtotal -->
                    <div class="px-3 py-2 fs-15 border-top d-flex justify-content-between mx-4"
                        style="border-color: #e5e5e5 !important;">
                        <span class="fs-14 fw-400 text-secondary">{{ translate('Subtotal') }}</span>
                        <span class="fs-16 fw-700 text-dark">{{ single_price($total) }}</span>
                    </div>
                    <!-- View cart & Checkout Buttons -->
                    <div class="py-3 text-center border-top mx-4" style="border-color: #e5e5e5 !important;">
                        <div class="row gutters-10 justify-content-center">
                            <div class="col-sm-6 mb-2">
                                <a href="{{ route('cart') }}"
                                    class="btn btn-secondary-base btn-sm btn-block rounded-4 text-white">
                                    {{ translate('View cart') }}
                                </a>
                            </div>
                            @if (Auth::check())
                                <div class="col-sm-6">
                                    <a href="{{ route('checkout.shipping_info') }}"
                                        class="btn btn-primary btn-sm btn-block rounded-4">
                                        {{ translate('Checkout') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
            @else
                <div class="text-center p-3">
                    <i class="las la-frown la-3x opacity-60 mb-3"></i>
                    <h3 class="h6 fw-700">{{ translate('Your Cart is empty') }}</h3>
                </div>
            @endif
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const chatBox = document.getElementById("chat-box");
            const chatForm = document.getElementById("chat-form");
            const chatIcon = document.getElementById("chat-icon");
            const closeChatBtn = document.getElementById("close-chat");
            const closeFormBtn = document.getElementById("close-form");
            const liveChatOption = document.querySelector(".live-chat-option");

            // Function to close all open boxes and return to the chat icon
            const closeAll = () => {
                if (chatBox) chatBox.classList.remove("open");
                if (chatForm) chatForm.classList.remove("open");
                if (chatIcon) chatIcon.classList.remove("hidden");
            };

            // Open the chat box
            if (chatIcon) {
                chatIcon.addEventListener("click", () => {
                    if (chatBox) chatBox.classList.add("open");
                    chatIcon.classList.add("hidden");
                });
            }

            // Close the chat box
            if (closeChatBtn) {
                closeChatBtn.addEventListener("click", () => {
                    closeAll();
                });
            }

            // Switch to the form when LiveChat is clicked
            if (liveChatOption) {
                liveChatOption.addEventListener("click", () => {
                    if (chatBox) chatBox.classList.remove("open");
                    if (chatForm) chatForm.classList.add("open");
                });
            }

            // Close the form and return to the chat icon
            if (closeFormBtn) {
                closeFormBtn.addEventListener("click", () => {
                    closeAll();
                });
            }

            // Close chat/form when clicking outside
            document.addEventListener("click", (event) => {
                const isInsideChatBox = chatBox?.contains(event.target);
                const isInsideChatForm = chatForm?.contains(event.target);
                const isChatIcon = chatIcon?.contains(event.target);

                // If click is outside all components, close everything
                if (!isInsideChatBox && !isInsideChatForm && !isChatIcon) {
                    closeAll();
                }
            });
        });


        document.addEventListener('DOMContentLoaded', function () {

            // Show the cart section on all pages
            document.getElementById('cartSection').style.display = 'flex';

            updateCart(cartData);

            window.removeFromCart = function (productId) {
                const updatedCart = cartData.filter(item => item.id !== productId);
                updateCart(updatedCart);
            };

            window.toggleCartView = function () {
                window.location.href = 'https://www.amaderbazar.net/cart';
            };

            function updateCart(cart) {
                const cartCount = document.getElementById('cartCount');
                const cartItemsList = document.getElementById('cartItemsList');
                const cartTotal = document.getElementById('cartTotal');

                const totalItems = cart.reduce((count, item) => count + item.quantity, 0);
                const totalPrice = cart.reduce((total, item) => total + item.price * item.quantity, 0);

                cartCount.innerText = totalItems;
                cartTotal.innerText = totalPrice.toFixed(2);

                cartItemsList.innerHTML = '';
                cart.forEach(item => {
                    const li = document.createElement('li');
                    li.innerHTML = `
            ${item.name} (x${item.quantity}) - $${(item.price * item.quantity).toFixed(2)}
            <button onclick="removeFromCart(${item.id})">Remove</button>
        `;
                    cartItemsList.appendChild(li);
                });
            }

            window.redirectToCart = function () {
                window.location.href = 'https://www.amaderbazar.net/cart'; // Redirect to the AmaderBazar cart page
            };
        });

    </script>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


    <!-- aiz-main-wrapper -->
    <div class="aiz-main-wrapper d-flex flex-column bg-white">
        @php
            $user = auth()->user();
            $user_avatar = null;
            $carts = [];
            if ($user && $user->avatar_original != null) {
                $user_avatar = uploaded_asset($user->avatar_original);
            }

            $system_language = get_system_language();

            // if ($user != null) {
            //     $carts = App\Models\Cart::where('user_id', auth()->user()->id)->get();
            // }
        @endphp
        <!-- Header -->
        @include('frontend.inc.nav')

        @yield('content')

        <!-- footer -->
        @include('frontend.inc.footer')

    </div>

    <!-- Floating Buttons -->
    @include('frontend.inc.floating_buttons')

    @if (env("DEMO_MODE") == "On")
        <!-- demo nav -->
        @include('frontend.inc.demo_nav')
    @endif

    <!-- cookies agreement -->
    @if (get_setting('show_cookies_agreement') == 'on')
        <div class="aiz-cookie-alert shadow-xl">
            <div class="p-3 bg-dark rounded">
                <div class="text-white mb-3">
                    @php
                        echo get_setting('cookies_agreement_text');
                    @endphp
                </div>
                <button class="btn btn-primary aiz-cookie-accept">
                    {{ translate('Ok. I Understood') }}
                </button>
            </div>
        </div>
    @endif

    <!-- website popup -->
    @if (get_setting('show_website_popup') == 'on')
        <div class="modal website-popup removable-session d-none" data-key="website-popup" data-value="removed">
            <div class="absolute-full bg-black opacity-60"></div>
            <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-md mx-4 mx-md-auto">
                <div class="modal-content position-relative border-0 rounded-0">
                    <div class="aiz-editor-data">
                        {!! get_setting('website_popup_content') !!}
                    </div>
                    @if (get_setting('show_subscribe_form') == 'on')
                        <div class="pb-5 pt-4 px-3 px-md-5">
                            <form class="" method="POST" action="{{ route('subscribers.store') }}">
                                @csrf
                                <div class="form-group mb-0">
                                    <input type="email" class="form-control" placeholder="{{ translate('Your Email Address') }}"
                                        name="email" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mt-3">
                                    {{ translate('Subscribe Now') }}
                                </button>
                            </form>
                        </div>
                    @endif
                    <button class="absolute-top-right bg-white shadow-lg btn btn-circle btn-icon mr-n3 mt-n3 set-session"
                        data-key="website-popup" data-value="removed" data-toggle="remove-parent"
                        data-parent=".website-popup">
                        <i class="la la-close fs-20"></i>
                    </button>
                </div>
            </div>
        </div>
    @endif

    @include('frontend.' . get_setting('homepage_select') . '.partials.modal')

    @include('frontend.' . get_setting('homepage_select') . '.partials.account_delete_modal')

    <div class="modal fade" id="addToCart">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size"
            role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader text-center p-3">
                    <i class="las la-spinner la-spin la-3x"></i>
                </div>
                <button type="button"
                    class="close absolute-top-right btn-icon close z-1 btn-circle bg-gray mr-2 mt-2 d-flex justify-content-center align-items-center"
                    data-dismiss="modal" aria-label="Close"
                    style="background: #ededf2; width: calc(2rem + 2px); height: calc(2rem + 2px);">
                    <span aria-hidden="true" class="fs-24 fw-700" style="margin-left: 2px;">&times;</span>
                </button>
                <div id="addToCart-modal-body">

                </div>
            </div>
        </div>
    </div>

    @yield('modal')

    <!-- SCRIPTS -->
    <script src="{{ static_asset('assets/js/vendors.js') }}"></script>
    <script src="{{ static_asset('assets/js/aiz-core.js?v=') }}{{ rand(1000, 9999) }}"></script>



    @if (get_setting('facebook_chat') == 1)
        <script type="text/javascript">
            window.fbAsyncInit = function () {
                FB.init({
                    xfbml: true,
                    version: 'v3.3'
                });
            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div id="fb-root"></div>
        <!-- Your customer chat code -->
        <div class="fb-customerchat" attribution=setup_tool page_id="{{ env('FACEBOOK_PAGE_ID') }}">
        </div>
    @endif

    <script>
        @foreach (session('flash_notification', collect())->toArray() as $message)
            AIZ.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
        @endforeach
    </script>

    <script>
        @if (Route::currentRouteName() == 'home' || Route::currentRouteName() == '/')

            $.post('{{ route('home.section.featured') }}', {
                _token: '{{ csrf_token() }}'
            }, function (data) {
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('{{ route('home.section.todays_deal') }}', {
                _token: '{{ csrf_token() }}'
            }, function (data) {
                $('#todays_deal').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('{{ route('home.section.best_selling') }}', {
                _token: '{{ csrf_token() }}'
            }, function (data) {
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('{{ route('home.section.newest_products') }}', {
                _token: '{{ csrf_token() }}'
            }, function (data) {
                $('#section_newest').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('{{ route('home.section.auction_products') }}', {
                _token: '{{ csrf_token() }}'
            }, function (data) {
                $('#auction_products').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('{{ route('home.section.home_categories') }}', {
                _token: '{{ csrf_token() }}'
            }, function (data) {
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });
        @endif

        $(document).ready(function () {
            $('.category-nav-element').each(function (i, el) {

                $(el).on('mouseover', function () {
                    if (!$(el).find('.sub-cat-menu').hasClass('loaded')) {
                        $.post('{{ route('category.elements') }}', {
                            _token: AIZ.data.csrf,
                            id: $(el).data('id'
                            )
                        }, function (data) {
                            $(el).find('.sub-cat-menu').addClass('loaded').html(data);
                        });
                    }
                });
            });

            if ($('#lang-change').length > 0) {
                $('#lang-change .dropdown-menu a').each(function () {
                    $(this).on('click', function (e) {
                        e.preventDefault();
                        var $this = $(this);
                        var locale = $this.data('flag');
                        $.post('{{ route('language.change') }}', { _token: AIZ.data.csrf, locale: locale }, function (data) {
                            location.reload();
                        });

                    });
                });
            }

            if ($('#currency-change').length > 0) {
                $('#currency-change .dropdown-menu a').each(function () {
                    $(this).on('click', function (e) {
                        e.preventDefault();
                        var $this = $(this);
                        var currency_code = $this.data('currency');
                        $.post('{{ route('currency.change') }}', { _token: AIZ.data.csrf, currency_code: currency_code }, function (data) {
                            location.reload();
                        });

                    });
                });
            }
        });

        $('#search').on('keyup', function () {
            search();
        });

        $('#search').on('focus', function () {
            search();
        });

        function search() {
            var searchKey = $('#search').val();
            if (searchKey.length > 0) {
                $('body').addClass("typed-search-box-shown");

                $('.typed-search-box').removeClass('d-none');
                $('.search-preloader').removeClass('d-none');
                $.post('{{ route('search.ajax') }}', { _token: AIZ.data.csrf, search: searchKey }, function (data) {
                    if (data == '0') {
                        // $('.typed-search-box').addClass('d-none');
                        $('#search-content').html(null);
                        $('.typed-search-box .search-nothing').removeClass('d-none').html('{{ translate('Sorry, nothing found for') }} <strong>"' + searchKey + '"</strong>');
                        $('.search-preloader').addClass('d-none');

                    }
                    else {
                        $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                        $('#search-content').html(data);
                        $('.search-preloader').addClass('d-none');
                    }
                });
            }
            else {
                $('.typed-search-box').addClass('d-none');
                $('body').removeClass("typed-search-box-shown");
            }
        }

        $(".aiz-user-top-menu").on("mouseover", function (event) {
            $(".hover-user-top-menu").addClass('active');
        })
            .on("mouseout", function (event) {
                $(".hover-user-top-menu").removeClass('active');
            });

        $(document).on("click", function (event) {
            var $trigger = $("#category-menu-bar");
            if ($trigger !== event.target && !$trigger.has(event.target).length) {
                $("#click-category-menu").slideUp("fast");;
                $("#category-menu-bar-icon").removeClass('show');
            }
        });

        function updateNavCart(view, count) {
            $('.cart-count').html(count);
            $('#cart_items').html(view);
        }

        function removeFromCart(key) {
            $.post('{{ route('cart.removeFromCart') }}', {
                _token: AIZ.data.csrf,
                id: key
            }, function (data) {
                updateNavCart(data.nav_cart_view, data.cart_count);
                $('#cart-summary').html(data.cart_view);
                AIZ.plugins.notify('success', "{{ translate('Item has been removed from cart') }}");
                $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html()) - 1);
                window.location.reload();
            });
        }

        function showLoginModal() {
            $('#login_modal').modal();
        }

        function addToCompare(id) {
            $.post('{{ route('compare.addToCompare') }}', { _token: AIZ.data.csrf, id: id }, function (data) {
                $('#compare').html(data);
                AIZ.plugins.notify('success', "{{ translate('Item has been added to compare list') }}");
                $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html()) + 1);
            });
        }

        function addToWishList(id) {
            @if (Auth::check() && Auth::user()->user_type == 'customer')
                $.post('{{ route('wishlists.store') }}', { _token: AIZ.data.csrf, id: id }, function (data) {
                    if (data != 0) {
                        $('#wishlist').html(data);
                        AIZ.plugins.notify('success', "{{ translate('Item has been added to wishlist') }}");
                    }
                    else {
                        AIZ.plugins.notify('warning', "{{ translate('Please login first') }}");
                    }
                });
            @elseif(Auth::check() && Auth::user()->user_type != 'customer')
                AIZ.plugins.notify('warning', "{{ translate('Please Login as a customer to add products to the WishList.') }}");
            @else
                AIZ.plugins.notify('warning', "{{ translate('Please login first') }}");
            @endif
        }

        function showAddToCartModal(id) {
            if (!$('#modal-size').hasClass('modal-lg')) {
                $('#modal-size').addClass('modal-lg');
            }
            $('#addToCart-modal-body').html(null);
            $('#addToCart').modal();
            $('.c-preloader').show();
            $.post('{{ route(' ') }}', { _token: AIZ.data.csrf, id: id }, function (data) {
                $('.c-preloader').hide();
                $('#addToCart-modal-body').html(data);
                AIZ.plugins.slickCarousel();
                AIZ.plugins.zoom();
                AIZ.extra.plusMinus();
                getVariantPrice();
            });
        }

        $('#option-choice-form input').on('change', function () {
            getVariantPrice();
        });

        function getVariantPrice() {
            if ($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()) {
                $.ajax({
                    type: "POST",
                    url: '{{ route('products.variant_price') }}',
                    data: $('#option-choice-form').serializeArray(),
                    success: function (data) {
                        $('.product-gallery-thumb .carousel-box').each(function (i) {
                            if ($(this).data('variation') && data.variation == $(this).data('variation')) {
                                $('.product-gallery-thumb').slick('slickGoTo', i);
                            }
                        })

                        $('#option-choice-form #chosen_price_div').removeClass('d-none');
                        $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
                        $('#available-quantity').html(data.quantity);
                        $('.input-number').prop('max', data.max_limit);
                        if (parseInt(data.in_stock) == 0 && data.digital == 0) {
                            $('.buy-now').addClass('d-none');
                            $('.add-to-cart').addClass('d-none');
                            $('.out-of-stock').removeClass('d-none');
                        }
                        else {
                            $('.buy-now').removeClass('d-none');
                            $('.add-to-cart').removeClass('d-none');
                            $('.out-of-stock').addClass('d-none');
                        }

                        AIZ.extra.plusMinus();
                    }
                });
            }
        }

        function checkAddToCartValidity() {
            var names = {};
            $('#option-choice-form input:radio').each(function () { // find unique names
                names[$(this).attr('name')] = true;
            });
            var count = 0;
            $.each(names, function () { // then count them
                count++;
            });

            if ($('#option-choice-form input:radio:checked').length == count) {
                return true;
            }

            return false;
        }

        function addToCart() {

            @if (Auth::check() && Auth::user()->user_type != 'customer')
                AIZ.plugins.notify('warning', "{{ translate('Please Login as a customer to add products to the Cart.') }}");
                return false;
            @endif

            if (checkAddToCartValidity()) {
                $('#addToCart').modal();
                $('.c-preloader').show();
                $.ajax({
                    type: "POST",
                    url: '{{ route('cart.addToCart') }}',
                    data: $('#option-choice-form').serializeArray(),
                    success: function (data) {
                        $('#addToCart-modal-body').html(null);
                        $('.c-preloader').hide();
                        $('#modal-size').removeClass('modal-lg');
                        $('#addToCart-modal-body').html(data.modal_view);
                        AIZ.extra.plusMinus();
                        AIZ.plugins.slickCarousel();
                        updateNavCart(data.nav_cart_view, data.cart_count);
                        // window.location.reload();
                    }
                });
            }
            else {
                AIZ.plugins.notify('warning', "{{ translate('Please choose all the options') }}");
            }
        }

        function buyNow() {
            @if (Auth::check() && Auth::user()->user_type != 'customer')
                AIZ.plugins.notify('warning', "{{ translate('Please Login as a customer to add products to the Cart.') }}");
                return false;
            @endif

            if (checkAddToCartValidity()) {
                $('#addToCart-modal-body').html(null);
                $('#addToCart').modal();
                $('.c-preloader').show();
                $.ajax({
                    type: "POST",
                    url: '{{ route('cart.addToCart') }}',
                    data: $('#option-choice-form').serializeArray(),
                    success: function (data) {
                        if (data.status == 1) {
                            $('#addToCart-modal-body').html(data.modal_view);
                            updateNavCart(data.nav_cart_view, data.cart_count);
                            window.location.replace("{{ route('cart') }}");
                        }
                        else {
                            $('#addToCart-modal-body').html(null);
                            $('.c-preloader').hide();
                            $('#modal-size').removeClass('modal-lg');
                            $('#addToCart-modal-body').html(data.modal_view);
                        }
                    }
                });
            }
            else {
                AIZ.plugins.notify('warning', "{{ translate('Please choose all the options') }}");
            }
        }

        function bid_single_modal(bid_product_id, min_bid_amount) {
            @if (Auth::check() && (isCustomer() || isSeller()))
                var min_bid_amount_text = "({{ translate('Min Bid Amount: ') }}" + min_bid_amount + ")";
                $('#min_bid_amount').text(min_bid_amount_text);
                $('#bid_product_id').val(bid_product_id);
                $('#bid_amount').attr('min', min_bid_amount);
                $('#bid_for_product').modal('show');
            @elseif (Auth::check() && isAdmin())
                AIZ.plugins.notify('warning', '{{ translate('Sorry, Only customers & Sellers can Bid.') }}');
            @else
                $('#login_modal').modal('show');
            @endif
        }

        function clickToSlide(btn, id) {
            $('#' + id + ' .aiz-carousel').find('.' + btn).trigger('click');
            $('#' + id + ' .slide-arrow').removeClass('link-disable');
            var arrow = btn == 'slick-prev' ? 'arrow-prev' : 'arrow-next';
            if ($('#' + id + ' .aiz-carousel').find('.' + btn).hasClass('slick-disabled')) {
                $('#' + id).find('.' + arrow).addClass('link-disable');
            }
        }

        function goToView(params) {
            document.getElementById(params).scrollIntoView({ behavior: "smooth", block: "center" });
        }

        function copyCouponCode(code) {
            navigator.clipboard.writeText(code);
            AIZ.plugins.notify('success', "{{ translate('Coupon Code Copied') }}");
        }

        $(document).ready(function () {
            $('.cart-animate').animate({ margin: 0 }, "slow");

            $({ deg: 0 }).animate({ deg: 360 }, {
                duration: 2000,
                step: function (now) {
                    $('.cart-rotate').css({
                        transform: 'rotate(' + now + 'deg)'
                    });
                }
            });

            setTimeout(function () {
                $('.cart-ok').css({ fill: '#d43533' });
            }, 2000);

        });
    </script>

    @if (addon_is_activated('otp_system'))
        <script type="text/javascript">
            // Country Code
            var isPhoneShown = true,
                countryData = window.intlTelInputGlobals.getCountryData(),
                input = document.querySelector("#phone-code");

            for (var i = 0; i < countryData.length; i++) {
                var country = countryData[i];
                if (country.iso2 == 'bd') {
                    country.dialCode = '88';
                }
            }

            var iti = intlTelInput(input, {
                separateDialCode: true,
                utilsScript: "{{ static_asset('assets/js/intlTelutils.js') }}?1590403638580",
                onlyCountries: @php echo get_active_countries()-> pluck('code') @endphp,
                customPlaceholder: function (selectedCountryPlaceholder, selectedCountryData) {
                    if (selectedCountryData.iso2 == 'bd') {
                        return "01xxxxxxxxx";
                    }
                    return selectedCountryPlaceholder;
                }
                                                        });

            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);

            input.addEventListener("countrychange", function (e) {
                // var currentMask = e.currentTarget.placeholder;
                var country = iti.getSelectedCountryData();
                $('input[name=country_code]').val(country.dialCode);

            });

            function toggleEmailPhone(el) {
                if (isPhoneShown) {
                    $('.phone-form-group').addClass('d-none');
                    $('.email-form-group').removeClass('d-none');
                    $('input[name=phone]').val(null);
                    isPhoneShown = false;
                    $(el).html('*{{ translate('Use Phone Number Instead') }}');
                } else {
                    $('.phone-form-group').removeClass('d-none');
                    $('.email-form-group').addClass('d-none');
                    $('input[name=email]').val(null);
                    isPhoneShown = true;
                    $(el).html('<i>*{{ translate('Use Email Instead') }}</i>');
                }
            }
        </script>
    @endif

    <script>
        var acc = document.getElementsByClassName("aiz-accordion-heading");
        var i;
        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>

    <script>
        function showFloatingButtons() {
            document.querySelector('.floating-buttons-section').classList.toggle('show');;
        }
    </script>

    @if (env("DEMO_MODE") == "On")
        <script>
            var demoNav = document.querySelector('.aiz-demo-nav');
            var menuBtn = document.querySelector('.aiz-demo-nav-toggler');
            var lineOne = document.querySelector('.aiz-demo-nav-toggler .aiz-demo-nav-btn .line--1');
            var lineTwo = document.querySelector('.aiz-demo-nav-toggler .aiz-demo-nav-btn .line--2');
            var lineThree = document.querySelector('.aiz-demo-nav-toggler .aiz-demo-nav-btn .line--3');
            menuBtn.addEventListener('click', () => {
                toggleDemoNav();
            });

            function toggleDemoNav() {
                // demoNav.classList.toggle('show');
                demoNav.classList.toggle('shadow-none');
                lineOne.classList.toggle('line-cross');
                lineTwo.classList.toggle('line-fade-out');
                lineThree.classList.toggle('line-cross');
                if ($('.aiz-demo-nav-toggler').hasClass('show')) {
                    $('.aiz-demo-nav-toggler').removeClass('show');
                    demoHideOverlay();
                } else {
                    $('.aiz-demo-nav-toggler').addClass('show');
                    demoShowOverlay();
                }
            }

            $('.aiz-demos').click(function (e) {
                if (!e.target.closest('.aiz-demos .aiz-demo-content')) {
                    toggleDemoNav();
                }
            });

            function demoShowOverlay() {
                $('.top-banner').removeClass('z-1035').addClass('z-1');
                $('.top-navbar').removeClass('z-1035').addClass('z-1');
                $('header').removeClass('z-1020').addClass('z-1');
                $('.aiz-demos').addClass('show');
            }

            function demoHideOverlay(cls = null) {
                if ($('.aiz-demos').hasClass('show')) {
                    $('.aiz-demos').removeClass('show');
                    $('.top-banner').delay(800).removeClass('z-1').addClass('z-1035');
                    $('.top-navbar').delay(800).removeClass('z-1').addClass('z-1035');
                    $('header').delay(800).removeClass('z-1').addClass('z-1020');
                }
            }
        </script>
    @endif

    @yield('script')

    @php
        echo get_setting('footer_script');
    @endphp

</body>

</html>
