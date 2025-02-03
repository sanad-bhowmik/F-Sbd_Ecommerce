<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<!-- Top Bar Banner -->
@php
    $topbar_banner = get_setting('topbar_banner');
    $topbar_banner_medium = get_setting('topbar_banner_medium');
    $topbar_banner_small = get_setting('topbar_banner_small');
    $topbar_banner_asset = uploaded_asset($topbar_banner);
@endphp
@if ($topbar_banner != null)
    <div class="position-relative top-banner removable-session z-1035 d-none" data-key="top-banner" data-value="removed">
        <a href="{{ get_setting('topbar_banner_link') }}" class="d-block text-reset h-40px h-lg-60px">
            <!-- For Large device -->
            <img src="{{ $topbar_banner_asset }}" class="d-none d-xl-block img-fit h-100"
                alt="{{ translate('topbar_banner') }}">
            <!-- For Medium device -->
            <img src="{{ $topbar_banner_medium != null ? uploaded_asset($topbar_banner_medium) : $topbar_banner_asset }}"
                class="d-none d-md-block d-xl-none img-fit h-100" alt="{{ translate('topbar_banner') }}">
            <!-- For Small device -->
            <img src="{{ $topbar_banner_small != null ? uploaded_asset($topbar_banner_small) : $topbar_banner_asset }}"
                class="d-md-none img-fit h-100" alt="{{ translate('topbar_banner') }}">
        </a>
        <button class="btn text-white h-100 absolute-top-right set-session" data-key="top-banner" data-value="removed"
            data-toggle="remove-parent" data-parent=".top-banner">
            <i class="la la-close la-2x"></i>
        </button>
    </div>
@endif

<style>
    @media (min-width: 320px) and (max-width: 768px) {

        .top-navbar {
            display: none !important;
        }
    }
</style>
<div class="top-navbar  z-1035 h-35px h-sm-auto" style="background-color:black;padding: 5px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col">
                <ul class="list-inline mb-0 d-flex align-items-center mt-2">
                    <!-- Email -->
                    <li class="list-inline-item mr-3 ">
                        <a href="mailto:support@banglashoppers.com" class="text-white fs-12 d-flex align-items-center"
                            style="font-weight: 600;">
                            <img src="https://celcombazar.com/photo/gmail.png" alt="Email Icon" class="mr-2"
                                style="height: 16px;">
                            support@banglashoppers.com
                        </a>
                    </li>
                    <!-- Hotline -->
                    <li class="list-inline-item">
                        <a href="tel:09666787787" class="text-white fs-12 d-flex align-items-center"
                            style="font-weight: 600;">
                            <img src="https://celcombazar.com/photo/headset.png" alt="Email Icon" class="mr-2"
                                style="height: 16px;">
                            01897608888
                        </a>
                    </li>
                </ul>

            </div>

            <div class="col-6 text-right d-none d-lg-block">
                <ul class="list-inline mb-0 h-100 d-flex justify-content-end align-items-center">
                    <!--@if (get_setting('vendor_system_activation') == 1)
-->
                    <!-- Become a Seller -->
                    <!--    <li class="list-inline-item mr-0 pl-0 py-2">-->
                    <!--        <a href="{{ route('shops.create') }}"-->
                    <!--            class="text-secondary fs-12 pr-3 d-inline-block border-width-2 border-right">{{ translate('Become a Seller !') }}</a>-->
                    <!--    </li>-->
                    <!-- Seller Login -->
                    <!--    <li class="list-inline-item mr-0 pl-0 py-2">-->
                    <!--        <a href="{{ route('seller.login') }}"-->
                    <!--            class="text-secondary fs-12 pl-3 d-inline-block ">{{ translate('Login to Seller') }}</a>-->
                    <!--    </li>-->
                    <!--
@endif-->
                    @if (get_setting('helpline_number'))
                        <li class="list-inline-item ml-3">
                            <span class=" fs-12 " style="color:white;">Contact Us :</span>
                        </li>
                        <li class="list-inline-item ml-3">
                            <!-- Facebook Icon -->
                            <a href="https://www.facebook.com" target="_blank" class="text-decoration-none">
                                <i class="fab fa-facebook-f" style="font-size: 15px; color: white;"></i>
                            </a>
                        </li>
                        <li class="list-inline-item ml-3">
                            <!-- Twitter Icon -->
                            <a href="https://www.twitter.com" target="_blank" class="text-decoration-none">
                                <i class="fab fa-twitter" style="font-size: 15px; color: white;"></i>
                            </a>
                        </li>
                        <li class="list-inline-item ml-3">
                            <!-- YouTube Icon -->
                            <a href="https://www.youtube.com" target="_blank" class="text-decoration-none">
                                <i class="fab fa-youtube" style="font-size: 15px; color: white;"></i>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>
<style>
    @media (max-width: 768px) {

        /* Adjust max-width as needed for your breakpoint */
        #mobile-style {
            margin-top: -2vh;
        }
    }
</style>


<header class="@if (get_setting('header_stikcy') == 'on') sticky-top @endif z-1020 bg-white">
    <!-- Search Bar -->
    <div class="position-relative logo-bar-area border-bottom border-md-nonea z-1025">
        <div class="container">
            <div class="d-flex align-items-center" id="mobile-style">
                <!-- top menu sidebar button -->
                <button type="button"style="display:none;" class="btn d-lg-none mr-3 mr-sm-4 p-0 active"
                    data-toggle="class-toggle" data-target=".aiz-top-menu-sidebar">
                    <svg id="Component_43_1" data-name="Component 43 – 1" xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" viewBox="0 0 16 16">
                        <rect id="Rectangle_19062" data-name="Rectangle 19062" width="16" height="2"
                            transform="translate(0 7)" fill="#919199" />
                        <rect id="Rectangle_19063" data-name="Rectangle 19063" width="16" height="2"
                            fill="#919199" />
                        <rect id="Rectangle_19064" data-name="Rectangle 19064" width="16" height="2"
                            transform="translate(0 14)" fill="#919199" />
                    </svg>

                </button>
                <!-- Header Logo -->
                <div class="col-auto pl-0 pr-3 d-flex align-items-center flex-column position-relative"style="margin-left: -18px;">
                    <!-- Logo Section -->
                    <a class="d-block py-20px mr-3 ml-0" href="{{ route('home') }}">
                        @php
                            $header_logo = get_setting('header_logo');
                        @endphp
                        @if ($header_logo != null)
                            <img src="{{ uploaded_asset($header_logo) }}" alt="{{ env('APP_NAME') }}"
                                class="mw-100 h-30px h-md-40px" height="40">
                        @else
                            <img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}"
                                class="mw-100 h-30px h-md-40px" height="40">
                        @endif
                    </a>

                    <!-- Dropdown Trigger -->
                    <div class="dropdown-trigger" onclick="">
                        <button type="button" class="btn d-lg-none mr-3 mr-sm-4 p-0 active"
                            data-toggle="class-toggle" data-target=".aiz-top-menu-sidebar">
                            <span class="text-muted cursor-pointer">
                                Deliver To Choose A...
                                <svg fill="#000000" height="10px" width="10px" version="1.1" id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 330 330" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path id="XMLID_222_"
                                            d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001 c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213 C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606 C255,161.018,253.42,157.202,250.606,154.389z">
                                        </path>
                                    </g>
                                </svg>
                            </span>

                        </button>
                    </div>
<style>
/*    .sticky-search {*/
/*    position: fixed;*/
/*    top: 5;*/
/*    left: 0;*/
/*    width: 100%;*/
/*    z-index: 9999;*/
/*    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);*/
/*    transition: top 0.3s ease-in-out;*/
/*}*/

</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    let searchBar = document.querySelector(".search-bar"); // Target your search bar class
    let offset = searchBar.offsetTop;

    window.addEventListener("scroll", function () {
        if (window.scrollY > offset) {
            searchBar.classList.add("sticky-search");
        } else {
            searchBar.classList.remove("sticky-search");
        }
    });
});

</script>
                    <!-- Search Icon for small device -->


                    <!-- Search field -->
                </div>
                <style>
                    @media (min-width: 320px) and (max-width: 767px) {
                        .dropdown-trigger {
                            margin-left: -1px;
                            margin-top: -13px;
                            color: black;
                            margin-bottom: 10px;
                        }
                    }

                    @media (min-width: 768px) and (max-width: 1199px) {
                        .dropdown-trigger {
                            display: none !important;
                            /* Ensures it is hidden */
                        }
                    }

                    @media (min-width: 1200px) {
                        .dropdown-trigger {
                            display: none !important;
                            /* Hides for big screens */
                        }
                    }
                </style>
                <script>
                    function toggleDropdown() {
                        const dropdown = document.getElementById('dropdownMenu');
                        const isVisible = dropdown.style.display === 'block';
                        dropdown.style.display = isVisible ? 'none' : 'block';
                    }

                    // Close dropdown when clicking outside
                    document.addEventListener('click', function(event) {
                        const dropdown = document.getElementById('dropdownMenu');
                        const trigger = document.querySelector('.dropdown-trigger');

                        if (!dropdown.contains(event.target) && !trigger.contains(event.target)) {
                            dropdown.style.display = 'none';
                        }
                    });
                </script>


                     <div class="flex-grow-1 front-header-search d-flex align-items-center bg-white mx-xl-5">
                        <div class="position-relative flex-grow-1 px-3 px-lg-0">
                            <form action="{{ route('search') }}" method="GET" class="stop-propagation">
                                <div class="d-flex position-relative align-items-center">
                                    <div class="d-lg-none" data-toggle="class-toggle"
                                        data-target=".front-header-search">
                                        <button class="btn px-2" type="button"><i
                                                class="la la-2x la-long-arrow-left"></i></button>
                                    </div>
                                    <div class="search-input-box">
                                        <input type="text"
                                            class="border border-soft-light form-control fs-14 hov-animate-outline"
                                            id="search" name="keyword"
                                            @isset($query)
                                            value="{{ $query }}"
                                        @endisset
                                            placeholder="{{ translate('I am shopping for...') }}" autocomplete="off">

                                        <svg id="Group_723" data-name="Group 723" xmlns="http://www.w3.org/2000/svg"
                                            width="20.001" height="20" viewBox="0 0 20.001 20">
                                            <path id="Path_3090" data-name="Path 3090"
                                                d="M9.847,17.839a7.993,7.993,0,1,1,7.993-7.993A8,8,0,0,1,9.847,17.839Zm0-14.387a6.394,6.394,0,1,0,6.394,6.394A6.4,6.4,0,0,0,9.847,3.453Z"
                                                transform="translate(-1.854 -1.854)" fill="#b5b5bf" />
                                            <path id="Path_3091" data-name="Path 3091"
                                                d="M24.4,25.2a.8.8,0,0,1-.565-.234l-6.15-6.15a.8.8,0,0,1,1.13-1.13l6.15,6.15A.8.8,0,0,1,24.4,25.2Z"
                                                transform="translate(-5.2 -5.2)" fill="#b5b5bf" />
                                        </svg>
                                    </div>
                                </div>
                            </form>
                            <div class="typed-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100"
                                style="min-height: 200px">
                                <div class="search-preloader absolute-top-center">
                                    <div class="dot-loader">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="search-nothing d-none p-3 text-center fs-16">

                                </div>
                                <div id="search-content" class="text-left">

                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Search Icon for small device -->
                <div class="d-lg-none ml-auto mr-0 d-flex">
                    <a class="p-2 d-block text-reset ml-2 mt-3" href="https://celcombazar.com/another-page">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                            viewBox="0 0 50 50">
                            <path
                                d="M 25 2 C 12.300781 2 2 11.601563 2 23.5 C 2 29.800781 4.898438 35.699219 10 39.800781 L 10 48.601563 L 18.601563 44.101563 C 20.699219 44.699219 22.800781 44.898438 25 44.898438 C 37.699219 44.898438 48 35.300781 48 23.398438 C 48 11.601563 37.699219 2 25 2 Z M 27.300781 30.601563 L 21.5 24.398438 L 10.699219 30.5 L 22.699219 17.800781 L 28.601563 23.699219 L 39.101563 17.800781 Z">
                            </path>
                        </svg>
                    </a>
                    <!-- Account -->
                    <div class="col">
                        @if (Auth::check())
                            @if (isAdmin())
                                <a href="{{ route('admin.dashboard') }}"
                                    class="text-secondary d-block text-center pb-2 pt-3">
                                    <span class="d-block mx-auto">
                                        @if ($user->avatar_original != null)
                                            <img src="{{ $user_avatar }}" alt="{{ translate('avatar') }}"
                                                class="rounded-circle size-20px">
                                        @else
                                            <img src="{{ static_asset('assets/img/avatar-place.png') }}"
                                                alt="{{ translate('avatar') }}" class="rounded-circle size-20px">
                                        @endif
                                    </span>
                                    <span
                                        class="d-block mt-1 fs-10 fw-600 text-reset">{{ translate('My Account') }}</span>
                                </a>
                            @elseif(isSeller())
                                <a href="{{ route('dashboard') }}"
                                    class="text-secondary d-block text-center pb-2 pt-3">
                                    <span class="d-block mx-auto">
                                        @if ($user->avatar_original != null)
                                            <img src="{{ $user_avatar }}" alt="{{ translate('avatar') }}"
                                                class="rounded-circle size-20px">
                                        @else
                                            <img src="{{ static_asset('assets/img/avatar-place.png') }}"
                                                alt="{{ translate('avatar') }}" class="rounded-circle size-20px">
                                        @endif
                                    </span>
                                    <span
                                        class="d-block mt-1 fs-10 fw-600 text-reset">{{ translate('My Account') }}</span>
                                </a>
                            @else
                                <a href="javascript:void(0)"
                                    class="text-secondary d-block text-center pb-2 pt-3 mobile-side-nav-thumb"
                                    data-toggle="class-toggle" data-backdrop="static"
                                    data-target=".aiz-mobile-side-nav">
                                    <span class="d-block mx-auto">
                                        @if ($user->avatar_original != null)
                                            <img src="{{ $user_avatar }}" alt="{{ translate('avatar') }}"
                                                class="rounded-circle size-20px">
                                        @else
                                            <img src="{{ static_asset('assets/img/avatar-place.png') }}"
                                                alt="{{ translate('avatar') }}" class="rounded-circle size-20px">
                                        @endif
                                    </span>
                                    <span
                                        class="d-block mt-1 fs-10 fw-600 text-reset">{{ translate('My Account') }}</span>
                                </a>
                            @endif
                        @else
                            <a href="javascript:void(0);"data-toggle="modal" data-target="#login_modal"
                                class="text-secondary d-block text-center pb-2 pt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16">
                                    <g id="Group_8094" data-name="Group 8094" transform="translate(3176 -602)">
                                        <path id="Path_2924" data-name="Path 2924"
                                            d="M331.144,0a4,4,0,1,0,4,4,4,4,0,0,0-4-4m0,7a3,3,0,1,1,3-3,3,3,0,0,1-3,3"
                                            transform="translate(-3499.144 602)" fill="#b5b5bf" />
                                        <path id="Path_2925" data-name="Path 2925"
                                            d="M332.144,20h-10a3,3,0,0,0,0,6h10a3,3,0,0,0,0-6m0,5h-10a2,2,0,0,1,0-4h10a2,2,0,0,1,0,4"
                                            transform="translate(-3495.144 592)" fill="#b5b5bf" />
                                    </g>
                                </svg>
                                <span
                                    class="d-block mt-1 fs-10 fw-600 text-reset">{{ translate('My Account') }}</span>
                            </a>
                        @endif
                    </div>
                    <!-- Add another icon -->

                </div>



                @if (!isAdmin())

                    <div class=" d-xl-flex align-items-center justify-content-end ml-auto mr-0">
                        <!-- Cart -->
                        <div class="d-flex align-items-center ml-5 mr-3">
                            <div class="nav-cart-box dropdown h-100" id="cart_items" style="width: max-content;">
                                @include('frontend.' . get_setting('homepage_select') . '.partials.cart')
                            </div>
                        </div>
                        <!-- Notifications -->
                        <!-- Notifications -->
                        <ul class="list-inline mb-0 h-100 d-none d-xl-flex justify-content-end align-items-center">
                            <li class="list-inline-item ml-3 mr-3 pr-3 pl-0 dropdown">
                                <a class="dropdown-toggle no-arrow text-secondary fs-12" data-toggle="dropdown"
                                    href="javascript:void(0);" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="">
                                        <span class="position-relative d-inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14.668" height="16"
                                                viewBox="0 0 14.668 16">
                                                <path id="_26._Notification" data-name="26. Notification"
                                                    d="M8.333,16A3.34,3.34,0,0,0,11,14.667H5.666A3.34,3.34,0,0,0,8.333,16ZM15.06,9.78a2.457,2.457,0,0,1-.727-1.747V6a6,6,0,1,0-12,0V8.033A2.457,2.457,0,0,1,1.606,9.78,2.083,2.083,0,0,0,3.08,13.333H13.586A2.083,2.083,0,0,0,15.06,9.78Z"
                                                    transform="translate(-0.999)" fill="#91919b" />
                                            </svg>
                                            @if (Auth::check() && count($user->unreadNotifications) > 0)
                                                <span
                                                    class="badge badge-primary badge-inline badge-pill absolute-top-right--10px">{{ count($user->unreadNotifications) }}</span>
                                            @endif
                                        </span>
                                </a>

                                @auth
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg py-0 rounded-0">
                                        <div class="p-3 bg-light border-bottom">
                                            <h6 class="mb-0">{{ translate('Notifications') }}</h6>
                                        </div>
                                        <div class="px-3 c-scrollbar-light overflow-auto " style="max-height:300px;">
                                            <ul class="list-group list-group-flush">
                                                @forelse($user->unreadNotifications as $notification)
                                                    <li class="list-group-item notification-item"
                                                        id="notification-{{ $notification->id }}">
                                                        @if ($notification->type == 'App\Notifications\OrderNotification')
                                                            @if ($user->user_type == 'customer')
                                                                <a href="{{ route('purchase_history.details', encrypt($notification->data['order_id'])) }}"
                                                                    class="text-secondary fs-12 notification-link"
                                                                    data-id="{{ $notification->id }}">
                                                                    <span class="ml-2">
                                                                        {{ translate('Order code: ') }}
                                                                        {{ $notification->data['order_code'] }}
                                                                        {{ translate('has been ' . ucfirst(str_replace('_', ' ', $notification->data['status']))) }}
                                                                    </span>
                                                                </a>
                                                            @elseif ($user->user_type == 'seller')
                                                                <a href="{{ route('seller.orders.show', encrypt($notification->data['order_id'])) }}"
                                                                    class="text-secondary fs-12 notification-link"
                                                                    data-id="{{ $notification->id }}">
                                                                    <span class="ml-2">
                                                                        {{ translate('Order code: ') }}
                                                                        {{ $notification->data['order_code'] }}
                                                                        {{ translate('has been ' . ucfirst(str_replace('_', ' ', $notification->data['status']))) }}
                                                                    </span>
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </li>
                                                @empty
                                                    <li class="list-group-item">
                                                        <div class="py-4 text-center fs-16">
                                                            {{ translate('No notification found') }}
                                                        </div>
                                                    </li>
                                                @endforelse
                                            </ul>
                                        </div>
                                        <div class="text-center border-top">
                                            <a href="{{ route('all-notifications') }}"
                                                class="text-secondary fs-12 d-block py-2">
                                                {{ translate('View All Notifications') }}
                                            </a>
                                        </div>
                                    </div>
                                @endauth
                            </li>
                        </ul>


                        <!-- JavaScript to periodically fetch and update the count -->
                        <script>
                            // Function to update the wishlist count dynamically
                            function updateWishlistCount() {
                                // Send a request to the Laravel route to fetch the count
                                fetch('/wishlist/count')
                                    .then(response => response.json())
                                    .then(data => {
                                        // Update the displayed wishlist count
                                        document.getElementById('wishlist-count').textContent = data.count;
                                    })
                                    .catch(error => console.error('Error fetching wishlist count:', error));
                            }

                            // Update the count every second (1000 milliseconds)
                            setInterval(updateWishlistCount, 1000);
                        </script>




                        <!-- Add the following script to handle marking notifications as read -->
                        <script>
                            // Attach an event listener to each notification link
                            document.querySelectorAll('.notification-link').forEach(notificationLink => {
                                notificationLink.addEventListener('click', function(event) {
                                    // Prevent the default action to make the AJAX request first
                                    event.preventDefault();

                                    const notificationId = this.getAttribute('data-id');
                                    const notificationElement = document.getElementById('notification-' + notificationId);

                                    // Send AJAX request to mark the notification as read
                                    fetch('/notifications/' + notificationId + '/read', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            },
                                            body: JSON.stringify({
                                                id: notificationId
                                            })
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.success) {
                                                // Mark the notification as read (remove it from the list)
                                                notificationElement.style.display = 'none';

                                                // Update the unread notifications count
                                                const unreadCountElement = document.querySelector('.badge');
                                                if (unreadCountElement) {
                                                    let unreadCount = parseInt(unreadCountElement.innerText);
                                                    unreadCountElement.innerText = unreadCount - 1;
                                                }
                                            }
                                        })
                                        .catch(error => {
                                            console.error('Error marking notification as read:', error);
                                        });

                                    // Optionally, redirect to the link destination if needed
                                    window.location.href = this.href;
                                });
                            });
                        </script>

                @endif
                @auth
                    <span
                        class="d-flex align-items-center nav-user-info py-20px @if (isAdmin()) ml-5 @endif"
                        id="nav-user-info">
                        <!-- Image -->
                        <span class="size-40px rounded-circle overflow-hidden border border-transparent nav-user-img">
                            @if ($user->avatar_original != null)
                                <img src="{{ $user_avatar }}" class="img-fit h-100" alt="{{ translate('avatar') }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                            @else
                                <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="image"
                                    alt="{{ translate('avatar') }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                            @endif
                        </span>
                        <!-- Name -->
                        <h4 class="h5 fs-14 fw-700 text-dark ml-2 mb-0">
                            {{ substr($user->phone, 0, 5) . '*****' }}
                        </h4>

                    </span>
                @else
                    <div class="nav-user-info text-dark d-flex">
                        <!-- Hello Guest Section -->
                        <div class="mt-2 mr-2">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M14 19.2857L15.8 21L20 17M4 21C4 17.134 7.13401 14 11 14C12.4872 14 13.8662 14.4638 15 15.2547M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z"
                                        stroke="#91919b" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </div>
                        <div>
                            <div class="d-flex align-items-center ">
                                <span class="fs-12 text-dark">Hello Guest!</span>
                            </div>
                            <!-- Login / Register Section -->
                            <div class="d-flex">
                                <!-- Login -->
                                <a href="javascript:void(0);"
                                    class="text-dark opacity-60 hov-opacity-100 hov-text-primary fs-14 d-inline-block b pr-2"
                                    data-toggle="modal" data-target="#login_modal">
                                    Login
                                </a>
                                <span class="opacity-60">/</span>
                                <!-- Registration -->
                                <a href="javascript:void(0);"
                                    class="text-dark opacity-60 hov-opacity-100 hov-text-primary fs-14 d-inline-block pl-2"
                                    data-toggle="modal" data-target="#registration_modal">
                                    Register
                                </a>
                            </div>
                        </div>
                    </div>


                @endauth
            </div>
            <div class="d-none d-lg-block mr-3" style="margin-left: 36px;">

            </div>
        </div>
    </div>

    <!-- Loged in user Menus -->
    <div class="hover-user-top-menu position-absolute top-100 left-0 right-0 z-3">
        <div class="container">
            <div class="position-static float-right">
                <div class="aiz-user-top-menu bg-white rounded-0 border-top shadow-sm" style="width:220px;">
                    <ul class="list-unstyled no-scrollbar mb-0 text-left">
                        @if (isAdmin())
                            <li class="user-top-nav-element border border-top-0" data-id="1">
                                <a href="{{ route('admin.dashboard') }}"
                                    class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16">
                                        <path id="Path_2916" data-name="Path 2916"
                                            d="M15.3,5.4,9.561.481A2,2,0,0,0,8.26,0H7.74a2,2,0,0,0-1.3.481L.7,5.4A2,2,0,0,0,0,6.92V14a2,2,0,0,0,2,2H14a2,2,0,0,0,2-2V6.92A2,2,0,0,0,15.3,5.4M10,15H6V9A1,1,0,0,1,7,8H9a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H11V9A2,2,0,0,0,9,7H7A2,2,0,0,0,5,9v6H2a1,1,0,0,1-1-1V6.92a1,1,0,0,1,.349-.76l5.74-4.92A1,1,0,0,1,7.74,1h.52a1,1,0,0,1,.651.24l5.74,4.92A1,1,0,0,1,15,6.92Z"
                                            fill="#b5b5c0" />
                                    </svg>
                                    <span
                                        class="user-top-menu-name has-transition ml-3">{{ translate('Dashboard') }}</span>
                                </a>
                            </li>
                        @else
                            <li class="user-top-nav-element border border-top-0" data-id="1">
                                <a href="{{ route('dashboard') }}"
                                    class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16">
                                        <path id="Path_2916" data-name="Path 2916"
                                            d="M15.3,5.4,9.561.481A2,2,0,0,0,8.26,0H7.74a2,2,0,0,0-1.3.481L.7,5.4A2,2,0,0,0,0,6.92V14a2,2,0,0,0,2,2H14a2,2,0,0,0,2-2V6.92A2,2,0,0,0,15.3,5.4M10,15H6V9A1,1,0,0,1,7,8H9a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H11V9A2,2,0,0,0,9,7H7A2,2,0,0,0,5,9v6H2a1,1,0,0,1-1-1V6.92a1,1,0,0,1,.349-.76l5.74-4.92A1,1,0,0,1,7.74,1h.52a1,1,0,0,1,.651.24l5.74,4.92A1,1,0,0,1,15,6.92Z"
                                            fill="#b5b5c0" />
                                    </svg>
                                    <span
                                        class="user-top-menu-name has-transition ml-3">{{ translate('Dashboard') }}</span>
                                </a>
                            </li>
                        @endif

                        @if (isCustomer())
                            <li class="user-top-nav-element border border-top-0" data-id="1">
                                <a href="{{ route('purchase_history.index') }}"
                                    class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16">
                                        <g id="Group_25261" data-name="Group 25261"
                                            transform="translate(-27.466 -542.963)">
                                            <path id="Path_2953" data-name="Path 2953"
                                                d="M14.5,5.963h-4a1.5,1.5,0,0,0,0,3h4a1.5,1.5,0,0,0,0-3m0,2h-4a.5.5,0,0,1,0-1h4a.5.5,0,0,1,0,1"
                                                transform="translate(22.966 537)" fill="#b5b5bf" />
                                            <path id="Path_2954" data-name="Path 2954"
                                                d="M12.991,8.963a.5.5,0,0,1,0-1H13.5a2.5,2.5,0,0,1,2.5,2.5v10a2.5,2.5,0,0,1-2.5,2.5H2.5a2.5,2.5,0,0,1-2.5-2.5v-10a2.5,2.5,0,0,1,2.5-2.5h.509a.5.5,0,0,1,0,1H2.5a1.5,1.5,0,0,0-1.5,1.5v10a1.5,1.5,0,0,0,1.5,1.5h11a1.5,1.5,0,0,0,1.5-1.5v-10a1.5,1.5,0,0,0-1.5-1.5Z"
                                                transform="translate(27.466 536)" fill="#b5b5bf" />
                                            <path id="Path_2955" data-name="Path 2955"
                                                d="M7.5,15.963h1a.5.5,0,0,1,.5.5v1a.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5v-1a.5.5,0,0,1,.5-.5"
                                                transform="translate(23.966 532)" fill="#b5b5bf" />
                                            <path id="Path_2956" data-name="Path 2956"
                                                d="M7.5,21.963h1a.5.5,0,0,1,.5.5v1a.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5v-1a.5.5,0,0,1,.5-.5"
                                                transform="translate(23.966 529)" fill="#b5b5bf" />
                                            <path id="Path_2957" data-name="Path 2957"
                                                d="M7.5,27.963h1a.5.5,0,0,1,.5.5v1a.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5v-1a.5.5,0,0,1,.5-.5"
                                                transform="translate(23.966 526)" fill="#b5b5bf" />
                                            <path id="Path_2958" data-name="Path 2958"
                                                d="M13.5,16.963h5a.5.5,0,0,1,0,1h-5a.5.5,0,0,1,0-1"
                                                transform="translate(20.966 531.5)" fill="#b5b5bf" />
                                            <path id="Path_2959" data-name="Path 2959"
                                                d="M13.5,22.963h5a.5.5,0,0,1,0,1h-5a.5.5,0,0,1,0-1"
                                                transform="translate(20.966 528.5)" fill="#b5b5bf" />
                                            <path id="Path_2960" data-name="Path 2960"
                                                d="M13.5,28.963h5a.5.5,0,0,1,0,1h-5a.5.5,0,0,1,0-1"
                                                transform="translate(20.966 525.5)" fill="#b5b5bf" />
                                        </g>
                                    </svg>
                                    <span
                                        class="user-top-menu-name has-transition ml-3">{{ translate('Purchase History') }}</span>
                                </a>
                            </li>
                            <!--<li class="user-top-nav-element border border-top-0" data-id="1">-->
                            <!--    <a href="{{ route('digital_purchase_history.index') }}"-->
                            <!--        class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">-->
                            <!--        <svg xmlns="http://www.w3.org/2000/svg" width="16.001" height="16"-->
                            <!--            viewBox="0 0 16.001 16">-->
                            <!--            <g id="Group_25262" data-name="Group 25262"-->
                            <!--                transform="translate(-1388.154 -562.604)">-->
                            <!--                <path id="Path_2963" data-name="Path 2963"-->
                            <!--                    d="M77.864,98.69V92.1a.5.5,0,1,0-1,0V98.69l-1.437-1.437a.5.5,0,0,0-.707.707l1.851,1.852a1,1,0,0,0,.707.293h.172a1,1,0,0,0,.707-.293l1.851-1.852a.5.5,0,0,0-.7-.713Z"-->
                            <!--                    transform="translate(1318.79 478.5)" fill="#b5b5bf" />-->
                            <!--                <path id="Path_2964" data-name="Path 2964"-->
                            <!--                    d="M67.155,88.6a3,3,0,0,1-.474-5.963q-.009-.089-.015-.179a5.5,5.5,0,0,1,10.977-.718,3.5,3.5,0,0,1-.989,6.859h-1.5a.5.5,0,0,1,0-1l1.5,0a2.5,2.5,0,0,0,.417-4.967.5.5,0,0,1-.417-.5,4.5,4.5,0,1,0-8.908.866.512.512,0,0,1,.009.121.5.5,0,0,1-.52.479,2,2,0,1,0-.162,4l.081,0h2a.5.5,0,0,1,0,1Z"-->
                            <!--                    transform="translate(1324 486)" fill="#b5b5bf" />-->
                            <!--            </g>-->
                            <!--        </svg>-->
                            <!--        <span-->
                            <!--            class="user-top-menu-name has-transition ml-3">{{ translate('Downloads') }}</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            @if (get_setting('conversation_system') == 1)
                                <li class="user-top-nav-element border border-top-0" data-id="1">
                                    <a href="{{ route('conversations.index') }}"
                                        class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16">
                                            <g id="Group_25263" data-name="Group 25263"
                                                transform="translate(1053.151 256.688)">
                                                <path id="Path_3012" data-name="Path 3012"
                                                    d="M134.849,88.312h-8a2,2,0,0,0-2,2v5a2,2,0,0,0,2,2v3l2.4-3h5.6a2,2,0,0,0,2-2v-5a2,2,0,0,0-2-2m1,7a1,1,0,0,1-1,1h-8a1,1,0,0,1-1-1v-5a1,1,0,0,1,1-1h8a1,1,0,0,1,1,1Z"
                                                    transform="translate(-1178 -341)" fill="#b5b5bf" />
                                                <path id="Path_3013" data-name="Path 3013"
                                                    d="M134.849,81.312h8a1,1,0,0,1,1,1v5a1,1,0,0,1-1,1h-.5a.5.5,0,0,0,0,1h.5a2,2,0,0,0,2-2v-5a2,2,0,0,0-2-2h-8a2,2,0,0,0-2,2v.5a.5.5,0,0,0,1,0v-.5a1,1,0,0,1,1-1"
                                                    transform="translate(-1182 -337)" fill="#b5b5bf" />
                                                <path id="Path_3014" data-name="Path 3014"
                                                    d="M131.349,93.312h5a.5.5,0,0,1,0,1h-5a.5.5,0,0,1,0-1"
                                                    transform="translate(-1181 -343.5)" fill="#b5b5bf" />
                                                <path id="Path_3015" data-name="Path 3015"
                                                    d="M131.349,99.312h5a.5.5,0,1,1,0,1h-5a.5.5,0,1,1,0-1"
                                                    transform="translate(-1181 -346.5)" fill="#b5b5bf" />
                                            </g>
                                        </svg>
                                        <span
                                            class="user-top-menu-name has-transition ml-3">{{ translate('Conversations') }}</span>
                                    </a>
                                </li>
                            @endif

                            @if (get_setting('wallet_system') == 1)
                                <li class="user-top-nav-element border border-top-0" data-id="1">
                                    <a href="{{ route('wallet.index') }}"
                                        class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16"
                                            viewBox="0 0 16 16">
                                            <defs>
                                                <clipPath id="clip-path1">
                                                    <rect id="Rectangle_1386" data-name="Rectangle 1386"
                                                        width="16" height="16" fill="#b5b5bf" />
                                                </clipPath>
                                            </defs>
                                            <g id="Group_8102" data-name="Group 8102" clip-path="url(#clip-path1)">
                                                <path id="Path_2936" data-name="Path 2936"
                                                    d="M13.5,4H13V2.5A2.5,2.5,0,0,0,10.5,0h-8A2.5,2.5,0,0,0,0,2.5v11A2.5,2.5,0,0,0,2.5,16h11A2.5,2.5,0,0,0,16,13.5v-7A2.5,2.5,0,0,0,13.5,4M2.5,1h8A1.5,1.5,0,0,1,12,2.5V4H2.5a1.5,1.5,0,0,1,0-3M15,11H10a1,1,0,0,1,0-2h5Zm0-3H10a2,2,0,0,0,0,4h5v1.5A1.5,1.5,0,0,1,13.5,15H2.5A1.5,1.5,0,0,1,1,13.5v-9A2.5,2.5,0,0,0,2.5,5h11A1.5,1.5,0,0,1,15,6.5Z"
                                                    fill="#b5b5bf" />
                                            </g>
                                        </svg>
                                        <span
                                            class="user-top-menu-name has-transition ml-3">{{ translate('My Wallet') }}</span>
                                    </a>
                                </li>
                            @endif
                            <li class="user-top-nav-element border border-top-0" data-id="1">
                                <a href="{{ route('support_ticket.index') }}"
                                    class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16.001"
                                        viewBox="0 0 16 16.001">
                                        <g id="Group_25259" data-name="Group 25259"
                                            transform="translate(-316 -1066)">
                                            <path id="Subtraction_184" data-name="Subtraction 184"
                                                d="M16427.109,902H16420a8.015,8.015,0,1,1,8-8,8.278,8.278,0,0,1-1.422,4.535l1.244,2.132a.81.81,0,0,1,0,.891A.791.791,0,0,1,16427.109,902ZM16420,887a7,7,0,1,0,0,14h6.283c.275,0,.414,0,.549-.111s-.209-.574-.34-.748l0,0-.018-.022-1.064-1.6A6.829,6.829,0,0,0,16427,894a6.964,6.964,0,0,0-7-7Z"
                                                transform="translate(-16096 180)" fill="#b5b5bf" />
                                            <path id="Union_12" data-name="Union 12"
                                                d="M16414,895a1,1,0,1,1,1,1A1,1,0,0,1,16414,895Zm.5-2.5V891h.5a2,2,0,1,0-2-2h-1a3,3,0,1,1,3.5,2.958v.54a.5.5,0,1,1-1,0Zm-2.5-3.5h1a.5.5,0,1,1-1,0Z"
                                                transform="translate(-16090.998 183.001)" fill="#b5b5bf" />
                                        </g>
                                    </svg>
                                    <span
                                        class="user-top-menu-name has-transition ml-3">{{ translate('Support Ticket') }}</span>
                                </a>
                            </li>
                        @endif
                        <li class="user-top-nav-element border border-top-0" data-id="1">
                            <a href="{{ route('logout') }}"
                                class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15.999"
                                    viewBox="0 0 16 15.999">
                                    <g id="Group_25503" data-name="Group 25503" transform="translate(-24.002 -377)">
                                        <g id="Group_25265" data-name="Group 25265"
                                            transform="translate(-216.534 -160)">
                                            <path id="Subtraction_192" data-name="Subtraction 192"
                                                d="M12052.535,2920a8,8,0,0,1-4.569-14.567l.721.72a7,7,0,1,0,7.7,0l.721-.72a8,8,0,0,1-4.567,14.567Z"
                                                transform="translate(-11803.999 -2367)" fill="#d43533" />
                                        </g>
                                        <rect id="Rectangle_19022" data-name="Rectangle 19022" width="1"
                                            height="8" rx="0.5" transform="translate(31.5 377)"
                                            fill="#d43533" />
                                    </g>
                                </svg>
                                <span
                                    class="user-top-menu-name text-primary has-transition ml-3">{{ translate('Logout') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Menu Bar -->
    <div class="d-none d-lg-block position-relative bg-primary h-50px">
        <div class="container h-100">
            <div class="d-flex h-100">
                <!-- Categoty Menu Button -->
                <div class="d-none d-xl-block all-category has-transition bg-black-10" id="category-menu-bar">
                    <div class="px-3 h-100"
                        style="padding-top: 12px;padding-bottom: 12px; width:270px; cursor: pointer;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="fw-700 fs-16 text-white mr-3">{{ translate('Categories') }}</span>
                                <a href="{{ route('categories.all') }}" class="text-reset">
                                    <!--<span-->
                                    <!--    class="d-none d-lg-inline-block text-white hov-opacity-80">({{ translate('See All') }})</span>-->
                                </a>
                            </div>
                            <i class="las la-angle-down text-white has-transition" id="category-menu-bar-icon"
                                style="font-size: 1.2rem !important"></i>
                        </div>
                    </div>
                </div>
                <!-- Header Menus -->
                @php
                    $nav_txt_color =
                        get_setting('header_nav_menu_text') == 'light' || get_setting('header_nav_menu_text') == null
                            ? 'text-white'
                            : 'text-dark';
                @endphp
                <div class="ml-xl-4 w-100 overflow-hidden">
                    <div class="d-flex align-items-center justify-content-center justify-content-xl-start h-100">
                        <ul class="list-inline mb-0 pl-0 hor-swipe c-scrollbar-light">
                            @if (get_setting('header_menu_labels') != null)
                                @foreach (json_decode(get_setting('header_menu_labels'), true) as $key => $value)
                                    <li class="list-inline-item mr-0 animate-underline-white">
                                        <a href="{{ json_decode(get_setting('header_menu_links'), true)[$key] }}"
                                            class="fs-13 px-3 py-3 d-inline-block fw-700 {{ $nav_txt_color }} header_menu_links hov-bg-black-10
                                            @if (url()->current() == json_decode(get_setting('header_menu_links'), true)[$key]) active @endif">
                                            {{ translate($value) }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- Cart -->



            </div>
        </div>
        <!-- Categoty Menus -->
        <div class="hover-category-menu position-absolute w-100 top-100 left-0 right-0 z-3 d-none"
            id="click-category-menu">
            <div class="container">
                <div class="d-flex position-relative">
                    <div class="position-static">
                        @include('frontend.' . get_setting('homepage_select') . '.partials.category_menu')
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Top Menu Sidebar -->
<div class="aiz-top-menu-sidebar collapse-sidebar-wrap sidebar-xl sidebar-left d-lg-none z-1035">
    <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle" data-target=".aiz-top-menu-sidebar"
        data-same=".hide-top-menu-bar"></div>
    <div class="collapse-sidebar c-scrollbar-light text-left">
        <button type="button" class="btn btn-sm p-4 hide-top-menu-bar" data-toggle="class-toggle"
            data-target=".aiz-top-menu-sidebar">
            <i class="las la-times la-2x text-primary"></i>
        </button>
        @auth
            <span class="d-flex align-items-center nav-user-info pl-4">
                <!-- Image -->
                <span class="size-40px rounded-circle overflow-hidden border border-transparent nav-user-img">
                    @if ($user->avatar_original != null)
                        <img src="{{ $user_avatar }}" class="img-fit h-100" alt="{{ translate('avatar') }}"
                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                    @else
                        <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="image"
                            alt="{{ translate('avatar') }}"
                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                    @endif
                </span>
                <!-- Name -->
                <h4 class="h5 fs-14 fw-700 text-dark ml-2 mb-0">{{ $user->name }}</h4>
            </span>
        @else
            <!--Login & Registration -->
            <span class="d-flex align-items-center nav-user-info pl-4">
                <!-- Image -->
                <span
                    class="size-40px rounded-circle overflow-hidden border d-flex align-items-center justify-content-center nav-user-img">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19.902" height="20.012" viewBox="0 0 19.902 20.012">
                        <path id="fe2df171891038b33e9624c27e96e367"
                            d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1.006,1.006,0,1,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1,10,10,0,0,0-6.25-8.19ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z"
                            transform="translate(-2.064 -1.995)" fill="#91919b" />
                    </svg>
                </span>
                <a href="javascript:void(0);"
                    class="text-reset opacity-60 hov-opacity-100 hov-text-primary fs-12 d-inline-block border-right border-soft-light border-width-2 pr-2 ml-3"
                    data-toggle="modal" data-target="#login_modal">
                    {{ translate('Login') }}
                </a>
                <!-- Registration -->
                <a href="javascript:void(0);"
                    class="text-reset opacity-60 hov-opacity-100 hov-text-primary fs-12 d-inline-block py-2 pl-2"
                    data-toggle="modal" data-target="#registration_modal">
                    {{ translate('Registration') }}
                </a>
            </span>
        @endauth
        <hr>
        <ul class="mb-0 pl-3 pb-3 h-100">
            @if (get_setting('header_menu_labels') != null)
                @foreach (json_decode(get_setting('header_menu_labels'), true) as $key => $value)
                    <li class="mr-0">
                        <a href="{{ json_decode(get_setting('header_menu_links'), true)[$key] }}"
                            class="fs-13 px-3 py-3 w-100 d-inline-block fw-700 text-dark header_menu_links
                            @if (url()->current() == json_decode(get_setting('header_menu_links'), true)[$key]) active @endif">
                            {{ translate($value) }}
                        </a>
                    </li>
                @endforeach
            @endif
            @auth
                @if (isAdmin())
                    <hr>
                    <li class="mr-0">
                        <a href="{{ route('admin.dashboard') }}"
                            class="fs-13 px-3 py-3 w-100 d-inline-block fw-700 text-dark header_menu_links">
                            {{ translate('My Account') }}
                        </a>
                    </li>
                @else
                    <hr>
                    <li class="mr-0">
                        <a href="{{ route('dashboard') }}"
                            class="fs-13 px-3 py-3 w-100 d-inline-block fw-700 text-dark header_menu_links
                                {{ areActiveRoutes(['dashboard'], ' active') }}">
                            {{ translate('My Account') }}
                        </a>
                    </li>
                @endif
                @if (isCustomer())
                    <li class="mr-0">
                        <a href="{{ route('all-notifications') }}"
                            class="fs-13 px-3 py-3 w-100 d-inline-block fw-700 text-dark header_menu_links
                                {{ areActiveRoutes(['all-notifications'], ' active') }}">
                            {{ translate('Notifications') }}
                        </a>
                    </li>
                    <li class="mr-0">
                        <a href="{{ route('wishlists.index') }}"
                            class="fs-13 px-3 py-3 w-100 d-inline-block fw-700 text-dark header_menu_links
                                {{ areActiveRoutes(['wishlists.index'], ' active') }}">
                            {{ translate('Wishlist') }}
                        </a>
                    </li>
                    <li class="mr-0">
                        <a href="{{ route('compare') }}"
                            class="fs-13 px-3 py-3 w-100 d-inline-block fw-700 text-dark header_menu_links
                                {{ areActiveRoutes(['compare'], ' active') }}">
                            {{ translate('Compare') }}
                        </a>
                    </li>
                @endif
                <hr>
                <li class="mr-0">
                    <a href="{{ route('logout') }}"
                        class="fs-13 px-3 py-3 w-100 d-inline-block fw-700 text-primary header_menu_links">
                        {{ translate('Logout') }}
                    </a>
                </li>
            @endauth
        </ul>
        <br>
        <br>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div id="order-details-modal-body">

            </div>
        </div>
    </div>
</div>

@section('script')
    <script type="text/javascript">
        function show_order_details(order_id) {
            $('#order-details-modal-body').html(null);

            if (!$('#modal-size').hasClass('modal-lg')) {
                $('#modal-size').addClass('modal-lg');
            }

            $.post('{{ route('orders.details') }}', {
                _token: AIZ.data.csrf,
                order_id: order_id
            }, function(data) {
                $('#order-details-modal-body').html(data);
                $('#order_details').modal();
                $('.c-preloader').hide();
                AIZ.plugins.bootstrapSelect('refresh');
            });
        }
    </script>
@endsection
