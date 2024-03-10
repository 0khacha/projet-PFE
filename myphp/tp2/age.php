<?php
$birthDate = $_POST["daten"];
$date = new DateTime($birthDate);

// Extract the birth year using the "Y" format specifier
$birthYear = $date->format("Y");

// Calculate the age by subtracting the birth year from the current year
$currentYear = date("Y");
$age = $currentYear - $birthYear;

echo "Age: " . $age;
?>
