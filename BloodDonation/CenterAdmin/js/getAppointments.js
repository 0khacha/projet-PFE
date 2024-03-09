document.addEventListener("DOMContentLoaded", function () {
    // Function to load comments using AJAX
    function loadComments() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Update the comments table body with the retrieved comments
                document.getElementById("comments-table-body").innerHTML = xhr.responseText;
            }
        };

        // Correct path to GetCommentsController.php
        xhr.open("GET", "../getAppointments.php", true);
        xhr.send();
    }

    // Load comments when the page loads
    loadComments();
});