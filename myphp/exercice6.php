<?php
$tab = array("dimanche","Lundi","Mardi","mercredi","jeudi","vendredi","samedi");
echo"<h1> les jours de la semaine </h1>";
echo "<ol>";
for($i=0;$i<count($tab); $i++)
{
  echo "<li>".$tab[$i]."</li>";
}
echo "</ol>";
?>