<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Contact | Bangladesh Bank Website Analytics</title>

    <link
        rel="stylesheet"
        href="<?php echo base_url('assets/css/contact.css'); ?>"
    >

</head>


<body>


<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar">

    <!-- BRAND -->

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


    <!-- RIGHT NAVIGATION -->

    <div class="nav-right">

        <div class="nav-links">

            <a href="<?php echo base_url('index.php/home'); ?>">
                Home
            </a>

            <a href="<?php echo base_url('index.php/services'); ?>">
                Services
            </a>

            <a href="<?php echo base_url('index.php/about'); ?>">
                About
            </a>

            <a href="<?php echo base_url('index.php/notices'); ?>">
                Notices
            </a>

            <a
                href="<?php echo base_url('index.php/contact'); ?>"
                class="active"
            >
                Contact
            </a>

        </div>


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
     CONTACT HERO
========================= -->

<section class="contact-hero">

    <p class="section-tag">
        GET IN TOUCH
    </p>

    <h1>
        Contact Us
    </h1>

    <p class="contact-subtitle">
        Contact Bangladesh Bank for any information or assistance.
    </p>

</section>



<!-- =========================
     CONTACT SECTION
========================= -->

<section class="contact-section">

    <div class="contact-container">


        <!-- GOOGLE MAP -->

        <div class="map-box">

            <iframe
                src="https://www.google.com/maps?q=Bangladesh%20Bank%20Motijheel%20Dhaka&output=embed"
                width="100%"
                height="100%"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            >
            </iframe>

        </div>



        <!-- CONTACT INFO -->

        <div class="contact-info-box">

            <h2>
                CONTACT
            </h2>


            <div class="contact-item">

                <div class="contact-icon">
                    📍
                </div>

                <div>

                    <h3>
                        Address
                    </h3>

                    <p>
                        Bangladesh Bank, Motijheel, Dhaka
                    </p>

                </div>

            </div>



            <div class="contact-item">

                <div class="contact-icon">
                    ☎
                </div>

                <div>

                    <h3>
                        Phone
                    </h3>

                    <p>
                        +880-2-55665001-6
                    </p>

                </div>

            </div>



            <div class="contact-item">

                <div class="contact-icon">
                    ✉
                </div>

                <div>

                    <h3>
                        E-mail
                    </h3>

                    <p>
                        webmaster@bb.org.bd
                    </p>

                </div>

            </div>


        </div>


    </div>

</section>



<!-- =========================
     DARK / LIGHT MODE
========================= -->

<script>

    const themeButton =
        document.getElementById('themeButton');


    themeButton.addEventListener(
        'click',
        function()
        {
            document.body.classList.toggle('dark-mode');


            if (
                document.body.classList.contains('dark-mode')
            )
            {
                themeButton.innerHTML = '☀️';
            }
            else
            {
                themeButton.innerHTML = '🌙';
            }
        }
    );

</script>

<!-- =========================
     TODAY'S CONTACT ANALYTICS
========================= -->

<section class="analytics-section">

    <div class="analytics-container">

        <div class="analytics-top">

            <div>

                <h2>
                    Today's Contact Analytics
                </h2>

                <p>
                    Live overview of today's Contact page activity.
                </p>

            </div>


            <div class="date-box">

                <?php echo date(
                    'd F Y',
                    strtotime($analytics['date'])
                ); ?>

            </div>

        </div>

        

        <div class="analytics-cards">


            <!-- Today's Views -->

            <div class="analytics-card">

                <div class="card-icon">
                    👁
                </div>

                <div class="card-content">

                    <p>
                        Today's Views
                    </p>

                    <h3>
                        <?php echo $analytics['views']; ?>
                    </h3>

                </div>

            </div>



            <!-- Unique Visitors -->

            <div class="analytics-card">

                <div class="card-icon">
                    👥
                </div>

                <div class="card-content">

                    <p>
                        Today's Unique Visitors
                    </p>

                    <h3>
                        <?php echo $analytics['unique_visitors']; ?>
                    </h3>

                </div>

            </div>


        </div>

    </div>

</section>
</body>

</html>