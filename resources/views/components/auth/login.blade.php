<div class="blackout">
    <div class="signin">
        <button class="sign-in-close ms-auto mb-auto">
            <img src="{{ asset('img/icons/Cancel.svg') }}" alt="close" />
        </button>

        <div class="signin__content d-flex flex-column align-items-center mb-auto">
            <h4 class="signin__title h4 mb-5">Sign In</h4>

            <form class="signin__form d-flex flex-column mb-4">
                <input
                    class="signin__form_input sign-in-email mb-2"
                    type="text"
                    required
                    placeholder="Email or phone number"
                />
                <input
                    class="signin__form_input sign-in-password mb-3"
                    type="password"
                    required
                    placeholder="Password"
                />
                <button class="signin__form_btn sign-in-submit">
                    Log In
                </button>
            </form>

            <span class="signin__form_signup">New user?<a href="./signup.html" class="signin__form_signup-link">Sign up</a></span>
        </div>
    </div>
</div>
