<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../controllers/AdminController.php'; ?>
    <?php AdminController::checkAdminRole();
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin-style.css" type="text/css">
    <link rel="icon" href="../image/logo.svg">
    <title>Admin Dashboard - Blood Donation</title>
</head>

<body>
    <!-- Sidebar -->
    
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

    <!-- Main Content -->
    <div class="content">


        <!-- Comments Section -->
    <div class="comments-section">
    <h2>Comments from Users</h2>
    <div class="table-section" style=overflow-y: auto;>
    <table id="commentsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Comment</th>
            </tr>
        </thead>
        <tbody id="comments-table-body"></tbody>
    </table>
    </div>
</div>
    </div>
    <script src="../js/comments-script.js"></script>
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
