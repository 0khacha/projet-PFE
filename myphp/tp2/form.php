<?php
if(empty($_POST["nom"] || $_POST["prenom"] )) {
  echo "nom ou prenom est vide ";
  }
  elseif(empty($_POST["email"]))
  {
    echo "email est obligatoire";
  }elseif(empty($_POST["username"]))
  {
    echo "username est invalid";

  }
elseif(empty($_POST["password"])||empty($_POST["confpassword"]))
{
  echo " password est obligatoire";

}
elseif(strlen($_POST["password"])>7)
{
  echo " au mois 6 caractere ";

}
  elseif(($_POST["password"])!=($_POST["password"]))
  {
    echo " passwords non sont pas identique";
  }
  else 
  {
    echo "Merci <b>".$_POST["username"]."</b>";
    $file = fopen("inscription.txt","a");
    $s ="nom : ".$_POST["nom"]."prenom : ".$_POST["prenom"]."email : ".$_POST["email"];
    fputs($file,$s);
    fclose($file);
  }
?>