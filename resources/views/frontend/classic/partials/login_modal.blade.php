<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- Login Modal -->
<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fw-600">{{ translate('Login') }}</h6>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="p-3">
                    <form class="form-default" role="form" action="{{ route('cart.login.submit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control" placeholder="Enter your phone number"
                                autocomplete="off" required>
                        </div>
                        <div class="form-group position-relative">
                            <input type="password" id="password-login" name="password" class="form-control"
                                placeholder="Enter your password" required>
                            <span class="password-toggle position-absolute"
                                style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                <i class="fas fa-eye" id="togglePasswordIcon-login"></i>
                            </span>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" name="remember">
                                    <span class="opacity-60">{{ translate('Remember Me') }}</span>
                                </label>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('password.request') }}"
                                    class="text-reset opacity-60 hov-opacity-100 fs-14">{{ translate('Forgot password?') }}</a>
                            </div>
                        </div>
                        <div class="mb-5">
                            <button type="submit"
                                class="btn btn-primary btn-block fw-600">{{ translate('Login') }}</button>
                        </div>
                    </form>
                    <div class="text-center">
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
                            <div class="form-group position-relative">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Enter your password" required>
                                <span class="password-toggle" onclick="togglePassword('password')">
                                    <i class="fa fa-eye" id="toggle-password-icon"></i>
                                </span>
                            </div>
                            <div class="form-group position-relative">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" placeholder="Confirm your password" required>
                                <span class="password-toggle" onclick="togglePassword('password_confirmation')">
                                    <i class="fa fa-eye" id="toggle-password-confirmation-icon"></i>
                                </span>
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
</style>

<!-- Toastify.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<!-- Toastify.js Script -->
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePasswordIcon = document.getElementById('togglePasswordIcon-login');
        const passwordInput = document.getElementById('password-login');

        togglePasswordIcon.addEventListener('click', function () {
            // Toggle password visibility
            const isPasswordVisible = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPasswordVisible ? 'text' : 'password');

            // Toggle icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    });
    function togglePassword(fieldId) {
        const passwordField = document.getElementById(fieldId);
        const icon = document.querySelector(`#toggle-${fieldId}-icon`);
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    let timer; // Timer variable

    // Handle "Send OTP" button
    document.getElementById('send-otp').addEventListener('click', function () {
        const phone = document.getElementById('phone').value;
        const password = document.getElementById('password').value;
        const passwordConfirmation = document.getElementById('password_confirmation').value;

        fetch('{{ route('send-otp') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ phone, password, password_confirmation: passwordConfirmation }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast('OTP sent successfully. Please verify.', 'success');
                    document.getElementById('step1').style.display = 'none';
                    document.getElementById('step2').style.display = 'block';

                    // Start 45-second timer
                    startTimer(60);
                } else {
                    showToast(data.message || 'An error occurred.', 'error');
                }
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
                    showToast('Registration complete. You are now logged in.', 'success');
                    location.reload();
                } else {
                    showToast(data.message || 'An error occurred.', 'error');
                }
            });
    });

    // Timer function
    function startTimer(duration) {
        const resendButton = document.getElementById('send-otp');
        let timerDisplay = document.getElementById('timer-display');

        if (!timerDisplay) {
            timerDisplay = document.createElement('div');
            timerDisplay.id = 'timer-display';
            timerDisplay.className = 'text-center mt-3 alert alert-info';
            document.getElementById('step2').appendChild(timerDisplay);
        }

        let timeLeft = duration;

        // Disable the resend button
        resendButton.disabled = true;
        resendButton.textContent = 'Resend OTP (' + timeLeft + 's)';

        timer = setInterval(() => {
            timeLeft--;
            resendButton.textContent = 'Resend OTP (' + timeLeft + 's)';
            timerDisplay.textContent = `You can resend the OTP in ${timeLeft} seconds.`;

            if (timeLeft <= 0) {
                clearInterval(timer);
                resendButton.disabled = false;
                resendButton.textContent = 'Resend OTP';
                timerDisplay.remove(); // Remove the timer display when it ends
            }
        }, 1000);
    }

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


</script>