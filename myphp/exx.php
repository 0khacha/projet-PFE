<?php
function fuct($tab)
{
  echo "<table border='1'>";
  foreach ($tab as $key => $value) 
  {
    echo "<tr>";
    foreach ($key as $rowKey => $rowValue) 
    {
      echo "<th>".$rowKey."</th>";
    } 
    echo "</tr>";
    echo "<tr>";
    foreach ($value as $v) {
      echo "<td>".$v."</td>";
    } 
    echo "</tr>";
  }
  echo "</table>";
}

$cities = array(
  "Maroc" => array("Imider", "Tinghir"),
  "France" => array("Paris", "Lille"),
  "Allemagne" => array("Munich", "Cologne")
);

fuct($cities);
?>
