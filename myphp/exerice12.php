<?php
function func1($num)
{ 
  $resultat = 0;
  while ($num > 0)
  {     $rest =  $num % 10;
        $resultat = $resultat * 10 *$rest;
        $num = (int)($num / 10);
  }
  return $resultat;
}

echo func1(9753);
?>
