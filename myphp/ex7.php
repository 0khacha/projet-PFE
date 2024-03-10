<?php
$tab = array(array());
echo "<h1>Table de multiplication</h1>";
for($i=1;$i<=10;$i++)
 {
  for($j=1;$j<=10;$j++)
  {
    $tab[$i][$j] = $i*$j;
  }
 }
 echo "<table border='1'>";
 for($i=1;$i<=10;$i++)
 {  echo "<tr>";
  for($j=1;$j<=10;$j++)
  {
     echo  "<td>". $tab[$i][$j]."</td>";
  }
  echo"<br>";
  echo "</tr>";
 }

 echo "</table border='1'>";
?>