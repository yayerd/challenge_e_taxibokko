<!-- Récupération des données du formulaire de connexion -->

<?php

// Link avec le fichier database.php
include("database.php") ;
session_start();

$email_signin="";
$password_signin="";
$erreurs="";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['seconnecter'])) {
    $email_signin = $_POST['email_signin'];
    $password_signin = $_POST['password_signin']; 

}

$sql_signin = 'SELECT * from user_e_taxi WHERE Email = :Email AND Mot_de_passe = :Mot_de_passe';

$stmt = $bdd_connect->prepare($sql_signin);
$stmt->bindParam(":Email", $email_signin);
$stmt->bindParam(":Mot_de_passe", $password_signin);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user) {
    $_SESSION['user'] = $user; 
    header("location: welcome.php");
}else {
    echo "Veiller à bien saisir vos données soumis lors de l'inscription. <br>"  ;
}



?>