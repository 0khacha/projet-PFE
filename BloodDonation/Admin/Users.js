document.addEventListener("DOMContentLoaded", () => {
    fetchUserData();
});

async function fetchUserData() {
    try {
        const response = await fetch("UsersManagement.php");
        if (!response.ok) {
            throw new Error(`Error fetching user data: ${response.statusText}`);
        }

        const userData = await response.json();
        populateUserTable(userData);
    } catch (error) {
        console.error('Error fetching user data:', error.message);
    }
}

function populateUserTable(userData) {
    const tableBody = document.querySelector("#userTable tbody");

    // Clear existing rows
    tableBody.innerHTML = "";

    userData.forEach(user => {
        const row = createUserRow(user);
        tableBody.appendChild(row);
    });
}

function createUserRow(user) {
    const row = document.createElement("tr");
    row.innerHTML = `
        <td>${user.id}</td>
        <td>${user.username}</td>
        <td>${user.email}</td>
        <td>${user.usertype}</td>
        <td>
          <button onclick="givePrivilege(${user.id})">Give Privilege</button>
          <button onclick="editUserType(${user.id})">Edit User Type</button>
          <button onclick="confirmDelete(${user.id})">Delete User</button>
        </td>
      `;
    return row;
}

async function editUserType(userId) {
    const editUserTypeModal = document.getElementById("editUserTypeModal");
    editUserTypeModal.style.display = "block";

    try {
        const user = await getUserById(userId);

        if (user && user.usertype !== undefined) {
            const userTypeSelect = document.getElementById("newUserType");
            userTypeSelect.value = user.usertype;
            editUserTypeModal.dataset.userId = userId;
        } else {
            console.error("Invalid user data or usertype not found");
        }
    } catch (error) {
        console.error('Error editing user type:', error.message);
    }
}

async function getUserById(userId) {
    try {
        const response = await fetch(`UsersManagement.php?action=getUserById&userId=${userId}`);
        if (!response.ok) {
            throw new Error(`Error fetching user by ID: ${response.statusText}`);
        }

        const user = await response.json();
        return user;
    } catch (error) {
        console.error('Error fetching user by ID:', error.message);
        return null;
    }
}

async function updateUserType() {
    const userId = document.getElementById("editUserTypeModal").dataset.userId;
    const newUserType = document.getElementById("newUserType").value;

    try {
        const response = await fetch("UsersManagement.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `action=updateUserType&userId=${userId}&newUserType=${newUserType}`,
        });

        if (!response.ok) {
            throw new Error(`Error updating user type: ${response.statusText}`);
        }

        const result = await response.json();

        if (result.success) {
            console.log(result.message);
            fetchUserData();
            closeEditUserTypeModal();
        } else {
            console.error(result.message);
        }
    } catch (error) {
        console.error('Error updating user type:', error.message);
    }
}

function closeEditUserTypeModal() {
    document.getElementById("editUserTypeModal").style.display = "none";
}
function cancelDelete() {
    document.getElementById("confirmationModal").style.display = "none";
}

function confirmDelete(userId) {
    const modal = document.getElementById("confirmationModal");
    modal.style.display = "block";
    modal.dataset.userId = userId;
}

async function deleteUser() {
    const userId = document.getElementById("confirmationModal").dataset.userId;

    try {
        const response = await fetch("UsersManagement.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `action=deleteUser&userId=${userId}`,
        });

        if (!response.ok) {
            throw new Error(`Error deleting user: ${response.statusText}`);
        }

        const result = await response.json();

        if (result.success) {
            console.log(result.message);
            fetchUserData();
        } else {
            console.error(result.message);
        }
    } catch (error) {
        console.error('Error deleting user:', error.message);
    }

    document.getElementById("confirmationModal").style.display = "none";
}
