<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-style.css">
    <script src="Users.js"></script>
    <link rel="icon" href="../image/logo.svg">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>User Management</title>
</head>
<body>
<nav class="barre-latérale fermer">
    <header>
      <div class="image-texte">
        <span class="image">
          <img src="../image/logo.svg" alt="">
        </span>

        <div class="texte logo-texte">
          <span class="nom">G-AFUS</span>
          <span class="lhadaf">Donnez, Sauvez</span>
        </div>
      </div>

      <i class='bx bx-menu basculer'></i>
    </header>

    <div class="menu-barre">
      <div class="menu">

        <ul class="liens-menu">
          <li class="lien-nav">
            <a href="adminDashboard.php">
              <i class='bx bx-home-alt icône'></i>
              <span class="texte texte-nav">Accueil</span>
            </a>
          </li>

          <li class="lien-nav">
            <a href="./liens/profile.html">
              <i class='bx bx-user icône'></i>
              <span class="texte texte-nav">Profile</span>
            </a>
          </li>

          <li class="lien-nav">
            <a href="#">
              <i class='bx bx-bell icône'></i>
              <span class="texte texte-nav">Notifications</span>
            </a>
          </li>


          <li class="lien-nav">
            <a href="Users.php">
              <i class='bx bx-donate-blood icône'></i>
              <span class="texte texte-nav">Users</span>
              <i class='' ></i>
            </a>
          </li>

          
          <li class="lien-nav">
            <a href="Comments.php">
              <i  class='bx bx-list-ul icône'></i>
              <span class="texte texte-nav">Comments</span>
            </a>
          </li>

          <li class="lien-nav">
            <a href="#">
              <i class='bx bx-calendar icône'></i>
              <span class="texte texte-nav">Rendez-vous</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="contenu-inférieur">
        <li class="">
          <a href="../logout.php">
            <i class='bx bx-log-out icône'></i>
            <span class="texte texte-nav">Déconnexion</span>
          </a>
        </li>

        <li class="mode">
          <div class="soleil-lune">
            <i class='bx bx-moon icône lune'></i>
            <i class='bx bx-sun icône soleil'></i>
          </div>
          <span class="texte texte-mode">Dark Mode</span>

          <div class="interrupteur-toggle">
            <span class="interrupteur"></span>
          </div>
        </li>

      </div>
    </div>

  </nav>
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
                    <option value="center">Center</option>
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
    <script>
   // Your existing sidebar toggle and dark mode switch script
    const body = document.querySelector('body'),
      sidebar = body.querySelector('.barre-latérale'),
      toggle = body.querySelector(".basculer"),
      modeSwitch = body.querySelector(".interrupteur-toggle"),
      modeText = body.querySelector(".texte-mode");

    toggle.addEventListener("click", () => {
      sidebar.classList.toggle("fermer");
    });

    modeSwitch.addEventListener("click", () => {
      body.classList.toggle("sombre");
      if (body.classList.contains("sombre")) {
        modeText.innerText = "Light Mode";
      } else {
        modeText.innerText = "Dark Mode";
      }
    });
  </script>
</body>
</html>
