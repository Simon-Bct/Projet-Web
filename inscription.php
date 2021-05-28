<?php

//identification
$database = "inscription";

//connection
//$db_handle = mysqli_connect('localhost', 'root', 'root' );
//$db_found = mysqli_select_db($db_handle, $database);


//connection a la BDD
$connection = mysqli_connect('localhost','root','');
$bdd = mysqli_select_db($connection,$database);



//récupérer les données venant du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pseudo = $_POST['pseudo']; 
$email = $_POST['email']);
$password = $_POST['password'];
$type = $_POST['type'];



//saisi
$sql = "INSERT INTO inscriptionECEMarketPlace (Pseudo, Nom, Prénom, Email, Mdp, Type)
VALUES('$pseudo', '$nom', '$prenom', '$email', 'password', 'type')";

//Put in database
$result = mysqli_query($connection, $sql);

if($result){
    echo "Inscription réussi";
}else{
    echo "Fail";
}

mysqli_close($connection);

?>