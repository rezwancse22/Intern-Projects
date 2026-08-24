<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset Password | Bangladesh Bank</title>

    <link rel="stylesheet"
          href="<?php echo base_url('assets/css/reset_password.css'); ?>">

</head>

<body>


<div class="reset-password-page">

    <div class="reset-password-card">


        <!-- HEADER -->

        <div class="reset-password-header">

            <h2>Reset Password</h2>

            <p>
                Create a new password for your account
            </p>

        </div>


        <!-- RESET PASSWORD FORM -->

        <form action="<?php echo base_url('index.php/Reset_password'); ?>" method="post">


            <!-- NEW PASSWORD -->

            <div class="input-group password-group">

                <label for="new_password">

                    New Password

                </label>


                <div class="password-wrapper">

                    <input
                        type="password"
                        id="new_password"
                        name="new_password"
                        placeholder="Enter your new password"
                        required
                        minlength="8"
                        pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%&*]).{8,}"
                        title="Password must contain at least 8 characters, including uppercase, lowercase, number, and one symbol (!,@,#,$,%,&,*)">


                    <span
                        class="password-toggle"
                        onclick="togglePassword('new_password', this)">

                        👁️

                    </span>

                </div>

            </div>


            <!-- REWRITE PASSWORD -->

            <div class="input-group password-group">

                <label for="confirm_password">

                    Rewrite Password

                </label>


                <div class="password-wrapper">

                    <input
                        type="password"
                        id="confirm_password"
                        name="confirm_password"
                        placeholder="Rewrite your new password"
                        required
                        minlength="8"
                        pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%&*]).{8,}"
                        title="Password must contain at least 8 characters, including uppercase, lowercase, number, and one symbol (!,@,#,$,%,&,*)">


                    <span
                        class="password-toggle"
                        onclick="togglePassword('confirm_password', this)">

                        👁️

                    </span>

                </div>

            </div>


            <!-- ERROR MESSAGE -->

            <?php if ($this->session->flashdata('error')): ?>

                <div class="error-message">

                    <?php echo $this->session->flashdata('error'); ?>

                </div>

            <?php endif; ?>


            <!-- RESET BUTTON -->

            <button
                type="submit"
                class="reset-password-submit">

                Reset Password

            </button>


            <!-- BACK TO LOGIN -->

            <div class="back-login">

                <span>
                    Remember your password?
                </span>

                <a href="<?php echo base_url('index.php/login'); ?>">

                    Back to Login

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