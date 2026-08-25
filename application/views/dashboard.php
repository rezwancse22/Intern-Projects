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


<!-- =========================
     DASHBOARD HEADER
========================= -->

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



<!-- =========================
     DASHBOARD LAYOUT
========================= -->

<div class="dashboard-layout">


    <!-- =========================
         SIDEBAR
    ========================= -->

    <div class="sidebar">


        <button
            class="sidebar-btn active"
            onclick="showSection('overall', this)">

            📊 Overall

        </button>


        <button
            class="sidebar-btn"
            onclick="showSection('page-statistics', this)">

            📈 Page Statistics

        </button>


        <button
            class="sidebar-btn"
            onclick="showSection('visitor-tracking', this)">

            👁 Visitor Tracking

        </button>


        <button
            class="sidebar-btn"
            onclick="showSection('visitor-history', this)">

            📋 Visitor History

        </button>


        <button
            class="sidebar-btn"
            onclick="showSection('users', this)">

            👥 Users

        </button>


        <button
            class="sidebar-btn"
            onclick="showSection('login-history', this)">

            🔐 Login History

        </button>


        <!-- Notices history এর পরে -->

        <button
            class="sidebar-btn"
            onclick="showSection('notices', this)">

            📄 Notices

        </button>


    </div>



    <!-- =========================
         MAIN CONTENT
    ========================= -->

    <div class="dashboard-content">



        <!-- =========================
             OVERALL
        ========================= -->

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


                <div class="summary-card">

                    <h3>
                        Total Registered Users
                    </h3>

                    <div class="number">

                        <?php echo $total_users; ?>

                    </div>

                </div>



                <div class="summary-card">

                    <h3>
                        Total Page Visits
                    </h3>

                    <div class="number">

                        <?php echo $total_visits; ?>

                    </div>

                </div>



                <div class="summary-card">

                    <h3>
                        Unique Visitors
                    </h3>

                    <div class="number">

                        <?php echo $unique_visitors; ?>

                    </div>

                </div>



                <div class="summary-card">

                    <h3>
                        Today's Visits
                    </h3>

                    <div class="number">

                        <?php echo $today_visits; ?>

                    </div>

                </div>



                <div class="summary-card">

                    <h3>
                        Most Visited Page
                    </h3>

                    <div class="page-name">

                        <?php

                        if ($most_visited_page) {

                            echo htmlspecialchars(
                                $most_visited_page->page_name
                            );

                        } else {

                            echo "No Data";

                        }

                        ?>

                    </div>

                </div>


            </div>

        </div>



        <!-- =========================
             PAGE STATISTICS
        ========================= -->

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

                            <th>ID</th>
                            <th>Page Name</th>
                            <th>Page URL</th>
                            <th>Date</th>
                            <th>Total Views</th>
                            <th>Unique Visitors</th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php if (!empty($page_statistics)) { ?>

                            <?php foreach ($page_statistics as $page) { ?>

                                <tr>

                                    <td>
                                        <?php echo htmlspecialchars($page->id); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($page->page_name); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($page->page_url); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($page->stats_date); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($page->total_views); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($page->unique_visitors); ?>
                                    </td>

                                </tr>

                            <?php } ?>

                        <?php } else { ?>

                            <tr>

                                <td
                                    colspan="6"
                                    class="empty-data">

                                    No page statistics available.

                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>



        <!-- =========================
             VISITOR TRACKING
        ========================= -->

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

                            <th>ID</th>
                            <th>Page URL</th>
                            <th>Page Name</th>
                            <th>IP Address</th>
                            <th>Visit Date</th>
                            <th>Visit Time</th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php if (!empty($visitor_tracking)) { ?>

                            <?php foreach ($visitor_tracking as $visitor) { ?>

                                <tr>

                                    <td>
                                        <?php echo htmlspecialchars($visitor->id); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($visitor->page_url); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($visitor->page_name); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($visitor->ip_address); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($visitor->visit_date); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($visitor->visit_time); ?>
                                    </td>

                                </tr>

                            <?php } ?>

                        <?php } else { ?>

                            <tr>

                                <td
                                    colspan="6"
                                    class="empty-data">

                                    No visitor tracking data available.

                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>



        <!-- =========================
             VISITOR HISTORY
        ========================= -->

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

                            <th>ID</th>
                            <th>IP Address</th>
                            <th>Page URL</th>
                            <th>Page Name</th>
                            <th>Created At</th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php if (!empty($visitor_history)) { ?>

                            <?php foreach ($visitor_history as $history) { ?>

                                <tr>

                                    <td>
                                        <?php echo htmlspecialchars($history->id); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($history->ip_address); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($history->page_url); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($history->page_name); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($history->created_at); ?>
                                    </td>

                                </tr>

                            <?php } ?>

                        <?php } else { ?>

                            <tr>

                                <td
                                    colspan="5"
                                    class="empty-data">

                                    No visitor history available.

                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>



        <!-- =========================
             USERS
        ========================= -->

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

                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Date of Birth</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Created At</th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php if (!empty($users)) { ?>

                            <?php foreach ($users as $user) { ?>

                                <tr>

                                    <td>
                                        <?php echo htmlspecialchars($user->id); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($user->full_name); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($user->date_of_birth); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($user->phone); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($user->email); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($user->created_at); ?>
                                    </td>

                                </tr>

                            <?php } ?>

                        <?php } else { ?>

                            <tr>

                                <td
                                    colspan="6"
                                    class="empty-data">

                                    No registered users found.

                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>



        <!-- =========================
             LOGIN HISTORY
        ========================= -->

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

                            <th>ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Login Date</th>
                            <th>Login Time</th>
                            <th>IP Address</th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php if (!empty($login_history)) { ?>

                            <?php foreach ($login_history as $login) { ?>

                                <tr>

                                    <td>
                                        <?php echo htmlspecialchars($login->id); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($login->full_name); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($login->email); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($login->login_date); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($login->login_time); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($login->ip_address); ?>
                                    </td>

                                </tr>

                            <?php } ?>

                        <?php } else { ?>

                            <tr>

                                <td
                                    colspan="6"
                                    class="empty-data">

                                    No login history available.

                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>



        <!-- =========================
             NOTICES
        ========================= -->

        <div
            id="notices"
            class="dashboard-section">

            <div class="table-section">

                <h2>
                    Notices
                </h2>

                <p class="empty-data">

                    Notice management will be added here.

                </p>

            </div>

        </div>


    </div>

</div>



<!-- =========================
     SIDEBAR SECTION SCRIPT
========================= -->

<script>

function showSection(sectionId, button)
{
    document
        .querySelectorAll('.dashboard-section')
        .forEach(function(section)
        {
            section.classList.remove('active-section');
        });


    document
        .querySelectorAll('.sidebar-btn')
        .forEach(function(btn)
        {
            btn.classList.remove('active');
        });


    document
        .getElementById(sectionId)
        .classList.add('active-section');


    button.classList.add('active');
}

</script>



<!-- =========================
     TABLE SORTING
========================= -->

<script>

document.querySelectorAll("table").forEach(function(table)
{
    const headers = table.querySelectorAll("th");


    headers.forEach(function(header, index)
    {
        let ascending = true;


        header.style.cursor = "pointer";


        header.addEventListener("click", function()
        {
            const tbody =
                table.querySelector("tbody");


            const rows =
                Array.from(
                    tbody.querySelectorAll("tr")
                );


            rows.sort(function(a, b)
            {
                let aValue =
                    a.children[index]
                    ? a.children[index].innerText.trim()
                    : "";


                let bValue =
                    b.children[index]
                    ? b.children[index].innerText.trim()
                    : "";


                const aNumber =
                    parseFloat(aValue);


                const bNumber =
                    parseFloat(bValue);


                if (
                    !isNaN(aNumber)
                    &&
                    !isNaN(bNumber)
                )
                {
                    return ascending
                        ? aNumber - bNumber
                        : bNumber - aNumber;
                }


                return ascending
                    ? aValue.localeCompare(bValue)
                    : bValue.localeCompare(aValue);
            });


            ascending = !ascending;


            rows.forEach(function(row)
            {
                tbody.appendChild(row);
            });

        });

    });

});

</script>


</body>

</html>