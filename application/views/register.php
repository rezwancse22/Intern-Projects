<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register | Bangladesh Bank</title>

    <link rel="stylesheet"
          href="<?php echo base_url('assets/css/register.css'); ?>">

</head>

<body>


<div class="register-page">


    <div class="register-card">


        <!-- HEADER -->

        <div class="register-header">

            <h2>Create Account</h2>

            <p>
                Please enter your information to register
            </p>

        </div>



        <!-- REGISTER FORM -->

        <form action="#" method="post">


            <!-- FULL NAME -->

            <div class="input-group">

                <label for="name">
                    Full Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Enter your full name"
                    required>

            </div>



            <!-- DATE OF BIRTH -->

            <div class="input-group">

                <label for="dob">
                    Date of Birth
                </label>

                <input
                    type="date"
                    id="dob"
                    name="dob"
                    required>

            </div>



            <!-- PHONE NUMBER -->

            <div class="input-group">

                <label for="phone">
                    Phone Number
                </label>

                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    placeholder="Enter your 11 digit phone number"
                    required>

            </div>



            <!-- EMAIL -->

            <div class="input-group">

                <label for="email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your email address"
                    required>

            </div>



            <!-- PASSWORD -->

            <div class="input-group">

                <label for="password">
                    Password
                </label>

                <div class="password-wrapper">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        required>

                    <span
                        class="password-toggle"
                        onclick="togglePassword('password', this)">

                        👁️

                    </span>

                </div>

            </div>



            <!-- REWRITE PASSWORD -->

            <div class="input-group">

                <label for="confirm_password">
                    Rewrite Password
                </label>

                <div class="password-wrapper">

                    <input
                        type="password"
                        id="confirm_password"
                        name="confirm_password"
                        placeholder="Rewrite your password"
                        required>

                    <span
                        class="password-toggle"
                        onclick="togglePassword('confirm_password', this)">

                        👁️

                    </span>

                </div>

            </div>



            <!-- REGISTER BUTTON -->

            <button
                type="submit"
                class="register-submit">

                Register

            </button>



            <!-- LOGIN LINK -->

            <div class="login-link">

                <span>
                    Already have an account?
                </span>

                <a href="<?php echo base_url('index.php/login'); ?>">

                    Login Here

                </a>

            </div>


        </form>


    </div>


</div>



<script>

    function togglePassword(inputId, icon) {

        const passwordInput =
            document.getElementById(inputId);


        if (passwordInput.type === "password") {

            passwordInput.type = "text";

            icon.textContent = "🙈";

        } else {

            passwordInput.type = "password";

            icon.textContent = "👁️";

        }

    }

</script>


</body>

</html>