<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot Password | Bangladesh Bank</title>

    <link rel="stylesheet"
          href="<?php echo base_url('assets/css/forgot_password.css'); ?>">

</head>

<body>


<div class="forgot-page">

    <div class="forgot-card">


        <!-- HEADER -->

        <div class="forgot-header">

            <h1>Forgot Password?</h1>

            <p>
                Enter your registered email address and we will help you reset your password.
            </p>

        </div>


        <!-- FORM -->

        <form action="<?php echo base_url('index.php/Reset_password'); ?>" method="post">

    <div class="input-group">
        <label for="email">Email Address</label>

        <input
            type="email"
            id="email"
            name="email"
            placeholder="Enter your registered email address"
            required>
    </div>

    <button type="submit" class="enter-btn">
        Enter
    </button>

</form>


            

            

            <!-- BACK TO LOGIN -->

            <div class="back-login">

                <span>
                    Remember your password?
                </span>

                <a href="<?php echo base_url('index.php/login'); ?>">

                    Login Here

                </a>

            </div>


        </form>


    </div>

</div>


</body>

</html>