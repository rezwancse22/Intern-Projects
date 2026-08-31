<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Bangladesh Bank | Website Analytics
    </title>


    <!-- Main CSS -->
    <link
        rel="stylesheet"
        href="<?php echo base_url('assets/css/style.css'); ?>"
    >


    <!-- Home Page CSS -->
    <link
        rel="stylesheet"
        href="<?php echo base_url('assets/css/home.css'); ?>"
    >

</head>


<body>


<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar">


    <!-- Logo and Website Name -->

    <div class="brand">

        <img
            src="<?php echo base_url('assets/images/bangladesh-bank-logo.png'); ?>"
            alt="Bangladesh Bank Logo"
            class="logo"
        >


        <div class="brand-text">

            <h2>
                Bangladesh Bank
            </h2>


            <p>
                Website Analytics System
            </p>

        </div>

    </div>



    <!-- Navigation Area -->

    <div class="nav-right">


        <!-- Navigation Links -->

        <div class="nav-links">

            <a
                href="<?php echo base_url('index.php/home'); ?>"
                class="active"
            >
                Home
            </a>


            <a
                href="<?php echo base_url('index.php/services'); ?>"
            >
                Services
            </a>


            <a
                href="<?php echo base_url('index.php/about'); ?>"
            >
                About
            </a>


                        <a
                    href="<?php echo base_url('index.php/notices'); ?>"
                >
                    Notices
                </a>


            <a
                href="<?php echo base_url('index.php/contact'); ?>"
            >
                Contact
            </a>

        </div>



        <!-- Dark / Light Mode Button -->

        <button
            id="themeButton"
            class="theme-btn"
            type="button"
        >
            🌙
        </button>

    </div>

</nav>



<!-- =========================
     HERO SECTION
========================= -->

<section class="hero">


    <div class="hero-content">


        <!-- =========================
             LEFT SIDE
        ========================== -->

        <div class="hero-text">


            <span class="welcome-text">
                WELCOME TO
            </span>


            <h1>

                Bangladesh Bank

                <span>
                    Website Analytics System
                </span>

            </h1>


            <p>

                Monitor website activity, analyze page views,
                track unique visitors and gain valuable insights
                into how users interact with the website.

            </p>



            <!-- =========================
                 HERO BUTTONS
            ========================== -->

            <div class="hero-buttons">


                <!-- LOGIN -->

               <a href="<?php echo base_url('index.php/login'); ?>" class="login-btn">
    Login
            </a>

            

            </div>


        </div>



        <!-- =========================
             RIGHT SIDE LOGO CARD
        ========================== -->

        <div class="hero-visual">


            <div class="logo-card">


                <img
                    src="<?php echo base_url('assets/images/bangladesh-bank-logo.png'); ?>"
                    alt="Bangladesh Bank Logo"
                >


                <h2>
                    Website Analytics
                </h2>


                <p>
                    Track. Analyze. Understand.
                </p>


            </div>


        </div>


    </div>


</section>



<!-- =========================
     TODAY'S ANALYTICS
========================= -->

<section
    class="analytics-section"
    id="analytics"
>


    <!-- SECTION HEADING -->

    <div class="section-heading">


        <span>
            ANALYTICS OVERVIEW
        </span>


        <h2>
            Today's Analytics
        </h2>


        <p>
            Monitor today's website performance and visitor activity.
        </p>


    </div>



    <!-- ANALYTICS CONTAINER -->

    <div class="analytics-container">


        <!-- =========================
             ANALYTICS TOP
        ========================== -->

        <div class="analytics-top">


            <div>


                <h2>
                    Today's Website Performance
                </h2>


                <p>
                    Live overview of website activity.
                </p>


            </div>



            <!-- DATE -->

            <div
                class="date-box"
                id="currentDate"
            >

                <?php
                    echo date(
                        'F j, Y',
                        strtotime($analytics['date'])
                    );
                ?>

            </div>


        </div>



        <!-- =========================
             ANALYTICS CARDS
        ========================== -->

        <div class="analytics-cards">


            <!-- TODAY'S VIEWS -->

            <div class="analytics-card">


                <div class="card-icon">
                    👁
                </div>


                <div class="card-content">


                    <p>
                        Today's Views
                    </p>


                    <h3 id="todayViews">

                        <?php
                            echo $analytics['views'];
                        ?>

                    </h3>


                </div>


            </div>



            <!-- UNIQUE VISITORS -->

            <div class="analytics-card">


                <div class="card-icon">
                    👥
                </div>


                <div class="card-content">


                    <p>
                        Today's Unique Visitors
                    </p>


                    <h3 id="uniqueVisitors">

                        <?php
                            echo $analytics['unique_visitors'];
                        ?>

                    </h3>


                </div>


            </div>


        </div>


    </div>


</section>



<!-- =========================
     JAVASCRIPT
========================= -->

<script>

document.addEventListener(
    'DOMContentLoaded',
    function ()
    {

        const themeButton =
            document.getElementById(
                'themeButton'
            );


        themeButton.addEventListener(
            'click',
            function ()
            {

                document.body.classList.toggle(
                    'dark-mode'
                );


                if (
                    document.body.classList.contains(
                        'dark-mode'
                    )
                )
                {

                    themeButton.innerHTML =
                        '☀️';

                }

                else
                {

                    themeButton.innerHTML =
                        '🌙';

                }

            }
        );

    }
);

</script>


</body>

</html>