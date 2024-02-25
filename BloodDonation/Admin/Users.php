<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-style.css">
    <script src="Users.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>User Management</title>
</head>
<body>
<div class="sidebar">
        <div class="admin-logo-container">
            <img src="image/admin-logo.png" alt="Admin Logo">
            <h2>Admin Panel</h2>
        </div>
        <ul>
            <li class="active"><a href="adminDashboard.php">Dashboard</a></li>
            <li><a href="Users.php">Users</a></li>
            <li><a href="#">Donations</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <h2>User Management</h2>
        <div class="table-section">
        <table id="userTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Usertype</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- User data will be populated here dynamically using JavaScript -->
            </tbody>
        </table>
        <div id="editUserTypeModal" style="display: none;">
            <form>
                <label for="newUserType">New User Type:</label>
                <select id="newUserType">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="button" onclick="updateUserType()">Update</button>
                <button type="button" onclick="closeEditUserTypeModal()">Cancel</button>
            </form>
        </div>

        <div id="confirmationModal" style="display: none;">
            <p>Are you sure you want to delete this user?</p>
            <button onclick="deleteUser()">Yes</button>
            <button onclick="cancelDelete()">No</button>
        </div>
        </div>
    </div>

</body>
</html>
