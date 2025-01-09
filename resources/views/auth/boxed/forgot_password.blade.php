<!-- aiz-main-wrapper -->
<div class="aiz-main-wrapper d-flex flex-column justify-content-md-center bg-white">
    <section class="bg-white overflow-hidden">
        <div class="row">
            <div class="col-xxl-6 col-xl-9 col-lg-10 col-md-7 mx-auto py-lg-4">
                <div class="card shadow-none rounded-0 border-0">
                    <div class="row no-gutters">
                        <!-- Left Side Image -->
                        <div class="col-lg-6">
                            <img src="{{ uploaded_asset(get_setting('forgot_password_page_image')) }}" alt="{{ translate('Forgot Password Page Image') }}" class="img-fit h-100">
                        </div>

                        <div class="col-lg-6 p-4 p-lg-5 d-flex flex-column justify-content-center border right-content" style="height: auto;">
                            <!-- Site Icon -->
                            <div class="size-48px mb-3 mx-auto mx-lg-0">
                                <img src="{{ uploaded_asset(get_setting('site_icon')) }}" alt="{{ translate('Site Icon')}}" class="img-fit h-100">
                            </div>

                            <!-- Titles -->
                            <div class="text-center text-lg-left">
                                <h1 class="fs-20 fs-md-20 fw-700 text-primary" style="text-transform: uppercase;">{{ translate('Forgot password?') }}</h1>
                                <h5 class="fs-14 fw-400 text-dark">
                                    {{ translate('Enter your phone number to verify and reset your password.') }}
                                </h5>
                            </div>

                            <!-- Reset Password Form -->
                            <div class="pt-3">
                                <form class="form-default" role="form" action="{{ route('password.phone.verify') }}" method="POST">
                                    @csrf

                                    <!-- Phone Number -->
                                    <div class="form-group phone-form-group mb-1">
                                        <label for="phone" class="fs-12 fw-700 text-soft-dark">{{ translate('Phone') }}</label>
                                        <input type="tel" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} rounded-0" value="{{ old('phone') }}" placeholder="{{ translate('Enter your phone number') }}" name="phone" autocomplete="off" required>
                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <!-- New Password -->
                                    <div class="form-group mt-3 position-relative">
                                        <label for="password" class="fs-12 fw-700 text-soft-dark">{{ translate('New Password') }}</label>
                                        <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} rounded-0" placeholder="{{ translate('Enter new password') }}" name="password" required>
                                        <span toggle="#password" class="field-icon toggle-password" style="position: absolute; right: 10px; top: 40px; cursor: pointer;">
                                            <i class="las la-eye-slash"></i>
                                        </span>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Confirm New Password -->
                                    <div class="form-group mt-3 position-relative">
                                        <label for="password_confirmation" class="fs-12 fw-700 text-soft-dark">{{ translate('Confirm Password') }}</label>
                                        <input type="password" id="password_confirmation" class="form-control rounded-0" placeholder="{{ translate('Confirm new password') }}" name="password_confirmation" required>
                                        <span toggle="#password_confirmation" class="field-icon toggle-password" style="position: absolute; right: 10px; top: 40px; cursor: pointer;">
                                            <i class="las la-eye-slash"></i>
                                        </span>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="mb-4 mt-4">
                                        <button type="submit" class="btn btn-primary btn-block fw-700 fs-14 rounded-0">{{ translate('Reset Password') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Go Back -->
                    <div class="mt-3 mr-4 mr-md-0">
                        <a href="{{ url()->previous() }}" class="ml-auto fs-14 fw-700 d-flex align-items-center text-primary" style="max-width: fit-content;">
                            <i class="las la-arrow-left fs-20 mr-1"></i>
                            {{ translate('Back to Previous Page')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Password Toggle Script -->
<script>
    document.querySelectorAll('.toggle-password').forEach(toggle => {
        toggle.addEventListener('click', function () {
            const input = document.querySelector(this.getAttribute('toggle'));
            const icon = this.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('la-eye-slash');
                icon.classList.add('la-eye');
            } else {
                input.type = 'password';
                icon.classList.add('la-eye-slash');
                icon.classList.remove('la-eye');
            }
        });
    });
</script>
