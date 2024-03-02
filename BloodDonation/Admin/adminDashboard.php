<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include '../controllers/UserController.php';
    UserController::checkLoggedIn();

    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-style.css" type="text/css">
    <link rel="icon" href="../image/logo.svg">
    <title>Admin Dashboard - Blood Donation</title>
</head>

<body id="admin-body">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="admin-logo-container">
            <img src="../image/logo.png" alt="Admin Logo">
            <h2>Admin Panel</h2>
        </div>
        <ul>
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="Users.php">Users</a></li>
            <li><a href="#">Donations</a></li>
            <li><a href="#">Centres</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Welcome, Admin!</h1>
            <p>Manage and monitor blood donation activities.</p>
        </div>

        <!-- Statistics Section -->
        <!-- Statistics Section -->
            <div class="statistics-section">
                <div class="statistic-box" id="registeredUsersBox">
                    <h3>Registered Users</h3>
                    <p class="statistic-number">Loading...</p>
                        <!-- Add a canvas element for the chart -->
                    <canvas id="usersChart" width="300" height="100"></canvas>
                </div>
                <div class="statistic-box" id="appointmentsBox">
                    <h3>Appointments</h3>
                    <p class="statistic-number">Loading..</p>
                    <canvas id="appointmentsChart" width="300" height="150"></canvas>
                </div>
                <div class="statistic-box" id="requestsBox">
                    <h3>Requests</h3>
                    <p class="statistic-number">Loading..</p>
                    <canvas id="requestsChart" width="300" height="150"></canvas>
                </div>
                <!-- Chart Canvas -->

            </div>

            <!-- Include the Chart.js library -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <!-- Include the separate JavaScript file -->

        <!-- Recent Activities Section -->
        <div class="recent-activities">
            <h2>Recent Activities</h2>
            <ul>
                <li>User John Doe registered.</li>
                <li>Donation received from Jane Smith.</li>
                <li>New blood request from Hospital XYZ.</li>
                <!-- Add more activities as needed -->
            </ul>
        </div>
    </div>

    <script src="chart-script.js"></script>
</body>

</html>
