<?php
function displayErrorMessage($message) {
    echo "<div id='message-container'><p class='error-message'>$message</p></div>";
}

function displaySuccessMessage($message) {
    echo "<div id='message-container'><p class='success-message'>$message</p></div>";
}
?>
