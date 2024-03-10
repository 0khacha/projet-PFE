<?php
$tab = array(1, 2, 2, 3, 3, 3, 4, 5, 5);

// Create a new array to store unique values
$uniqueTab = array();

for ($i = 0; $i < count($tab); $i++) {
    // Check if the value is not already in the unique array
    if (!in_array($tab[$i], $uniqueTab)) {
        // Add the value to the unique array
        $uniqueTab[] = $tab[$i];
    }
}

print_r($uniqueTab);

?>
