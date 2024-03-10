<?php
echo "<h1> Table de multiplication </h1>";
echo "<table border='1'>";
echo "<tbody>";

for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";

    for ($j = 1; $j <= 10; $j++) {
        echo "<td>" . $i * $j . "</td>";
    }

    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
