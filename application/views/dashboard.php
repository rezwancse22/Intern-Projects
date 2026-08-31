<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Bangladesh Bank</title>

    <link
        rel="stylesheet"
        href="<?php echo base_url('assets/css/dashboard.css'); ?>">

</head>


<body>


<!-- =====================================================
     DASHBOARD HEADER
===================================================== -->

<div class="dashboard-header">

    <div>

        <h1>
            Bangladesh Bank Analytics Dashboard
        </h1>

        <p>
            Website Analytics & Visitor Monitoring System
        </p>

    </div>


    <div class="header-user">

        Welcome,

        <strong>

            <?php

            echo htmlspecialchars(
                $this->session->userdata('full_name')
            );

            ?>

        </strong>

    </div>


    <a
        href="<?php echo base_url('index.php/login'); ?>"
        class="logout-btn">

        Logout

    </a>

</div>



<!-- =====================================================
     DASHBOARD LAYOUT
===================================================== -->

<div class="dashboard-layout">


    <!-- =================================================
         SIDEBAR
    ================================================= -->

    <div class="sidebar">


        <!-- OVERALL -->

        <button
            class="sidebar-btn active"
            onclick="showSection('overall', this)">

            📊 Overall

        </button>


        <!-- PAGE ANALYTICS -->

        <button
            class="sidebar-btn"
            onclick="showSection('page-analytics', this)">

            🔎 Page Analytics

        </button>


        <!-- PAGE STATISTICS -->

        <button
            class="sidebar-btn"
            onclick="showSection('page-statistics', this)">

            📈 Page Statistics

        </button>


        <!-- VISITOR TRACKING -->

        <button
            class="sidebar-btn"
            onclick="showSection('visitor-tracking', this)">

            👁 Visitor Tracking

        </button>


        <!-- VISITOR HISTORY -->

        <button
            class="sidebar-btn"
            onclick="showSection('visitor-history', this)">

            📋 Visitor History

        </button>


        <!-- USERS -->

        <button
            class="sidebar-btn"
            onclick="showSection('users', this)">

            👥 Users

        </button>


        <!-- LOGIN HISTORY -->

        <button
            class="sidebar-btn"
            onclick="showSection('login-history', this)">

            🔐 Login History

        </button>


        <!-- NOTICES -->

        <button
            class="sidebar-btn"
            onclick="showSection('notices', this)">

            📄 Notices

        </button>


    </div>



    <!-- =================================================
         MAIN CONTENT
    ================================================= -->

    <div class="dashboard-content">



        <!-- =================================================
             OVERALL
        ================================================= -->

        <div
            id="overall"
            class="dashboard-section active-section">


            <div class="section-title">

                <h2>
                    Overall Dashboard
                </h2>

                <p>
                    Website Analytics Overview
                </p>

            </div>



            <div class="summary-grid">


                <!-- TOTAL USERS -->

                <div class="summary-card">

                    <h3>
                        Total Registered Users
                    </h3>

                    <div class="number">

                        <?php

                        echo $total_users;

                        ?>

                    </div>

                </div>



                <!-- TOTAL VISITS -->

                <div class="summary-card">

                    <h3>
                        Total Page Visits
                    </h3>

                    <div class="number">

                        <?php

                        echo $total_visits;

                        ?>

                    </div>

                </div>



                <!-- UNIQUE VISITORS -->

                <div class="summary-card">

                    <h3>
                        Unique Visitors
                    </h3>

                    <div class="number">

                        <?php

                        echo $unique_visitors;

                        ?>

                    </div>

                </div>



                <!-- TODAY'S VISITS -->

                <div class="summary-card">

                    <h3>
                        Today's Visits
                    </h3>

                    <div class="number">

                        <?php

                        echo $today_visits;

                        ?>

                    </div>

                </div>



                <!-- MOST VISITED PAGE -->

                <div class="summary-card">

                    <h3>
                        Most Visited Page
                    </h3>

                    <div class="page-name">

                        <?php

                        if ($most_visited_page)
                        {

                            echo htmlspecialchars(
                                $most_visited_page->page_name
                            );

                        }
                        else
                        {

                            echo "No Data";

                        }

                        ?>

                    </div>

                </div>


            </div>


        </div>



        <!-- =================================================
             PAGE ANALYTICS
        ================================================= -->

        <div
            id="page-analytics"
            class="dashboard-section">


            <!-- PAGE ANALYTICS TITLE -->

            <div class="section-title">

                <h2>
                    Page Analytics
                </h2>

                <p>
                    Analytics data retrieved from API
                </p>

            </div>



            <!-- =================================================
                 FILTER
            ================================================= -->

            <div class="analytics-filter">


                <!-- SELECT PAGE -->

                <div class="filter-group">

                    <label for="pageFilter">
                        Select Page
                    </label>


                    <select id="pageFilter">

                        <option value="/home">
                            Home
                        </option>

                        <option value="/about">
                            About
                        </option>

                        <option value="/services">
                            Services
                        </option>

                        <option value="/contact">
                            Contact
                        </option>

                        <option value="/login">
                            Login
                        </option>

                        <option value="/register">
                            Register
                        </option>

                        <option value="/forgot_password">
                            Forgot Password
                        </option>

                        <option value="/reset_password">
                            Reset Password
                        </option>

                        <option value="/notices">
                            Notices
                        </option>

                    </select>

                </div>



                <!-- START DATE -->

                <div class="filter-group">

                    <label for="startDate">
                        Start Date
                    </label>


                    <input
                        type="date"
                        id="startDate">

                </div>



                <!-- END DATE -->

                <div class="filter-group">

                    <label for="endDate">
                        End Date
                    </label>


                    <input
                        type="date"
                        id="endDate">

                </div>



                <!-- SORT -->

                <div class="filter-group">

                    <label for="analyticsSort">
                        Sort
                    </label>


                    <select id="analyticsSort">

                        <option value="desc">
                            Descending
                        </option>

                        <option value="asc">
                            Ascending
                        </option>

                    </select>

                </div>



                <!-- BUTTONS -->

                <div class="filter-buttons">


                    <button
                        type="button"
                        class="filter-btn"
                        onclick="applyAnalyticsFilter()">

                        Filter

                    </button>


                    <button
                        type="button"
                        class="reset-btn"
                        onclick="resetAnalyticsFilter()">

                        Reset

                    </button>


                </div>


            </div>



            <!-- =================================================
                 API REQUEST PREVIEW
            ================================================= -->

            <div
                class="api-preview"
                id="apiPreview">


                <strong>
                    API Request:
                </strong>


                <span>
                    Select a filter and click Filter.
                </span>


            </div>



            <!-- =================================================
                 API SUMMARY CARDS
            ================================================= -->

            <div class="summary-grid">


                <!-- TOTAL VIEWS -->

                <div class="summary-card">

                    <h3>
                        Total Views
                    </h3>


                    <div
                        class="number"
                        id="analyticsTotalViews">

                        0

                    </div>

                </div>



                <!-- UNIQUE VISITORS -->

                <div class="summary-card">

                    <h3>
                        Unique Visitors
                    </h3>


                    <div
                        class="number"
                        id="analyticsUniqueVisitors">

                        0

                    </div>

                </div>



                <!-- SELECTED PAGE -->

                <div class="summary-card">

                    <h3>
                        Selected Page
                    </h3>


                    <div
                        class="page-name"
                        id="analyticsSelectedPage">

                        Home

                    </div>

                </div>



                <!-- DATE RANGE -->

                <div class="summary-card">

                    <h3>
                        Date Range
                    </h3>


                    <div
                        class="page-name"
                        id="analyticsSelectedRange">

                        All Data

                    </div>

                </div>


            </div>



            <!-- =================================================
                 API DATA TABLE
            ================================================= -->

            <div class="table-section">


                <h2>
                    Page Analytics Data
                </h2>


                <table>


                    <thead>

                        <tr>

                            <th>
                                Date
                            </th>

                            <th>
                                Page URL
                            </th>

                            <th>
                                Views
                            </th>

                            <th>
                                Unique Visitors
                            </th>

                        </tr>

                    </thead>


                    <tbody id="analyticsTable">


                        <tr>

                            <td
                                colspan="4"
                                class="empty-data">

                                Click Filter to load API data.

                            </td>

                        </tr>


                    </tbody>


                </table>


            </div>


        </div>



        <!-- =================================================
             PAGE STATISTICS
        ================================================= -->

        <div
            id="page-statistics"
            class="dashboard-section">


            <div class="table-section">


                <h2>
                    Page Statistics
                </h2>


                <table>


                    <thead>

                        <tr>

                            

                            <th>
                                Page Name
                            </th>

                            <th>
                                Page URL
                            </th>

                            <th>
                                Date
                            </th>

                            <th>
                                Total Views
                            </th>

                            <th>
                                Unique Visitors
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        <?php

                        if (!empty($page_statistics))
                        {

                        ?>


                            <?php

                            foreach (
                                $page_statistics
                                as $page
                            )
                            {

                            ?>


                                <tr>


                                    


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $page->page_name
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $page->page_url
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $page->stats_date
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $page->total_views
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $page->unique_visitors
                                        );

                                        ?>

                                    </td>


                                </tr>


                            <?php

                            }

                            ?>


                        <?php

                        }
                        else
                        {

                        ?>


                            <tr>

                                <td
                                    colspan="6"
                                    class="empty-data">

                                    No page statistics available.

                                </td>

                            </tr>


                        <?php

                        }

                        ?>


                    </tbody>


                </table>


            </div>


        </div>



        <!-- =================================================
             VISITOR TRACKING
        ================================================= -->

        <div
            id="visitor-tracking"
            class="dashboard-section">


            <div class="table-section">


                <h2>
                    Visitor Tracking
                </h2>


                <table>


                    <thead>

                        <tr>

                            

                            <th>
                                Page URL
                            </th>

                            <th>
                                Page Name
                            </th>

                            <th>
                                IP Address
                            </th>

                            <th>
                                Visit Date
                            </th>

                            <th>
                                Visit Time
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        <?php

                        if (!empty($visitor_tracking))
                        {

                        ?>


                            <?php

                            foreach (
                                $visitor_tracking
                                as $visitor
                            )
                            {

                            ?>


                                <tr>


                                    


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $visitor->page_url
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $visitor->page_name
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $visitor->ip_address
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $visitor->visit_date
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $visitor->visit_time
                                        );

                                        ?>

                                    </td>


                                </tr>


                            <?php

                            }

                            ?>


                        <?php

                        }
                        else
                        {

                        ?>


                            <tr>

                                <td
                                    colspan="6"
                                    class="empty-data">

                                    No visitor tracking data available.

                                </td>

                            </tr>


                        <?php

                        }

                        ?>


                    </tbody>


                </table>


            </div>


        </div>



        <!-- =================================================
             VISITOR HISTORY
        ================================================= -->

        <div
            id="visitor-history"
            class="dashboard-section">


            <div class="table-section">


                <h2>
                    Visitor History
                </h2>


                <table>


                    <thead>

                        <tr>

                            

                            <th>
                                IP Address
                            </th>

                            <th>
                                Page URL
                            </th>

                            <th>
                                Page Name
                            </th>

                            <th>
                                Created At
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        <?php

                        if (!empty($visitor_history))
                        {

                        ?>


                            <?php

                            foreach (
                                $visitor_history
                                as $history
                            )
                            {

                            ?>


                                <tr>


                                    


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $history->ip_address
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $history->page_url
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $history->page_name
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $history->created_at
                                        );

                                        ?>

                                    </td>


                                </tr>


                            <?php

                            }

                            ?>


                        <?php

                        }
                        else
                        {

                        ?>


                            <tr>

                                <td
                                    colspan="5"
                                    class="empty-data">

                                    No visitor history available.

                                </td>

                            </tr>


                        <?php

                        }

                        ?>


                    </tbody>


                </table>


            </div>


        </div>



        <!-- =================================================
             USERS
        ================================================= -->

        <div
            id="users"
            class="dashboard-section">


            <div class="table-section">


                <h2>
                    Registered Users
                </h2>


                <table>


                    <thead>

                        <tr>

                            

                            <th>
                                Full Name
                            </th>

                            <th>
                                Date of Birth
                            </th>

                            <th>
                                Phone
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Created At
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        <?php

                        if (!empty($users))
                        {

                        ?>


                            <?php

                            foreach (
                                $users
                                as $user
                            )
                            {

                            ?>


                                <tr>


                                    


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $user->full_name
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $user->date_of_birth
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $user->phone
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $user->email
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $user->created_at
                                        );

                                        ?>

                                    </td>


                                </tr>


                            <?php

                            }

                            ?>


                        <?php

                        }
                        else
                        {

                        ?>


                            <tr>

                                <td
                                    colspan="6"
                                    class="empty-data">

                                    No registered users found.

                                </td>

                            </tr>


                        <?php

                        }

                        ?>


                    </tbody>


                </table>


            </div>


        </div>



        <!-- =================================================
             LOGIN HISTORY
        ================================================= -->

        <div
            id="login-history"
            class="dashboard-section">


            <div class="table-section">


                <h2>
                    Login History
                </h2>


                <table>


                    <thead>

                        <tr>

                            
                            <th>
                                User Name
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Login Date
                            </th>

                            <th>
                                Login Time
                            </th>

                            <th>
                                IP Address
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        <?php

                        if (!empty($login_history))
                        {

                        ?>


                            <?php

                            foreach (
                                $login_history
                                as $login
                            )
                            {

                            ?>


                                <tr>


                                    


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $login->full_name
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $login->email
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $login->login_date
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $login->login_time
                                        );

                                        ?>

                                    </td>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $login->ip_address
                                        );

                                        ?>

                                    </td>


                                </tr>


                            <?php

                            }

                            ?>


                        <?php

                        }
                        else
                        {

                        ?>


                            <tr>

                                <td
                                    colspan="6"
                                    class="empty-data">

                                    No login history available.

                                </td>

                            </tr>


                        <?php

                        }

                        ?>


                    </tbody>


                </table>


            </div>


        </div>





        <!-- =================================================
     NOTICES
================================================= -->

<div
    id="notices"
    class="dashboard-section">


    <div class="table-section">


        <h2>
            Notices
        </h2>


        <!-- =================================================
             SUCCESS MESSAGE
        ================================================= -->

        <?php if ($this->session->flashdata('upload_success')): ?>

            <div class="notice-success">

                <?php
                echo htmlspecialchars(
                    $this->session->flashdata('upload_success')
                );
                ?>

            </div>

        <?php endif; ?>


        <!-- =================================================
             ERROR MESSAGE
        ================================================= -->

        <?php if ($this->session->flashdata('upload_error')): ?>

            <div class="notice-error">

                <?php
                echo htmlspecialchars(
                    $this->session->flashdata('upload_error')
                );
                ?>

            </div>

        <?php endif; ?>


        <!-- =================================================
             UPLOAD NOTICE
        ================================================= -->

        <div class="notice-upload-box">


            <div class="notice-upload-info">

                <div class="pdf-icon">
                    📄
                </div>


                <div>

                    <h3>
                        Upload New Notice
                    </h3>

                    <p>
                        Select a PDF document to publish a new official notice.
                    </p>

                </div>

            </div>



            <form
                action="<?php echo base_url('index.php/dashboard/upload_notice'); ?>"
                method="POST"
                enctype="multipart/form-data"
                class="notice-upload-form">


                <input
                    type="file"
                    name="notice_pdf"
                    accept="application/pdf"
                    required>


                <button
                    type="submit"
                    class="filter-btn">

                    ⬆ Upload PDF

                </button>


            </form>


        </div>



        <!-- =================================================
             UPLOADED NOTICES
        ================================================= -->

        <div class="notice-list">


            <?php if (!empty($notices)): ?>


                <?php foreach ($notices as $notice): ?>


                    <div class="notice-item">


                        <div class="notice-item-left">


                            <div class="pdf-icon">
                                📄
                            </div>


                            <div class="notice-details">


                                <h3>

                                    <?php

                                    echo htmlspecialchars(
                                        $notice->title
                                    );

                                    ?>

                                </h3>


                                <p>

                                    <?php

                                    echo htmlspecialchars(
                                        $notice->description
                                    );

                                    ?>

                                </p>


                                <small>

                                    <?php

                                    echo htmlspecialchars(
                                        $notice->notice_date
                                    );

                                    ?>

                                </small>


                            </div>


                        </div>



                        <div class="notice-item-right">


                            <a
                                href="<?php echo base_url('assets/uploads/notices/' . $notice->pdf_file); ?>"
                                target="_blank"
                                class="filter-btn">


                                👁 Read PDF


                            </a>


                        </div>


                    </div>


                <?php endforeach; ?>


            <?php else: ?>


                <p class="empty-data">

                    No notices uploaded yet.

                </p>


            <?php endif; ?>


        </div>


    </div>


</div>
<!-- =====================================================
     SIDEBAR JAVASCRIPT
===================================================== -->

<script>

function showSection(sectionId, button)
{

    /*
     * Hide all sections
     */

    document
        .querySelectorAll('.dashboard-section')
        .forEach(function(section)
        {

            section.classList.remove(
                'active-section'
            );

        });


    /*
     * Remove active from all buttons
     */

    document
        .querySelectorAll('.sidebar-btn')
        .forEach(function(btn)
        {

            btn.classList.remove('active');

        });


    /*
     * Show selected section
     */

    document
        .getElementById(sectionId)
        .classList.add(
            'active-section'
        );


    /*
     * Active sidebar button
     */

    button.classList.add('active');

}

</script>



<!-- =====================================================
     PAGE ANALYTICS JAVASCRIPT
===================================================== -->

<script>


/* =====================================================
   HTML ESCAPE
===================================================== */

function escapeHtml(value)
{

    return String(value)

        .replace(
            /&/g,
            '&amp;'
        )

        .replace(
            /</g,
            '&lt;'
        )

        .replace(
            />/g,
            '&gt;'
        )

        .replace(
            /"/g,
            '&quot;'
        )

        .replace(
            /'/g,
            '&#039;'
        );

}



/* =====================================================
   LOAD API DATA
===================================================== */

function loadAnalyticsData(result)
{

    const table =
        document.getElementById(
            'analyticsTable'
        );


    let totalViews = 0;

    let totalUniqueVisitors = 0;


    /*
     * Clear table
     */

    table.innerHTML = '';



    /*
     * No data
     */

    if (
        !result ||
        !result.data ||
        result.data.length === 0
    )
    {

        table.innerHTML =
            '<tr>' +

            '<td ' +
            'colspan="4" ' +
            'class="empty-data">' +

            'No data found for the selected page/date.' +

            '</td>' +

            '</tr>';


        document.getElementById(
            'analyticsTotalViews'
        ).innerText = '0';


        document.getElementById(
            'analyticsUniqueVisitors'
        ).innerText = '0';


        return;

    }



    /*
     * Load each API row
     */

    result.data.forEach(function(item)
    {


        totalViews +=
            Number(item.views) || 0;


        totalUniqueVisitors +=
            Number(item.uniqueVisitors) || 0;



        const row =
            document.createElement('tr');



        row.innerHTML =

            '<td>' +

            escapeHtml(
                item.date
            ) +

            '</td>' +


            '<td>' +

            escapeHtml(
                item.pageUrl
            ) +

            '</td>' +


            '<td>' +

            escapeHtml(
                item.views
            ) +

            '</td>' +


            '<td>' +

            escapeHtml(
                item.uniqueVisitors
            ) +

            '</td>';



        table.appendChild(row);

    });



    /*
     * Update summary cards
     */

    document.getElementById(
        'analyticsTotalViews'
    ).innerText =
        totalViews;


    document.getElementById(
        'analyticsUniqueVisitors'
    ).innerText =
        totalUniqueVisitors;

}



/* =====================================================
   APPLY ANALYTICS FILTER
===================================================== */

function applyAnalyticsFilter()
{

    const page =
        document.getElementById(
            'pageFilter'
        ).value;


    const startDate =
        document.getElementById(
            'startDate'
        ).value;


    const endDate =
        document.getElementById(
            'endDate'
        ).value;



    /*
     * Validate date range
     */

    if (
        (startDate && !endDate) ||
        (!startDate && endDate)
    )
    {

        alert(
            'Please select both Start Date and End Date.'
        );

        return;

    }



    /*
     * Check start > end
     */

    if (
        startDate &&
        endDate &&
        startDate > endDate
    )
    {

        alert(
            'Start Date cannot be after End Date.'
        );

        return;

    }



    /*
     * Build API URL
     */

    let apiUrl =
        '<?php echo base_url("index.php/api/page_stats"); ?>' +

        '?page=' +

        encodeURIComponent(page);



    /*
     * Add date range
     */

    if (
        startDate &&
        endDate
    )
    {

        apiUrl +=

            '&start_date=' +

            encodeURIComponent(
                startDate
            ) +

            '&end_date=' +

            encodeURIComponent(
                endDate
            );

    }



    /*
     * Show API URL
     */

    document.getElementById(
        'apiPreview'
    ).innerHTML =

        '<strong>API Request:</strong> ' +

        '<span>' +

        escapeHtml(apiUrl) +

        '</span>';



    /*
     * Get page name
     */

    let pageName =
        page.replace(
            '/',
            ''
        );


    pageName =
        pageName.replace(
            /_/g,
            ' '
        );


    pageName =
        pageName.charAt(0).toUpperCase() +
        pageName.slice(1);



    document.getElementById(
        'analyticsSelectedPage'
    ).innerText =
        pageName;



    /*
     * Show date range
     */

    if (
        startDate &&
        endDate
    )
    {

        document.getElementById(
            'analyticsSelectedRange'
        ).innerText =

            startDate +
            ' to ' +
            endDate;

    }
    else
    {

        document.getElementById(
            'analyticsSelectedRange'
        ).innerText =
            'All Data';

    }



    /*
     * Loading message
     */

    document.getElementById(
        'analyticsTable'
    ).innerHTML =

        '<tr>' +

        '<td ' +
        'colspan="4" ' +
        'class="empty-data">' +

        'Loading data...' +

        '</td>' +

        '</tr>';



    /*
     * API CALL
     */

    fetch(apiUrl)

        .then(function(response)
        {

            if (!response.ok)
            {

                throw new Error(
                    'HTTP Error: ' +
                    response.status
                );

            }


            return response.json();

        })


        .then(function(result)
        {

            console.log(
                'API Response:',
                result
            );


            if (result.error)
            {

                throw new Error(
                    result.error.message ||
                    'API returned an error.'
                );

            }


            loadAnalyticsData(
                result
            );

        })


        .catch(function(error)
        {

            console.error(
                'API Error:',
                error
            );


            document.getElementById(
                'analyticsTable'
            ).innerHTML =

                '<tr>' +

                '<td ' +
                'colspan="4" ' +
                'class="empty-data">' +

                'Failed to load API data.' +

                '</td>' +

                '</tr>';


            document.getElementById(
                'analyticsTotalViews'
            ).innerText = '0';


            document.getElementById(
                'analyticsUniqueVisitors'
            ).innerText = '0';

        });

}



/* =====================================================
   RESET ANALYTICS FILTER
===================================================== */

function resetAnalyticsFilter()
{

    /*
     * Reset page
     */

    document.getElementById(
        'pageFilter'
    ).value =
        '/home';



    /*
     * Reset dates
     */

    document.getElementById(
        'startDate'
    ).value =
        '';


    document.getElementById(
        'endDate'
    ).value =
        '';



    /*
     * Reset sort
     */

    document.getElementById(
        'analyticsSort'
    ).value =
        'desc';



    /*
     * Reset API preview
     */

    document.getElementById(
        'apiPreview'
    ).innerHTML =

        '<strong>API Request:</strong> ' +

        '<span>' +

        'Select a filter and click Filter.' +

        '</span>';



    /*
     * Reset page name
     */

    document.getElementById(
        'analyticsSelectedPage'
    ).innerText =
        'Home';



    /*
     * Reset date range
     */

    document.getElementById(
        'analyticsSelectedRange'
    ).innerText =
        'All Data';



    /*
     * Reset totals
     */

    document.getElementById(
        'analyticsTotalViews'
    ).innerText =
        '0';


    document.getElementById(
        'analyticsUniqueVisitors'
    ).innerText =
        '0';



    /*
     * Reset table
     */

    document.getElementById(
        'analyticsTable'
    ).innerHTML =

        '<tr>' +

        '<td ' +
        'colspan="4" ' +
        'class="empty-data">' +

        'Click Filter to load API data.' +

        '</td>' +

        '</tr>';

}

</script>



<!-- =====================================================
     TABLE SORTING
===================================================== -->

<script>

document
    .querySelectorAll("table")
    .forEach(function(table)
    {

        const headers =
            table.querySelectorAll("th");


        headers.forEach(
            function(header, index)
            {

                let ascending = true;


                header.addEventListener(
                    "click",
                    function()
                    {

                        const tbody =
                            table.querySelector(
                                "tbody"
                            );


                        if (!tbody)
                        {
                            return;
                        }


                        const rows =
                            Array.from(
                                tbody.querySelectorAll(
                                    "tr"
                                )
                            );


                        /*
                         * Don't sort empty/loading row
                         */

                        if (
                            rows.length === 1 &&
                            rows[0].children.length === 1
                        )
                        {
                            return;
                        }


                        rows.sort(
                            function(a, b)
                            {

                                let aValue =
                                    a.children[index]
                                    ? a.children[index]
                                        .innerText
                                        .trim()
                                    : "";


                                let bValue =
                                    b.children[index]
                                    ? b.children[index]
                                        .innerText
                                        .trim()
                                    : "";


                                const aNumber =
                                    parseFloat(
                                        aValue
                                    );


                                const bNumber =
                                    parseFloat(
                                        bValue
                                    );


                                /*
                                 * Numeric sorting
                                 */

                                if (
                                    !isNaN(aNumber) &&
                                    !isNaN(bNumber)
                                )
                                {

                                    return ascending

                                        ? aNumber - bNumber

                                        : bNumber - aNumber;

                                }


                                /*
                                 * Text sorting
                                 */

                                return ascending

                                    ? aValue.localeCompare(
                                        bValue
                                    )

                                    : bValue.localeCompare(
                                        aValue
                                    );

                            }
                        );


                        ascending =
                            !ascending;


                        /*
                         * Put sorted rows back
                         */

                        rows.forEach(
                            function(row)
                            {

                                tbody.appendChild(
                                    row
                                );

                            }
                        );

                    }
                );

            }
        );

    });

</script>



</body>

</html>