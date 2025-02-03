@extends('auth.layouts.authentication')

@section('content')

<style>
    @keyframes blink {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .blink {
        animation: blink 1s infinite;
    }

    .hidden {
        display: none;
    }

    .toast {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #4CAF50;
        color: white;
        z-index: 9999;
        display: none;
    }

    .toast.show {
        display: block;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @keyframes fadein {
        from {
            top: 0;
            opacity: 0;
        }

        to {
            top: 20px;
            opacity: 1;
        }
    }

    @keyframes fadeout {
        from {
            top: 20px;
            opacity: 1;
        }

        to {
            top: 0;
            opacity: 0;
        }
    }
</style>
<div class="aiz-main-wrapper d-flex flex-column justify-content-md-center bg-white">
    <section class="bg-white overflow-hidden">
        <div class="row">
            <div class="col-xxl-6 col-xl-9 col-lg-10 col-md-7 mx-auto py-lg-4">
                <div class="card shadow-none rounded-0 border-0">
                    <div class="row no-gutters">
                        <!-- Left Side Image-->
                        <div class="col-lg-6">
                            <img src="https://www.icegif.com/wp-content/uploads/2021/12/icegif-873.gif"
                                class="img-fit h-100">
                            <!--<img src="https://img.freepik.com/free-vector/background-hand-holding-id-card_23-2147834395.jpg" class="img-fit h-100">-->
                        </div>

                        <!-- Right Side -->
                        <div class="col-lg-6 p-4 p-lg-5 d-flex flex-column justify-content-center border right-content"
                            style="height: auto;">
                            <!-- Site Icon -->
                            <div class="size-48px mb-3 mx-auto mx-lg-0">
                                <img src="{{ uploaded_asset(get_setting('site_icon')) }}"
                                    alt="{{ translate('Site Icon')}}" class="img-fit h-100">
                            </div>

                            <!-- Titles -->
                            <div class="text-center text-lg-left">
                                <h1 class="fs-20 fs-md-24 fw-700 text-primary" style="text-transform: uppercase;">
                                    {{ translate('Create an account')}}
                                </h1>
                            </div>

                            <!-- Register form -->
                            <div class="pt-3">
                                <div class="">
                                    <form id="reg-form" class="form-default" role="form"
                                        action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <!-- Name -->
                                        <!--<div class="form-group upper-fields">-->
                                        <!--    <label for="name"-->
                                        <!--        class="fs-12 fw-700 text-soft-dark">{{ translate('Full Name') }}</label>-->
                                        <!--    <span class="text-danger blink">*</span>-->
                                        <!--    <input type="text"-->
                                        <!--        class="form-control rounded-0{{ $errors->has('name') ? ' is-invalid' : '' }}"-->
                                        <!--        value="{{ old('name') }}" placeholder="{{  translate('Full Name') }}"-->
                                        <!--        name="name">-->
                                        <!--    @if ($errors->has('name'))-->
                                        <!--        <span class="invalid-feedback" role="alert">-->
                                        <!--            <strong>{{ $errors->first('name') }}</strong>-->
                                        <!--        </span>-->
                                        <!--    @endif-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label for="phone"
                                                class="fs-12 fw-700 text-soft-dark">{{ translate('Phone') }}</label>
                                            <span class="text-danger blink">*</span>
                                            <input type="text"
                                                class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} rounded-0"
                                                value="{{ old('phone') }}" placeholder="{{ translate('Phone Number') }}"
                                                name="phone" id="phone" autocomplete="off" required>
                                        </div>


                                        <!-- Email or Phone -->
                                        @if (addon_is_activated('otp_system'))
                                            <div class="form-group phone-form-group mb-1">
                                                <label for="phone"
                                                    class="fs-12 fw-700 text-soft-dark">{{ translate('Phone') }}</label>
                                                <span class="text-danger blink">*</span>
                                                <input type="tel" id="phone-code"
                                                    class="form-control rounded-0{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                    value="{{ old('phone') }}" placeholder="" name="phone"
                                                    autocomplete="off">
                                            </div>

                                            <input type="hidden" name="country_code" value="">

                                            <div class="form-group email-form-group mb-1 d-none">
                                                <label for="email"
                                                    class="fs-12 fw-700 text-soft-dark">{{ translate('Email') }}</label>
                                                <input type="email"
                                                    class="form-control rounded-0 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                    value="{{ old('email') }}" placeholder="{{  translate('Email') }}"
                                                    name="email" autocomplete="off">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group text-right">
                                                <button class="btn btn-link p-0 text-primary" type="button"
                                                    onclick="toggleEmailPhone(this)"><i>*{{ translate('Use Email Instead') }}</i></button>
                                            </div>
                                        @else
                                            <div class="form-group d-none upper-fields">
                                                <label for="email"
                                                    class="fs-12 fw-700 text-soft-dark">{{ translate('Email') }}</label>
                                                <input type="email"
                                                    class="form-control rounded-0{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                    value="{{ old('email') }}" placeholder="{{  translate('Email') }}"
                                                    name="email">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        @endif

                                        <!-- password -->
                                        <div class="form-group mb-0 upper-fields">
                                            <label for="password"
                                                class="fs-12 fw-700 text-soft-dark">{{ translate('Password') }}</label>
                                            <span class="text-danger blink">*</span>
                                            <div class="position-relative">
                                                <input type="password"
                                                    class="form-control rounded-0{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                    placeholder="{{  translate('Password') }}" name="password" required>
                                                <i class="password-toggle las la-2x la-eye"></i>
                                            </div>
                                            <div class="text-right mt-1">
                                                <span
                                                    class="fs-12 fw-400 text-gray-dark">{{ translate('Password must contain at least 6 digits') }}</span>
                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <!-- password Confirm -->
                                        <div class="form-group upper-fields">
                                            <label for="password_confirmation"
                                                class="fs-12 fw-700 text-soft-dark">{{ translate('Confirm Password') }}</label>
                                            <span class="text-danger blink">*</span>
                                            <div class="position-relative">
                                                <input type="password" class="form-control rounded-0"
                                                    placeholder="{{  translate('Confirm Password') }}"
                                                    name="password_confirmation" required>
                                                <i class="password-toggle las la-2x la-eye"></i>
                                            </div>
                                        </div>

                                        <!-- Recaptcha -->
                                        @if(get_setting('google_recaptcha') == 1)
                                            <div class="form-group upper-fields">
                                                <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                                            </div>
                                            @if ($errors->has('g-recaptcha-response'))
                                                <span class="invalid-feedback" role="alert" style="display: block;">
                                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                </span>
                                            @endif
                                        @endif

                                        <!-- Terms and Conditions -->
                                        <div class="mb-3 upper-fields">
                                            <label class="aiz-checkbox">
                                                <input type="checkbox" name="checkbox_example_1" required>
                                                <span class="">{{ translate('By signing up you agree to our ')}} <a
                                                        href="{{ route('terms') }}"
                                                        class="fw-500">{{ translate('terms and conditions.') }}</a></span>
                                                <span class="aiz-square-check"></span>
                                            </label>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mb-4 mt-4 upper-fields">
                                            <button class="btn btn-primary btn-block fw-600 rounded-0"
                                                id="createAccountBtn">{{ translate('Create Account') }}</button>
                                        </div>

                                        <!-- OTP Check -->
                                        <div id="otpDiv" class="hidden">
                                            <div class="form-group">
                                                <label for="OTP"
                                                    class="fs-12 fw-700 text-soft-dark">{{ translate('OTP') }}</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control rounded-0"
                                                        placeholder="{{ translate('OTP') }}" name="OTP" maxlength="4"
                                                        id="otpInput" oninput="checkOtpLength()">
                                                </div>
                                                <div class="text-right mt-1">
                                                    <span class="text-danger">*</span> <span
                                                        class="fs-12 fw-400 text-gray-dark">{{ translate('Confirm Your 4 digits otp.') }}</span>
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="mb-4 mt-4">
                                                <button type="submit" class="btn btn-primary btn-block fw-600 rounded-0"
                                                    id="submitBtn"
                                                    style="display: none;">{{ translate('Confirm OTP') }}</button>
                                            </div>
                                        </div>

                                        <script>
                                            function checkOtpLength() {
                                                const otpInput = document.getElementById('otpInput');
                                                const submitBtn = document.getElementById('submitBtn');

                                                // Check if the OTP input has exactly 4 digits
                                                if (otpInput.value.length === 4) {
                                                    submitBtn.style.display = 'block'; // Show the button
                                                } else {
                                                    submitBtn.style.display = 'none'; // Hide the button
                                                }
                                            }
                                        </script>

                                        <!-- OTP Check -->
                                    </form>

                                    <!-- Social Login -->
                                    @if(get_setting('google_login') == 1 || get_setting('facebook_login') == 1 || get_setting('twitter_login') == 1 || get_setting('apple_login') == 1)
                                        <div class="text-center mb-3">
                                            <span class="bg-white fs-12 text-gray">{{ translate('Or Join With')}}</span>
                                        </div>
                                        <ul class="list-inline social colored text-center mb-4">
                                            @if (get_setting('facebook_login') == 1)
                                                <li class="list-inline-item">
                                                    <a href="{{ route('social.login', ['provider' => 'facebook']) }}"
                                                        class="facebook">
                                                        <i class="lab la-facebook-f"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if(get_setting('google_login') == 1)
                                                <li class="list-inline-item">
                                                    <a href="{{ route('social.login', ['provider' => 'google']) }}"
                                                        class="google">
                                                        <i class="lab la-google"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if (get_setting('twitter_login') == 1)
                                                <li class="list-inline-item">
                                                    <a href="{{ route('social.login', ['provider' => 'twitter']) }}"
                                                        class="twitter">
                                                        <i class="lab la-twitter"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if (get_setting('apple_login') == 1)
                                                <li class="list-inline-item">
                                                    <a href="{{ route('social.login', ['provider' => 'apple']) }}"
                                                        class="apple">
                                                        <i class="lab la-apple"></i>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif
                                </div>

                                <!-- Log In -->
                                <p class="fs-12 text-gray mb-0">
                                    {{ translate('Already have an account?')}}
                                    <a href="{{ route('user.login') }}"
                                        class="ml-2 fs-14 fw-700 animate-underline-primary">{{ translate('Log In')}}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Go Back -->
                    <div class="mt-3 mr-4 mr-md-0">
                        <a href="{{ url()->previous() }}"
                            class="ml-auto fs-14 fw-700 d-flex align-items-center text-primary"
                            style="max-width: fit-content;">
                            <i class="las la-arrow-left fs-20 mr-1"></i>
                            {{ translate('Back to Previous Page')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="customToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body">
        OTP has been sent successfully
    </div>
</div>
@endsection

@section('script')
@if(get_setting('google_recaptcha') == 1)
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endif

<script type="text/javascript">
    @if(get_setting('google_recaptcha') == 1)
        // making the CAPTCHA  a required field for form submission
        $(document).ready(function () {
            $("#reg-form").on("submit", function (evt) {
                var response = grecaptcha.getResponse();
                if (response.length == 0) {
                    //reCaptcha not verified
                    alert("please verify you are human!");
                    evt.preventDefault();
                    return false;
                }
                //captcha verified
                //do the rest of your validations here
                $("#reg-form").submit();
            });
        });
    @endif
</script>
<!-- OTP Send -->
<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    document.getElementById("createAccountBtn").addEventListener("click", function (event) {
        event.preventDefault();

        var nameInput = document.querySelector('input[name="name"]'); // Name input (optional)
        var phoneInput = document.querySelector('input[name="phone"]'); // Phone input (required)
        var passwordInput = document.querySelector('input[name="password"]'); // Password input (required)

        // Validate phone and password inputs
        if (!phoneInput.value) {
            toastr.error("Please fill in the required field (Phone).", {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-top-right",
                timeOut: 3000,
                progressClass: 'toast-progress-white' // Optional: If you want custom progress color
            });
            return;
        }

        if (!passwordInput.value) {
            toastr.error("Please fill in the required field (Password).", {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-top-right",
                timeOut: 3000,
                progressClass: 'toast-progress-white' // Optional: If you want custom progress color
            });
            return;
        }

        var otpDiv = document.getElementById("otpDiv");
        otpDiv.classList.remove("hidden");

        var upperFields = document.querySelectorAll('.upper-fields');
        for (var i = 0; i < upperFields.length; i++) {
            upperFields[i].classList.add("hidden");
        }

        $.ajax({
            url: '{{ route("send-otp") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                phone: phoneInput.value
            },
            success: function (response) {
                var customToast = document.getElementById("customToast");
                customToast.classList.add("show");
                setTimeout(function () {
                    customToast.classList.remove("show");
                }, 3000);
            },
            error: function (xhr, status, error) {
                console.error('Failed to send OTP');
            }
        });
    });

</script>

<!-- OTP Send -->
<!-- otp Verification -->
<script>
    document.getElementById("reg-form").addEventListener("submit", function (event) {
        event.preventDefault();

        var nameInput = document.querySelector('input[name="name"]').value; // Name (optional)
        var emailInput = document.querySelector('input[name="email"]').value;
        var phoneInput = document.querySelector('input[name="phone"]').value; // Phone (required)
        var passwordInput = document.querySelector('input[name="password"]').value;
        var otpInput = document.querySelector('input[name="OTP"]').value; // OTP input (required)

        // You can still send name in form data if you want but it's optional now
        var formData = {
            name: nameInput,  // Name is optional, can be empty
            email: emailInput,
            phone: phoneInput,
            password: passwordInput,
            OTP: otpInput,
            _token: '{{ csrf_token() }}'
        };

        $.ajax({
            url: '{{ route("verify-otp") }}',
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.success) {
                    window.location.href = 'https://www.amaderbazar.net/';
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Failed to verify OTP');
            }
        });
    });
</script>

<!-- otp Verification -->
@endsection