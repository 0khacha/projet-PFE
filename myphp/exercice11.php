<?php
$tab = array();
$tabin = array();
$tabsup = array();
$inf=0;
$sup=0;
for ($i = 0; $i < 10; $i++) {
  $tab[$i] = rand(1,100);
  if ($tab[$i] < 50) 
  {
    $tabin[$inf]=$tab[$i];    
    $inf++;
  }
  else {
    $tabsup[$sup]=$tab[$i];  
    $sup++;
  }
}
print_r($tabin);
echo "<br>";
print_r($tabsup);
echo "<br>";
if(in_array("42", $tab)) 
{
  echo "42 exist !";
}
else echo"not exist !";
?>