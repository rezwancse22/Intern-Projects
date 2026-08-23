<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta 
        name="viewport" 
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Services | Bangladesh Bank Website Analytics
    </title>


    <link 
        rel="stylesheet" 
        href="<?php echo base_url('assets/css/services.css'); ?>"
    >

</head>


<body>


<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar">

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



    <div class="nav-links">

        <a href="<?php echo base_url('index.php/home'); ?>">
            Home
        </a>


        <a 
            href="<?php echo base_url('index.php/services'); ?>"
            class="active"
        >
            Services
        </a>


        <a href="<?php echo base_url('index.php/about'); ?>">
            About
        </a>


        <a href="#">
            Notices
        </a>


        <a href="<?php echo base_url('index.php/contact'); ?>">
            Contact
        </a>



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
     SERVICES HERO
========================= -->

<section class="services-hero">

    <span class="services-label">
        OUR SERVICES
    </span>


    <h1>
        Bangladesh Bank Services
    </h1>


    <p>
        Explore the key responsibilities and services of Bangladesh Bank
        in maintaining a stable, secure and inclusive financial system.
    </p>

</section>



<!-- =========================
     SERVICES SECTION
========================= -->

<section class="services-section">

    <div class="services-container">


        <!-- SERVICE 1 -->

        <div class="service-card">

            <div class="service-icon">
                🏦
            </div>


            <h2>
                Monetary Policy
            </h2>


            <p>
                Bangladesh Bank works to maintain price stability and support
                sustainable economic growth through effective monetary policies.
            </p>


            <p>
                These policies help manage inflation, money supply and overall
                financial stability across the country.
            </p>

        </div>



        <!-- SERVICE 2 -->

        <div class="service-card">

            <div class="service-icon">
                🛡️
            </div>


            <h2>
                Banking Regulation
            </h2>


            <p>
                Bangladesh Bank supervises and regulates banks and financial
                institutions to ensure a stable and transparent banking sector.
            </p>


            <p>
                It promotes proper governance, compliance and responsible
                financial practices throughout the industry.
            </p>

        </div>



        <!-- SERVICE 3 -->

        <div class="service-card">

            <div class="service-icon">
                💳
            </div>


            <h2>
                Payment Systems
            </h2>


            <p>
                Supporting secure, efficient and reliable payment and settlement
                systems for individuals and financial institutions.
            </p>


            <p>
                Bangladesh Bank also contributes to the development of modern
                digital financial services across the country.
            </p>

        </div>



        <!-- SERVICE 4 -->

        <div class="service-card">

            <div class="service-icon">
                💵
            </div>


            <h2>
                Currency Management
            </h2>


            <p>
                Bangladesh Bank manages the circulation and supply of currency
                to meet the country's financial requirements.
            </p>


            <p>
                It also promotes awareness about genuine banknotes and helps
                maintain confidence in the national currency.
            </p>

        </div>



        <!-- SERVICE 5 -->

        <div class="service-card">

            <div class="service-icon">
                🌍
            </div>


            <h2>
                Financial Inclusion
            </h2>


            <p>
                Bangladesh Bank works to expand access to formal financial
                services across different parts of Bangladesh.
            </p>


            <p>
                Special attention is given to underserved communities and the
                development of inclusive financial opportunities.
            </p>

        </div>



        <!-- SERVICE 6 -->

        <div class="service-card">

            <div class="service-icon">
                🤝
            </div>


            <h2>
                Customer Protection
            </h2>


            <p>
                Supporting customer complaint management and promoting
                financial consumer protection across the banking sector.
            </p>


            <p>
                These initiatives help customers receive fair treatment and
                encourage greater trust in financial services.
            </p>

        </div>


    </div>

</section>



<!-- =========================
     TODAY'S ANALYTICS
========================= -->

<section class="analytics-section">

    <div class="analytics-container">


        <!-- ANALYTICS HEADER -->

        <div class="analytics-top">

            <div>

                <h2>
                    Today's Services Analytics
                </h2>


                <p>
                    Live overview of today's Services page activity.
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

                    <p>
                        Today's Views
                    </p>


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
            document.body.classList.toggle(
                'dark-mode'
            );


            if (
                document.body.classList.contains(
                    'dark-mode'
                )
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