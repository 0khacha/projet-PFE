<?php
$user = array("Nom"=>"mohamed","Prenom"=>"khacha","mail"=>"mohamedkhacha99@gmail.com","password"=>"medbenomar","age"=>20);
print_r($user);
foreach ($user as $key => $value) {
echo"". $key ." : ". $value ."<br>";

}
?>