<?php
$tab = array(
array("nom"=>"Mohamed","Prenom"=>"khacha","mail"=>"med@emil.com","password"=>"medbenomar","age"=>20),
array("nom"=>"med","Prenom"=>"khacha","mail"=>"med@emil.com","password"=>"medbenomar","age"=>20),
array("nom"=>"ahmed","Prenom"=>"khacha","mail"=>"med@emil.com","password"=>"medbenomar","age"=>20));
echo "<table border='1'>";
// First row with keys
echo "<tr>";
foreach($tab[0] as $key=>$value) {
    echo "<th>".$key."</th>";
}
echo "</tr>";

foreach($tab as $row) {
  echo "<tr>";
  foreach($row as $value) 
  {
    echo "<td>".$value."</td>";
  }
  echo "</tr>";   
}


echo "</table>";
?>
