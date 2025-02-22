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

            <!-- Phone -->
            <div class="form-group row">
                <label class="col-md-2 col-form-label fs-14">{{ translate('Your Phone') }}</label>
                <div class="col-md-10 d-flex">
                    <input type="text" class="form-control rounded-0" placeholder="{{ translate('Your Phone') }}"
                        name="phone" id="phone" value="{{ Auth::user()->phone }}" maxlength="11"
                        onkeyup="checkPhoneLength()">
                </div>


                <!-- Change Number Text -->
                <!-- Change Number Link -->
                <div class="col-md-10 offset-md-2">
                    <a href="javascript:void(0);" id="change-number" data-toggle="modal"
                        data-target="#changeNumberModal" style="font-size:10px; color: #D70654; text-decoration: none;">
                        {{ translate('Click to Change Number') }}
                    </a>
                </div>

                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="changeNumberModal" tabindex="-1" aria-labelledby="changeNumberModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="changeNumberModalLabel">
                                    {{ translate('Change Phone Number') }}
                                </h5>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <label>{{ translate('New Number') }}</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control" id="new_number" name="new_number"
                                        maxlength="11" placeholder="{{ translate('Enter new number') }}"
                                        style="width: 50vh;">
                                    <button type="button" class="btn btn-primary ml-2" id="send-otp-btn"
                                        onclick="sendOTP()">
                                        {{ translate('Send OTP') }}
                                    </button>
                                </div>

                                <!-- OTP Section (Hidden Initially) -->
                                <div class="form-group mt-3" id="otp-section" style="margin-left: -12px;display:none;">
                                    <!--<label class="col-md-2 col-form-label fs-14">{{ translate('OTP') }}</label>-->
                                    <div class="col-md-10 d-flex align-items-center ">
                                        <input type="text" class="form-control rounded-0"
                                            placeholder="{{ translate('OTP') }}" id="otp" name="otp" maxlength="6"
                                            style="width: 45vh;">
                                        <button type="button" class="btn btn-primary ml-2" id="verify-cgotp"
                                            onclick="verifycgOTP()">
                                            {{ translate('Verify') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <script>


                </script>
            </div>


            <!-- OTP Input and Verify Button -->
            <div class="form-group row" id="otp-section" style="display:none;">
                <label class="col-md-2 col-form-label fs-14">{{ translate('OTP') }}</label>
                <div class="col-md-10 d-flex align-items-center">
                    <input type="text" class="form-control rounded-0" placeholder="{{ translate('OTP') }}" id="otp"
                        name="otp" maxlength="6" style="width: 100px;">
                    <button type="button" class="btn btn-primary ml-2" id="verify-cgotp" style="display:none;"
                        onclick="verifycgOTP()">{{ translate('Verify') }}</button>
                </div>
            </div>

            <!-- Gmail Section -->
            <div class="form-group row">
                <label class="col-md-2 col-form-label fs-14">{{ translate('Gmail') }}</label>
                <div class="col-md-7">
                    <input type="email" class="form-control rounded-0" id="gmailInput"
                        placeholder="{{ translate('Enter your Gmail') }}" name="gmail" value="{{ Auth::user()->email }}"
                        oninput="validateGmail(this)">
                    <small id="emailError" class="text-danger" style="display: none;">Only Gmail addresses are
                        allowed.</small>
                </div>
                <div class="col-md-3">
                    <button id="sendMailBtn" class="btn btn-primary" style="display: none;">Send OTP</button>
                </div>
            </div>

            <!-- OTP Section (Initially Hidden) -->
            <div class="form-group row" id="otpSection" style="display: none;">
                <label class="col-md-2 col-form-label fs-14">{{ translate('Enter OTP') }}</label>
                <div class="col-md-7">
                    <input type="text" class="form-control rounded-0" id="otpInput"
                        placeholder="{{ translate('Enter OTP') }}">
                </div>
                <div class="col-md-3">
                    <button id="verifyOtpBtn" class="btn btn-primary">Verify OTP</button>
                </div>
            </div>

            <script>
                // Verify OTP function triggered when 'Verify OTP' button is clicked
                document.getElementById('verifyOtpBtn').addEventListener('click', function () {
                    var otp = document.getElementById('otpInput').value;

                    if (otp === '') {
                        alert('Please enter the OTP.');
                        return;
                    }

                    // Send OTP for verification to the backend
                    fetch("{{ route('verifyMailOtp') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ otp: otp })  // Send OTP to verify
                    })
                        .then(response => response.json())
                        .then(data => {
                            alert(data.message);  // Display verification result
                            if (data.message === 'OTP verified successfully!') {
                                // Optionally, you can redirect or perform additional actions here
                            }
                        })
                        .catch(error => {
                            console.log('Error:', error);  // Handle any errors
                        });
                });

                // Enable/Disable the 'Send OTP' button based on Gmail input
                function validateGmail(input) {
                    let email = input.value;
                    let errorText = document.getElementById('emailError');
                    let sendMailBtn = document.getElementById('sendMailBtn');

                    if (!email.endsWith("@gmail.com")) {
                        errorText.style.display = "block";
                        input.setCustomValidity("Only Gmail addresses are allowed.");
                        sendMailBtn.style.display = "none"; // Hide Send OTP button if Gmail is invalid
                    } else {
                        errorText.style.display = "none";
                        input.setCustomValidity("");
                        sendMailBtn.style.display = "inline-block"; // Show Send OTP button if Gmail is valid
                    }
                }

                // Send OTP function triggered when 'Send OTP' button is clicked
                document.getElementById('sendMailBtn').addEventListener('click', function () {
                    var email = document.getElementById('gmailInput').value;

                    if (email === '') {
                        alert('Please enter a valid Gmail address.');
                        return;
                    }

                    fetch("{{ route('send.mail') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ email: email })  // Send email from input field
                    })
                        .then(response => response.json())
                        .then(data => {
                            alert(data.message);  // Display success message

                            // Show OTP input and Verify button after sending OTP
                            document.getElementById('otpSection').style.display = "flex";
                        })
                        .catch(error => {
                            console.log('Error:', error);  // Handle any errors
                        });
                });


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
                            placeholder="{{ translate('Old Password') }}" name="old_password">
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
                            placeholder="{{ translate('New Password') }}" name="new_password"
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
                            placeholder="{{ translate('Confirm New Password') }}" name="confirm_password"
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

@if ($errors->has('old_password'))
    <script>
        alert('{{ $errors->first('old_password') }}');
    </script>
@endif


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

    function sendOTP() {
        const oldPhoneNumber = document.getElementById('phone').value; // Get the old number
        const newPhoneNumber = document.getElementById('new_number').value; // Get the new number

        if (newPhoneNumber.length !== 11) {
            alert('Please enter a valid 11-digit phone number.');
            return;
        }

        $.post('{{ route('user.send.otpNumber') }}', {
            _token: '{{ csrf_token() }}',
            phone: oldPhoneNumber,  // Old number (used to find user)
            new_number: newPhoneNumber  // New number (OTP will be sent here)
        }, function (response) {
            if (response.status === 'success') {
                alert('OTP sent to your new phone number!');
                showOtpSection(); // Show OTP input and Verify button
            } else {
                alert('Failed to send OTP. Please try again.');
            }
        });
    }

    // Function to show OTP section after OTP is sent
    function showOtpSection() {
        document.getElementById('otp-section').style.display = 'block'; // Show OTP input section
        document.getElementById('send-otp-btn').style.display = 'none'; // Hide Send OTP button
    }


    // Function to show OTP input and Verify button
    function showOtpSection() {
        const otpSection = document.getElementById('otp-section');
        const verifyButton = document.getElementById('verify-cgotp');

        otpSection.style.display = 'flex';  // Show OTP section
        verifyButton.style.display = 'inline-block';  // Show Verify button
    }
    // function verifycgOTP() {
    //      const otp = document.getElementById('otp').value;
    //      const phone = document.getElementById('phone').value;

    //      $.post('{{ route('user.verify.otpNumber') }}', {
    //          _token: '{{ csrf_token() }}',
    //          otp: otp,
    //          phone: phone
    //      }, function (response) {
    //          if (response.status === 'success') {
    //              otpVerified = true;
    //              alert('Phone number verified successfully!');
    //              document.getElementById('submit-btn').disabled = false; // Enable submit button once OTP is verified
    //          } else {
    //              alert('Invalid OTP');
    //          }
    //      }).fail(function (error) {
    //          alert('Error verifying OTP.');
    //      });
    //  }
    document.getElementById('verify-cgotp').addEventListener('click', function () {
        const oldPhone = document.getElementById('phone').value; // Get the old phone number
        const otp = document.getElementById('otp').value; // Get OTP entered by the user

        // Validate OTP length
        if (otp.length !== 4) {
            alert('Please enter a valid 4-digit OTP.');
            return;
        }

        // Send OTP verification request
        fetch('{{ route('user.verify.otpNumber') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ phone: oldPhone, otp: otp }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('OTP verified successfully!');

                    // Change the "Verify" button background color to green
                    const verifyButton = document.getElementById('verify-cgotp');
                    verifyButton.style.backgroundColor = '#16C47F';
                    verifyButton.innerHTML = 'Verified';

                    // Now, update the phone number
                    const newPhoneNumber = document.getElementById('new_number').value;

                    fetch('{{ route('update-phone-number') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify({ old_phone: oldPhone, new_phone: newPhoneNumber }),
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                // Update the phone number in the input field
                                document.getElementById('phone').value = newPhoneNumber;

                                // Delay closing the modal by 5 seconds
                                setTimeout(() => {
                                    $('#changeNumberModal').modal('hide'); // Close the modal after 5 seconds

                                    // Hide the OTP input field and "Verify" button after modal closes
                                    document.getElementById('otp').value = '';
                                    document.getElementById('verify-cgotp').style.display = 'none';
                                    document.getElementById('otp-section').style.display = 'none';
                                }, 3000); // 5000ms = 5 seconds

                                // Optionally, you can also reset the modal data (phone number, etc.) here
                                document.getElementById('new_number').value = '';
                            } else {
                                alert('Failed to update phone number. Please try again.');
                            }
                        })
                        .catch(error => {
                            console.error('Error updating phone number:', error);
                            alert('An error occurred while updating the phone number.');
                        });

                } else {
                    alert(data.message || 'Invalid OTP. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error verifying OTP:', error);
                alert('An error occurred while verifying OTP. Please try again later.');
            });
    });



    // Enable or disable the submit button based on OTP verification
    document.getElementById('profile-form').onsubmit = function (event) {
        const phoneNumber = document.getElementById('phone').value;

        // If phone number is changed and OTP is not verified, prevent form submission
        if (phoneChanged && !otpVerified) {
            event.preventDefault(); // Prevent form submission
            alert('Please verify your phone number with OTP.');
        }
    }
    document.getElementById('profile-form').onsubmit = function (event) {
        const oldPassword = document.getElementById('oldPassword').value;
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const email = document.getElementById('gmailInput').value;
        const phone = document.getElementById('phone').value;

        // If email or phone is updated and no password fields are filled, allow the form submission
        if ((email && !oldPassword && !newPassword && !confirmPassword) ||
            (phone && !oldPassword && !newPassword && !confirmPassword)) {
            return; // Allow submission
        }

        // Check if old password and new password are the same
        if (oldPassword && newPassword && oldPassword === newPassword) {
            event.preventDefault();  // Prevent form submission
            alert('{{ translate("The new password cannot be the same as the old password.") }}');
            return;
        }

        // Prevent form submission if old password is missing when new password is provided
        if (newPassword && !oldPassword) {
            event.preventDefault();
            alert('{{ translate("Please enter your old password to update the new password.") }}');
            return;
        }

        // If OTP is verified and email is being changed, allow the submission without requiring password.
        if (!oldPassword && !newPassword && !confirmPassword && otpVerified) {
            // Allow the email change even if no password is entered
            return;
        }

        // Optionally, you can handle other form validations for phone number and OTP if needed.
    };

</script>
@endsection
