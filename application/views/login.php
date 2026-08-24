<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Bangladesh Bank</title>

    <link rel="stylesheet"
          href="<?php echo base_url('assets/css/login.css'); ?>">

</head>


<body>


<div class="login-page">


    <!-- LEFT SIDE -->

    <div class="login-left">


        <!-- BACK TO HOME -->

        <a href="<?php echo base_url('index.php/home'); ?>"
           class="back-home">

            Back to Home

        </a>


        <!-- BRAND -->

        <div class="brand">

            <img
                src="<?php echo base_url('assets/images/bangladesh-bank-logo.png'); ?>"
                alt="Bangladesh Bank Logo"
                class="bank-logo">


            <div class="brand-text">

                <h1>Bangladesh Bank</h1>

                <p>Website Analytics System</p>

            </div>

        </div>


        <!-- WELCOME CONTENT -->

        <div class="welcome-content">

            <h2>Welcome</h2>

            <p>

                Sign in to access the Bangladesh Bank Website Analytics Dashboard
                and manage website insights securely.

            </p>

        </div>


    </div>



    <!-- RIGHT SIDE -->

    <div class="login-right">


        <div class="login-card">


            <!-- LOGIN HEADER -->

            <div class="login-header">

                <h2>Login</h2>

                <p>
                    Enter your Email ID and password
                </p>

            </div>



            <!-- LOGIN FORM -->

            <form action="<?php echo base_url('index.php/Login'); ?>"
                  method="post">


                <!-- EMAIL -->

                <div class="input-group">

                    <label for="email">

                        Email

                    </label>


                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        required>

                </div>



                <!-- PASSWORD -->

                <div class="input-group password-group">

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


                        <!-- SHOW / HIDE PASSWORD -->

                        <span
                            class="password-toggle"
                            onclick="togglePassword('password', this)">

                            👁️

                        </span>


                    </div>

                </div>



                <!-- FORGOT PASSWORD -->

                <div class="forgot-password">

                    <a href="<?php echo base_url('index.php/forgot_password'); ?>">

                        Forgot Password?

                    </a>

                </div>



                <!-- LOGIN BUTTON -->

                <button
                    type="submit"
                    class="login-submit">

                    Login

                </button>



                <!-- REGISTER LINK -->

                <div class="register-link">

                    <span>

                        Don't have an account?

                    </span>


                    <a href="<?php echo base_url('index.php/register'); ?>">

                        Register Here

                    </a>

                </div>

                                        <?php if ($this->session->flashdata('error')): ?>

                        <div class="login-error">

                            <?php echo $this->session->flashdata('error'); ?>

                        </div>

                    <?php endif; ?>



             </form>


                                </div>


                            </div>


                        </div>



                        <!-- SHOW / HIDE PASSWORD SCRIPT -->

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