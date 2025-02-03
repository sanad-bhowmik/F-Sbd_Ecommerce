@extends('frontend.layouts.user_panel')

@section('panel_content')
<div class="aiz-titlebar mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="fs-20 fw-700 text-dark">{{ translate('Manage Profile') }}</h1>
        </div>
    </div>
</div>

<!-- Basic Info-->
<div class="card rounded-0 shadow-none border">
    <div class="card-header pt-4 border-bottom-0">
        <h5 class="mb-0 fs-18 fw-700 text-dark">{{ translate('Basic Info') }}</h5>
    </div>
    <div class="card-body">
        <form id="profile-form" action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Name-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label fs-14 fs-14">{{ translate('Your Name') }}</label>
                <div class="col-md-10">
                    <input type="text" class="form-control rounded-0" placeholder="{{ translate('Your Name') }}"
                        name="name" value="{{ Auth::user()->name }}">
                </div>
            </div>

            <!-- Phone-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label fs-14">{{ translate('Your Phone') }}</label>
                <div class="col-md-10 d-flex">
                    <input type="text" class="form-control rounded-0" placeholder="{{ translate('Your Phone') }}"
                        name="phone" id="phone" value="{{ Auth::user()->phone }}" maxlength="11"
                        onkeyup="checkPhoneLength()">

                    <!-- Send OTP Button -->
                    <button type="button" class="btn btn-primary ml-2" id="send-otp-btn"
                        style="display:none; flex-shrink: 0;" onclick="sendOTP()">{{ translate('Send OTP') }}</button>
                </div>
            </div>

            <!-- OTP Input and Verify Button -->
            <div class="form-group row" id="otp-section" style="display:none;">
                <label class="col-md-2 col-form-label fs-14">{{ translate('OTP') }}</label>
                <div class="col-md-10 d-flex align-items-center">
                    <input type="text" class="form-control rounded-0" placeholder="{{ translate('OTP') }}" id="otp"
                        name="otp" maxlength="6" style="width: 100px;">
                    <button type="button" class="btn btn-primary ml-2" id="verify-otp" style="display:none;"
                        onclick="verifyOTP()">{{ translate('Verify') }}</button>
                </div>
            </div>

            <!-- Email -->
            <div class="form-group row">
                <label class="col-md-2 col-form-label fs-14">{{ translate('Gmail') }}</label>
                <div class="col-md-10">
                    <input type="email" class="form-control rounded-0" id="gmailInput"
                        placeholder="{{ translate('Enter your Gmail') }}" name="gmail" value="{{ Auth::user()->email }}"
                        oninput="validateGmail(this)">
                    <small id="emailError" class="text-danger" style="display: none;">Only Gmail addresses are
                        allowed.</small>
                </div>
            </div>

            <script>
                function validateGmail(input) {
                    let email = input.value;
                    let errorText = document.getElementById('emailError');

                    if (!email.endsWith("@gmail.com")) {
                        errorText.style.display = "block";
                        input.setCustomValidity("Only Gmail addresses are allowed.");
                    } else {
                        errorText.style.display = "none";
                        input.setCustomValidity("");
                    }
                }
            </script>


            <style>
                .password-container {
                    display: flex;
                    align-items: center;
                    position: relative;
                }

                .password-container input {
                    flex: 1;
                    padding-right: 40px;
                    /* Space for icon */
                }

                .password-container i {
                    position: absolute;
                    right: 10px;
                    cursor: pointer;
                    color: #666;
                }

                .password-container i:hover {
                    color: #333;
                }
            </style>

            <!-- Old Password -->
            <div class="form-group row">
                <label class="col-md-2 col-form-label fs-14">{{ translate('Old Password') }}</label>
                <div class="col-md-10">
                    <div class="password-container">
                        <input type="password" class="form-control rounded-0" id="oldPassword"
                            placeholder="{{ translate('Old Password') }}" name="old_password" required>
                        <i class="fas fa-eye-slash toggle-password" onclick="togglePassword('oldPassword', this)"></i>
                    </div>
                </div>
            </div>

            <!-- New Password -->
            <div class="form-group row">
                <label class="col-md-2 col-form-label fs-14">{{ translate('New Password') }}</label>
                <div class="col-md-10">
                    <div class="password-container">
                        <input type="password" class="form-control rounded-0" id="newPassword"
                            placeholder="{{ translate('New Password') }}" name="new_password" required
                            oninput="validatePasswords()">
                        <i class="fas fa-eye-slash toggle-password" onclick="togglePassword('newPassword', this)"></i>
                    </div>
                </div>
            </div>

            <!-- Confirm New Password -->
            <div class="form-group row">
                <label class="col-md-2 col-form-label fs-14">{{ translate('Confirm New Password') }}</label>
                <div class="col-md-10">
                    <div class="password-container">
                        <input type="password" class="form-control rounded-0" id="confirmPassword"
                            placeholder="{{ translate('Confirm New Password') }}" name="confirm_password" required
                            oninput="validatePasswords()">
                        <i class="fas fa-eye-slash toggle-password"
                            onclick="togglePassword('confirmPassword', this)"></i>
                    </div>
                    <small id="passwordError" class="text-danger" style="display: none;">Passwords do not match!</small>
                </div>
            </div>

            <!-- JavaScript for Password Validation & Toggle -->
            <script>
                function validatePasswords() {
                    let newPassword = document.getElementById("newPassword").value;
                    let confirmPassword = document.getElementById("confirmPassword").value;
                    let errorText = document.getElementById("passwordError");

                    if (newPassword !== confirmPassword) {
                        errorText.style.display = "block";
                        document.getElementById("confirmPassword").setCustomValidity("Passwords do not match.");
                    } else {
                        errorText.style.display = "none";
                        document.getElementById("confirmPassword").setCustomValidity("");
                    }
                }

                function togglePassword(inputId, icon) {
                    let inputField = document.getElementById(inputId);
                    if (inputField.type === "password") {
                        inputField.type = "text";
                        icon.classList.remove("fa-eye-slash");
                        icon.classList.add("fa-eye");
                    } else {
                        inputField.type = "password";
                        icon.classList.remove("fa-eye");
                        icon.classList.add("fa-eye-slash");
                    }
                }
            </script>

            <!-- Font Awesome for Icons (Add this to your layout if not already included) -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

            <!-- Submit Button-->
            <div class="form-group mb-0 text-right">
                <button type="submit" class="btn btn-primary rounded-0 w-150px mt-3"
                    id="submit-btn">{{ translate('Update Profile') }}</button>
            </div>
        </form>
    </div>
</div>

<!-- Address Section... (Remaining address section here) -->
@endsection

@section('script')
<script type="text/javascript">
    let phoneChanged = false;  // Flag to track if phone number is changed
    let otpVerified = false;  // Flag to track OTP verification status

    // Function to show Send OTP button when phone number is 11 digits
    function checkPhoneLength() {
        const phoneInput = document.getElementById('phone');
        const sendOtpButton = document.getElementById('send-otp-btn');

        // Show the Send OTP button if the phone number is 11 digits
        if (phoneInput.value.length === 11) {
            sendOtpButton.style.display = 'inline-block'; // Show Send OTP button
        } else {
            sendOtpButton.style.display = 'none'; // Hide Send OTP button
        }
    }

    // Function to simulate sending OTP to the phone number
    function sendOTP() {
        const phoneNumber = document.getElementById('phone').value;

        $.post('{{ route('user.send.otpNumber') }}', {
            _token: '{{ csrf_token() }}',
            phone: phoneNumber
        }, function (response) {
            if (response.status === 'success') {
                alert('OTP sent to your phone!');
                showOtpSection();  // Show OTP input and Verify button after OTP is sent
            } else {
                alert('Failed to send OTP');
            }
        });
    }

    // Function to show OTP input and Verify button
    function showOtpSection() {
        const otpSection = document.getElementById('otp-section');
        const verifyButton = document.getElementById('verify-otp');

        otpSection.style.display = 'flex';  // Show OTP section
        verifyButton.style.display = 'inline-block';  // Show Verify button
    }

    // Verify OTP function
    function verifyOTP() {
        const otp = document.getElementById('otp').value;
        const phone = document.getElementById('phone').value;

        $.post('{{ route('user.verify.otpNumber') }}', {
            _token: '{{ csrf_token() }}',
            otp: otp,
            phone: phone
        }, function (response) {
            if (response.status === 'success') {
                otpVerified = true;
                // alert('Phone number verified successfully!');
                document.getElementById('submit-btn').disabled = false; // Enable submit button once OTP is verified
            } else {
                alert('Invalid OTP');
            }
        });
    }

    // Enable or disable the submit button based on OTP verification
    document.getElementById('profile-form').onsubmit = function (event) {
        const phoneNumber = document.getElementById('phone').value;

        // If phone number is changed and OTP is not verified, prevent form submission
        if (phoneChanged && !otpVerified) {
            event.preventDefault(); // Prevent form submission
            alert('Please verify your phone number with OTP.');
        }
    }
</script>
@endsection
