<?php

//identification
$database = "inscription";

//connection
//$db_handle = mysqli_connect('localhost', 'root', 'root' );
//$db_found = mysqli_select_db($db_handle, $database);


//connection a la BDD
$db_handle = mysqli_connect('localhost','root','root');
$db_found = mysqli_select_db($db_handle,$database);



//récupérer les données venant du formulaire
$email = $_POST['email'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom']; 
$naissdate = $_POST['naissdate'];
$mdp = $_POST['mdp'];
$adresse1 = $_POST['adresse1'];
$adresse2 = $_POST['adresse2'];
$ville = $_POST['ville'];
$codepostal = $_POST['codepostal'];
$pays = $_POST['pays'];
$telephone = $_POST['telephone'];
$type = $_POST['type'];

if($type == "Vendeur"){
    $user = 0;
}else{
    $user = 1;
}


if($db_found){
    //saisi
    $sql = "INSERT INTO inscriptionECEMarketPlace (email, nom, prenom, naissdate, mdp, adresse1, adresse2, ville, codepostal, pays, telephone, type) VALUES('$email', '$nom', '$prenom', '$naissdate', '$mdp', '$adresse1', '$adresse2', '$ville', '$codepostal', '$pays', '$telephone', '$user')";

    $result = mysqli_query($db_handle, $sql);
    

    if($result){
        echo "Inscription réussi";
    }
    else{
        echo "Fail";
    }

}else{
    echo "database not found";
}



mysqli_close($db_handle);

?>