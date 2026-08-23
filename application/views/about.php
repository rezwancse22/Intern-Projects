<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About | Bangladesh Bank Website Analytics</title>

    <link
        rel="stylesheet"
        href="<?php echo base_url('assets/css/about.css'); ?>"
    >

</head>

<body>


<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar">

    <!-- LEFT SIDE -->

    <div class="brand">

        <img
            src="<?php echo base_url('assets/images/bangladesh-bank-logo.png'); ?>"
            alt="Bangladesh Bank Logo"
            class="logo"
        >

        <div class="brand-text">

            <h2>Bangladesh Bank</h2>

            <p>Website Analytics System</p>

        </div>

    </div>


    <!-- RIGHT SIDE -->

    <div class="nav-right">

        <div class="nav-links">

            <a href="<?php echo site_url('home'); ?>">
                Home
            </a>

            <a href="<?php echo site_url('services'); ?>">
                Services
            </a>

            <a
                href="<?php echo site_url('about'); ?>"
                class="active"
            >
                About
            </a>

            <a href="<?php echo site_url('notices'); ?>">
                Notices
            </a>

            <a href="<?php echo site_url('contact'); ?>">
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
     ABOUT SECTION
========================= -->

<section class="about-section">

    <div class="about-container">


        <!-- ESTABLISHMENT -->

        <div class="about-block">

            <h2>Establishment</h2>

            <p>
                Bangladesh Bank, the central bank and apex regulatory body
                for the country's monetary and financial system, was
                established in Dhaka as a body corporate vide the Bangladesh
                Bank Order, 1972 (P.O. No. 127 of 1972) with effect from
                16th December, 1971. At present it has ten offices located
                at Motijheel, Sadarghat, Chittagong, Khulna, Bogra, Rajshahi,
                Sylhet, Barisal, Rangpur and Mymensingh in Bangladesh;
                total manpower stood at 5807 (officials 3981, subordinate
                staff 1826) as on March 31, 2015.
            </p>

        </div>


        <!-- FUNCTIONS -->

        <div class="about-block functions-block">

            <h2>Functions</h2>

            <p>
                BB performs all the core functions of a typical monetary and
                financial sector regulator, and a number of other non core
                functions. The major functional areas include:
            </p>


            <ul>

                <li>
                    Formulation and implementation of monetary and credit policies.
                </li>

                <li>
                    Regulation and supervision of banks and non-bank financial
                    institutions, promotion and development of domestic
                    financial markets.
                </li>

                <li>
                    Management of the country's international reserves.
                </li>

                <li>
                    Issuance of currency notes.
                </li>

                <li>
                    Regulation and supervision of the payment system.
                </li>

                <li>
                    Acting as banker to the government.
                </li>

                <li>
                    Money laundering prevention.
                </li>

                <li>
                    Collection and furnishing of credit information.
                </li>

                <li>
                    Implementation of the Foreign Exchange Regulation Act.
                </li>

                <li>
                    Managing a deposit insurance scheme.
                </li>

            </ul>

        </div>

    </div>

</section>


<!-- =========================
     TODAY'S ABOUT ANALYTICS
========================= -->

<section class="analytics-section">

    <div class="analytics-container">


        <div class="analytics-top">

            <div>

                <h2>Today's About Analytics</h2>

                <p>
                    Live overview of today's About page activity.
                </p>

            </div>


            <div class="date-box">

                <?php
                    echo date(
                        'd F Y',
                        strtotime($analytics['date'])
                    );
                ?>

            </div>

        </div>


        <!-- ANALYTICS CARDS -->

        <div class="analytics-cards">


            <!-- TODAY'S VIEWS -->

            <div class="analytics-card">

                <div class="card-icon">
                    👁
                </div>

                <div class="card-content">

                    <p>Today's Views</p>

                    <h3>
                        <?php echo $analytics['views']; ?>
                    </h3>

                </div>

            </div>


            <!-- UNIQUE VISITORS -->

            <div class="analytics-card">

                <div class="card-icon">
                    👥
                </div>

                <div class="card-content">

                    <p>Today's Unique Visitors</p>

                    <h3>
                        <?php echo $analytics['unique_visitors']; ?>
                    </h3>

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


</body>

</html>