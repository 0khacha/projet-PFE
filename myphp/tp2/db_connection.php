<?php
$dbhost = "localhost";
$db = "vente";
$dbuser = "root";
$dbpass = "";
try
 {
  if(isset($_POST["ref"])
  $conn = new PDO("mysql:host=$dbhost;dbname=$db;charset=utf8", $dbuser, $dbpass);
  echo"Connexion reussie";
  $rep = $conn->query('SELECT * FROM produits WHERE ref =?');
 # while ($row = $rep->fetch(PDO::FETCH_ASSOC)) 
 # {
  #  echo "<h3> produits n : $i : </h3>";
 #   foreach ($row as $key => $value)
 #   {
 #     echo "$key : $value <br>";
 #   }
 #   $i++;
 # }
 # $rep->closeCursor();
 }
 catch (PDOException $e)
 {
  echo "error". $e->getMessage() ."";
 }

?>