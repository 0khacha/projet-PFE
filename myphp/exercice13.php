<?php
function affiche($cities)
{  echo"<table border = '1'>";
   foreach ($cities as $k => $v) 
   {
    echo "<tr>";
    echo "<th>". $k ."</th>";
    foreach ($v as $k2 => $v2)
    {
      echo "<td>".$v2."</td>";
    }
    echo "</tr>";
   }
   echo "</table>";
}
$tab = array(
  "maroc"=>array("Tinghir","Sidi Bibi","guelmim"),
  "france"=>array("lille","Lyon","paris"),
   "Allmengne"=>array("Berlin","Munich","cologne")); 
   affiche($tab);
?>
