<?php
// getBloodCenters.php

// Sample data: blood donation centers for different cities
$bloodDonationCenters = [
    "AGADIR" => ["Centre Régional de Transfusion Sanguine - Agadir Dakhla ", "Blood Centre Agadir Draraga ", "Center1C"],
    "TINGHIR" => ["Center2A", "Center2B", "Center2C"],
    "RABAT" => ["Center2A-Rabat", "Center2B-Rabat", "Center2C-Rabat"],
    "CASABLANCA" => ["Center2A-casa", "Center2B-casa", "Center2C-casa"],
    "MARAKECH" => ["Center1A-marakesh", "Center2B-marakesh", "Center2C-marakesh"],
    "GUELMIM" => ["Centre Régional de Transfusion Sanguine - Gulmim  ", "Blood Centre Agadir -Lkods Guelmim ", "Center1C"],
    "FES" => ["Centre Régional de Transfusion Sanguine - fes  ", "Blood Centre Agadir -Lkods fes ", "Center1C"],
    "SAFI" => ["Centre Régional de Transfusion Sanguine - Safi ", "Blood Centre Agadir -Lkods safi ", "Center1C"],
    
    // Add more cities and centers as needed
];

// Retrieve the selected city from the POST data
$selectedCity = $_POST['city'] ?? '';

// Check if the selected city exists in the data
if (array_key_exists($selectedCity, $bloodDonationCenters)) {
    // Output the options for the selected city
    foreach ($bloodDonationCenters[$selectedCity] as $center) {
        echo "<option value='$center'>$center</option>";
    }
} else {
    // Output a default option or an empty string if the city is not found
    echo "<option value=''>No centers available</option>";
}
?>
