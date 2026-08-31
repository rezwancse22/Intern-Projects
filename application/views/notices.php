<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Notices | Bangladesh Bank Website Analytics</title>

    <link rel="stylesheet"
          href="<?php echo base_url('assets/css/notices.css'); ?>">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>


<body>


<!-- =========================================
     NAVBAR
========================================= -->

<nav class="navbar">

    <!-- BRAND -->

    <div class="brand">

        <img
            src="<?php echo base_url('assets/images/bangladesh-bank-logo.png'); ?>"
            alt="Bangladesh Bank Logo"
            class="logo">

        <div class="brand-text">

            <h1>Bangladesh Bank</h1>

            <p>Website Analytics System</p>

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

            <a href="<?php echo base_url('index.php/notices'); ?>"
               class="active">
                Notices
            </a>

            <a href="<?php echo base_url('index.php/contact'); ?>">
                Contact
            </a>

        </div>


        <!-- THEME BUTTON -->

        <button
            class="theme-btn"
            id="themeToggle">

            🌙

        </button>

    </div>

</nav>




<!-- =========================================
     NOTICE HERO
========================================= -->

<section class="notice-hero">

    <p class="section-tag">
        OFFICIAL NOTICES
    </p>

    <h1>
        Bangladesh Bank Notices
    </h1>

    <p>
        Stay updated with the latest notices, circulars,
        announcements and official documents.
    </p>

</section>



<!-- =========================================
     NOTICE SECTION
========================================= -->

<section class="notice-section">

    <div class="notice-container">


        <!-- NOTICE HEADER -->

        <div class="notice-header">

            <div>

                <p class="section-tag">
                    LATEST UPDATES
                </p>

                <h2>
                    Official Notices
                </h2>

                <p>
                    View and read the latest official notices
                    published by Bangladesh Bank.
                </p>

            </div>

        </div>



    

        <!-- =========================================
             NOTICE LIST
        ========================================= -->

        <div class="notice-list">


            <!-- NOTICE 1 -->

            <div class="notice-card">


                <div class="notice-file-icon">

                    <i class="fa-solid fa-file-pdf"></i>

                </div>


                <div class="notice-info">

                    <h3>
                        Bangladesh Bank Official Notice
                    </h3>

                    <p>
                        Important official announcement and
                        information from Bangladesh Bank.
                    </p>


                    <span class="notice-date">

                        <i class="fa-regular fa-calendar"></i>

                        20 August 2026

                    </span>

                </div>


                <div class="notice-action">

                    <a
                        href="#"
                        class="read-btn">

                        <i class="fa-solid fa-eye"></i>

                        View PDF

                    </a>

                </div>

            </div>



            <!-- NOTICE 2 -->

            <div class="notice-card">


                <div class="notice-file-icon">

                    <i class="fa-solid fa-file-pdf"></i>

                </div>


                <div class="notice-info">

                    <h3>
                        Important Circular Notice
                    </h3>

                    <p>
                        Latest circular and official announcement
                        for Bangladesh Bank website visitors.
                    </p>


                    <span class="notice-date">

                        <i class="fa-regular fa-calendar"></i>

                        18 August 2026

                    </span>

                </div>


                <div class="notice-action">

                    <a
                        href="#"
                        class="read-btn">

                        <i class="fa-solid fa-eye"></i>

                        View PDF

                    </a>

                </div>

            </div>



            <!-- NOTICE 3 -->

            <div class="notice-card">


                <div class="notice-file-icon">

                    <i class="fa-solid fa-file-pdf"></i>

                </div>


                <div class="notice-info">

                    <h3>
                        Financial Sector Announcement
                    </h3>

                    <p>
                        Latest information and important
                        financial sector announcement.
                    </p>


                    <span class="notice-date">

                        <i class="fa-regular fa-calendar"></i>

                        15 August 2026

                    </span>

                </div>


                <div class="notice-action">

                    <a
                        href="#"
                        class="read-btn">

                        <i class="fa-solid fa-eye"></i>

                        View PDF

                    </a>

                </div>

            </div>


        </div>


    </div>

</section>

<!-- NOTICE ANALYTICS -->
<section class="analytics-section">

    <div class="analytics-container">

        <div class="analytics-top">

            <div>
                <h1>Today's Notices Analytics</h1>

                <p>
                    Live overview of today's Notices page activity.
                </p>
            </div>

            <div class="date-box">
                <?php echo date('d F Y'); ?>
            </div>

        </div>

        <div class="analytics-line"></div>

        <div class="analytics-cards">

            <div class="analytics-card">

                <div class="analytics-icon">
                    <i class="fa-solid fa-eye"></i>
                </div>

                <div class="analytics-info">

                    <p>Today's Views</p>

                    <h2>
                        <?php
                        echo isset($today_views)
                            ? $today_views
                            : 0;
                        ?>
                    </h2>

                </div>

            </div>


            <div class="analytics-card">

                <div class="analytics-icon">
                    <i class="fa-solid fa-users"></i>
                </div>

                <div class="analytics-info">

                    <p>Today's Unique Visitors</p>

                    <h2>
                        <?php
                        echo isset($unique_visitors)
                            ? $unique_visitors
                            : 0;
                        ?>
                    </h2>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================================
     DARK MODE
========================================= -->

<script>

const themeButton =
    document.getElementById('themeToggle');


themeButton.addEventListener(
    'click',
    function () {

        document.body.classList.toggle(
            'dark-mode'
        );


        if (
            document.body.classList.contains(
                'dark-mode'
            )
        ) {

            themeButton.innerHTML = '☀️';

        }

        else {

            themeButton.innerHTML = '🌙';

        }

    }
);

</script>


</body>

</html>