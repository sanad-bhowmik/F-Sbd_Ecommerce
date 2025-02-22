<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- Login Modal -->
<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fw-600">{{ translate('Login') }}</h6>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="p-3">
                    <div class="text-center mb-3" style="border: 1px solid lightgray;background-color: #EFEFF2;">
                        <button id="toggle-login-mode" class="btn btn-light btn-block">
                            <i class="fas fa-phone"></i> Login with Phone
                        </button>
                    </div>
                    <form class="form-default" role="form" action="{{ route('cart.login.submit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" id="login-input" name="login" class="form-control"
                                placeholder="Enter Email" autocomplete="off" required>
                        </div>
                        <!-- Include Font Awesome if not already added -->
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

                        <div class="form-group position-relative">
                            <input type="password" id="password-login" name="password" class="form-control"
                                placeholder="Enter your password" required>
                            <span class="password-toggle position-absolute"
                                style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                <i class="fa fa-eye" id="togglePasswordIcon-login"></i>
                            </span>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                const togglePasswordIcon = document.getElementById('togglePasswordIcon-login');
                                const passwordInput = document.getElementById('password-login');

                                togglePasswordIcon.addEventListener('click', function () {
                                    // Toggle input type
                                    if (passwordInput.type === 'password') {
                                        passwordInput.type = 'text';
                                        togglePasswordIcon.classList.remove('fa-eye');
                                        togglePasswordIcon.classList.add('fa-eye-slash');
                                    } else {
                                        passwordInput.type = 'password';
                                        togglePasswordIcon.classList.remove('fa-eye-slash');
                                        togglePasswordIcon.classList.add('fa-eye');
                                    }
                                });
                            });
                        </script>

                        <div class="row mb-2 align-items-center">
                            <div class="col-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">
                                        <span class="opacity-80">{{ translate('Remember Me') }}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('password.request') }}"
                                    class="text-reset opacity-80 hov-opacity-100 fs-14">
                                    {{ translate('Forgot password?') }}
                                </a>
                            </div>
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary btn-block fw-600">
                                {{ translate('Login') }}
                            </button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p class="text-muted mb-0">{{ translate('Don\'t have an account?') }}</p>
                        <button class="btn btn-link p-0 text-primary" type="button" data-toggle="modal"
                            data-target="#registration_modal" data-dismiss="modal">
                            {{ translate('Register Now') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleButton = document.getElementById("toggle-login-mode");
        const loginInput = document.getElementById("login-input");
        let isEmailMode = true;

        toggleButton.addEventListener("click", function () {
            if (isEmailMode) {
                loginInput.placeholder = "Enter Your Phone";
                loginInput.setAttribute("type", "tel");
                loginInput.setAttribute("pattern", "[0-9]{11}");
                loginInput.setAttribute("oninput", "this.value=this.value.replace(/[^0-9]/g,'')");
                toggleButton.innerHTML = '<i class="fas fa-envelope"></i> Login with Email';
            } else {
                loginInput.placeholder = "Enter Your Email";
                loginInput.setAttribute("type", "email");
                loginInput.removeAttribute("pattern");
                loginInput.setAttribute("oninput", "this.value=this.value.replace(/[^a-zA-Z0-9@._-]/g,'')");
                toggleButton.innerHTML = '<i class="fas fa-phone"></i> Login with Phone';
            }
            loginInput.value = ""; // Clear input when switching modes
            isEmailMode = !isEmailMode;
        });
    });
</script>


<!-- Registration Modal -->
<!-- Registration Modal -->
<div class="modal fade" id="registration_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fw-600">{{ translate('Register') }}</h6>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="p-3">
                    <form id="registration-form" class="form-default" role="form">
                        @csrf
                        <div id="step1">
                            <div class="form-group position-relative">
                                <input type="tel" id="phone" name="phone" class="form-control"
                                    placeholder="Enter your phone number" autocomplete="off" required>
                            </div>
                            <div class="mb-5">
                                <button type="button" id="send-otp"
                                    class="btn btn-primary btn-block fw-600">{{ translate('Send OTP') }}</button>
                            </div>
                        </div>
                        <div id="step2" style="display: none;">
                            <div class="form-group">
                                <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP"
                                    required>
                            </div>
                            <div class="mb-5">
                                <button type="button" id="verify-otp"
                                    class="btn btn-primary btn-block fw-600">{{ translate('Verify OTP') }}</button>
                            </div>
                            <div id="timer" class="text-center mt-3" style="font-size: 14px;">
                                <p id="countdown"></p>
                            </div>
                        </div>
                        <div id="step3" style="display: none;">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Enter your password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                            <i class="fa fa-eye" id="eyeIcon"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Add Font Awesome CDN for the eye icon -->
                            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
                                rel="stylesheet">

                            <script>
                                // Toggle password visibility
                                document.getElementById('togglePassword').addEventListener('click', function () {
                                    const passwordField = document.getElementById('password');
                                    const eyeIcon = document.getElementById('eyeIcon');

                                    // Check current type of password field and toggle it
                                    if (passwordField.type === 'password') {
                                        passwordField.type = 'text';
                                        eyeIcon.classList.remove('fa-eye'); // Remove eye icon
                                        eyeIcon.classList.add('fa-eye-slash'); // Add eye-slash icon
                                    } else {
                                        passwordField.type = 'password';
                                        eyeIcon.classList.remove('fa-eye-slash'); // Remove eye-slash icon
                                        eyeIcon.classList.add('fa-eye'); // Add eye icon
                                    }
                                });
                            </script>

                            <!-- Added the checkbox section here -->
                            <div class="mb-3 upper-fields">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" id="terms-checkbox" name="checkbox_example_1" required>
                                    <span class="">
                                        By signing up you agree to our
                                        <a href="https://celcombazar.com/terms" class="fw-500">terms and conditions</a>
                                    </span>
                                    <span class="aiz-square-check"></span>
                                </label>
                            </div>
                            <div class="mb-5">
                                <button type="button" id="register-btn" class="btn btn-primary btn-block fw-600"
                                    style="display: none;">
                                    {{ translate('Register') }}
                                </button>
                            </div>
                        </div>


                    </form>
                    <div class="text-center">
                        <p class="text-muted mb-0">{{ translate('Already have an account?') }}</p>
                        <button class="btn btn-link p-0 text-primary" type="button" data-toggle="modal"
                            data-target="#login_modal" data-dismiss="modal">
                            {{ translate('Login Now') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .password-toggle {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6c757d;
    }

    .password-toggle:hover {
        color: #000;
    }

    #countdown {
        font-size: 14px;
        background-color: rgba(0, 255, 0, 0.2);
        /* Transparent green */
        color: #006400;
        /* Dark green text */
        padding: 5px;
        border-radius: 5px;
        display: inline-block;
        font-weight: bold;
    }
</style>

<!-- Toastify.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<!-- Toastify.js Script -->
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    // Handle "Send OTP" button
    document.getElementById('send-otp').addEventListener('click', function () {
        const phone = document.getElementById('phone').value;

        fetch('{{ route('send-otp') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ phone }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast('OTP sent successfully. Please verify.', 'success');
                    // Hide step1 and show step2
                    document.getElementById('step1').style.display = 'none';
                    document.getElementById('step2').style.display = 'block';
                    startTimer(45);
                } else {
                    showToast(data.message || 'An error occurred.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Number Already Exit.', 'error');
            });
    });

    // Handle "Verify OTP" button
    document.getElementById('verify-otp').addEventListener('click', function () {
        const phone = document.getElementById('phone').value;
        const otp = document.getElementById('otp').value;

        fetch('{{ route('verify-otp') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ phone, otp }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast('OTP verified successfully.', 'success');
                    // Hide step2 and show step3 (password input)
                    document.getElementById('step2').style.display = 'none';
                    document.getElementById('step3').style.display = 'block';

                } else {
                    showToast(data.message || 'Invalid OTP. Please try again.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred while verifying OTP. Please try again later.', 'error');
            });
    });

    // Get the checkbox and button elements
    const termsCheckbox = document.getElementById('terms-checkbox');
    const registerBtn = document.getElementById('register-btn');

    // Listen for changes on the checkbox
    termsCheckbox.addEventListener('change', function () {
        if (this.checked) {
            // Show the "Register" button if the checkbox is checked
            registerBtn.style.display = 'block';
        } else {
            // Hide the "Register" button if the checkbox is unchecked
            registerBtn.style.display = 'none';
        }
    });

    // Handle "Register" button click
    registerBtn.addEventListener('click', function () {
        const phone = document.getElementById('phone').value;
        const otp = document.getElementById('otp').value;
        const password = document.getElementById('password').value;

        fetch('{{ route('user.registration.submit') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ phone, otp, password }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast('Registration successful.', 'success');
                    location.reload();
                    // Redirect or close the modal
                } else {
                    showToast(data.message || 'Registration failed. Please try again.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred while registering. Please try again later.', 'error');
            });
    });


    // Show Toast Function
    function showToast(message, type) {
        const bgColor = type === 'success' ? 'linear-gradient(to right, #00b09b, #96c93d)' : 'linear-gradient(to right, #ff5f6d, #ffc371)';
        Toastify({
            text: message,
            duration: 3000,
            close: true,
            gravity: 'top', // 'top' or 'bottom'
            position: 'right', // 'left', 'center' or 'right'
            backgroundColor: bgColor,
        }).showToast();
    }
    function startTimer(seconds) {
        let timer = seconds;
        const countdownElement = document.getElementById('countdown');

        // Display the initial time
        countdownElement.innerText = `You have ${timer} seconds to verify your OTP.`;

        const interval = setInterval(function () {
            timer--;
            countdownElement.innerText = `You have ${timer} seconds to verify your OTP.`;

            if (timer <= 0) {
                clearInterval(interval); // Stop the timer
                countdownElement.innerText = 'OTP expired. Please request a new OTP.';
                // Optionally, disable the verify OTP button or show a retry button
                document.getElementById('verify-otp').disabled = true;
                setTimeout(() => {
                    // Optionally, re-enable the button after some time, or show retry option
                    document.getElementById('verify-otp').disabled = false;
                }, 3000); // Re-enable the button after 3 seconds
            }
        }, 1000); // Update every second
    }
</script>
