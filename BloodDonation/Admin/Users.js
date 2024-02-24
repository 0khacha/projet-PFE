document.addEventListener("DOMContentLoaded", function () {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "UsersManagement.php", true);
  xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
          var userData = JSON.parse(xhr.responseText);
          populateUserTable(userData);
      }
  };
  xhr.send();
});

// Function to populate the user table
function populateUserTable(userData) {
  var tableBody = document.querySelector("#userTable tbody");

  userData.forEach(function (user) {
      var row = document.createElement("tr");
      row.innerHTML = `
          <td>${user.id}</td>
          <td>${user.username}</td>
          <td>${user.email}</td>
          <td>${user.usertype}</td>
          <td>
              <button onclick="givePrivilege(${user.id})">Give Privilege</button>
              <button onclick="confirmDelete(${user.id})">Delete User</button>
          </td>
      `;
      tableBody.appendChild(row);
  });
}

// Function to confirm user deletion
function confirmDelete(userId) {
  // Show confirmation modal
  document.getElementById("confirmationModal").style.display = "block";

  // Store the user id to be deleted
  document.getElementById("confirmationModal").dataset.userId = userId;
}

// Function to cancel user deletion
function cancelDelete() {
  // Hide confirmation modal
  document.getElementById("confirmationModal").style.display = "none";

  // Clear stored user id
  delete document.getElementById("confirmationModal").dataset.userId;
}

// Function to perform the actual user deletion
function deleteUser() {
  var userId = document.getElementById("confirmationModal").dataset.userId;

  // Make an AJAX request to delete user
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "UsersManagement.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
          // Handle the response (you may reload the user table or show a success message)
          console.log(xhr.responseText);
          // Reload the user table after deletion
          window.location.reload();
      }
  };

  // Send a POST request with the action set to 'deleteUser' and userId parameter
  xhr.send("action=deleteUser&userId=" + userId);

  // Hide confirmation modal
  document.getElementById("confirmationModal").style.display = "none";
}
