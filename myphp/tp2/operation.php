<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sens"]) && isset($_POST["number"])) {
  
    $sens = htmlspecialchars($_POST["sens"]);
    $number = htmlspecialchars($_POST["number"]);

    if ($sens == "dve") {
        $_SESSION['result'] = $number * 10;  // Replace this with your actual conversion logic
    } elseif ($sens == "evd") {
        $_SESSION['result'] = $number / 10;  // Replace this with your actual conversion logic
    }

    header("Location: index.html");
    exit();
}
?>
