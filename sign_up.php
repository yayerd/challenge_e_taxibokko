<!-- Récupération données du Formulaire inscription  -->

<?php

include("database.php");

// Récupération des données après connexion à la base de données via la requête préparée.
$erreurs = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $prenom_signup = $_POST['prenoms'];
    $nom_signup = $_POST['nom'];
    $email_signup = $_POST['email_signup'];
    $phone_signup = $_POST['phone'];
    $password_signup = $_POST['password_signup'];
    $password_confirm = $_POST['password_confirm'];
    $user_adress = $_POST['user_adress'];
    $date_signup = date('Y-m-d');


    $sql_signup = 'INSERT INTO user_e_taxi( Prenom, Nom, Email, Telephone, Mot_de_passe, Mot_de_passe_confirm, Adresse, Date_signup) 
                 VALUES (:Prenom, :Nom, :Email, :Telephone, :Mot_de_passe, :Mot_de_passe_confirm, :Adresse, :Date_signup )';


    $stmt = $bdd_connect->prepare($sql_signup);

    if ($stmt) {
        $stmt->bindParam(":Prenom", $prenom_signup);
        $stmt->bindParam(":Nom", $nom_signup);
        $stmt->bindParam(":Email", $email_signup);
        $stmt->bindParam(":Telephone", $phone_signup);
        $stmt->bindParam(":Mot_de_passe", $password_signup);
        $stmt->bindParam(":Mot_de_passe_confirm", $password_confirm);
        $stmt->bindParam(":Adresse", $user_adress);
        $stmt->bindParam(":Date_signup", $date_signup);
    }
    $stmt->execute();
    // header("location:welcome.php");
    echo "Les données renseignées dans le formulaire ont été insérées dans la base de donnée.";
} else {
    echo 'Erreur, les données ne sont pas transmises.';
}

// Vérification et Validation des données récupérées du formulaire de d'inscription

// Pour le Prenom
$prenom_signup = htmlspecialchars($prenom_signup);

if (
    empty($prenom_signup)
    || strlen($prenom_signup) < 3 || strlen($prenom_signup) > 50
    || !ctype_alpha($prenom_signup)
) {
    $erreurs[] = "Veuillez saisir un prenom correct.";
} 



// Pour le Nom
$nom_signup = htmlspecialchars($nom_signup);

if (
    empty($nom_signup)
    || strlen($nom_signup) < 2 || strlen($nom_signup) > 50
    || !ctype_alpha($nom_signup)
) {
    $erreurs[] = "Veuillez saisir un nom correct.";
}

// Pour le mail
if (
    empty($email_signup)
    || !(preg_match("/^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$/", $email_signup))
    || !(filter_var($email_signup, FILTER_VALIDATE_EMAIL))
) {
    $erreurs[] = "L'adresse e-mail n'est pas valide." ;
}

// Pour le mail
if (
    empty($phone_signup)
    || !strlen($phone_signup) == 14
    || !is_numeric($phone_signup)
    || !(preg_match("/^(0022170|0022176|0022177|0022178)[0-9]{7}/", $email_signup))

) {
    $erreurs[] = "Le numéro de téléphone saisi n'est pas correct." ;
}

// Pour le Mot de passe
if (
    !empty($password_signup)
    || strlen($password_signup) < 8
    || !preg_match('/[A-Z]/', $password_signup) 
    || !preg_match('/[a-z]/', $password_signup) 
    || !preg_match('/[0-9]/', $password_signup) 
) {
    $erreurs[] = "Veuillez saisir un mot de passe de 8 caractères minimum <br>
    Avec au moins une majuscule, au moins un minucule et au moins un chiffre" ;
}


// Pour le Mot de passe confirmé
if (
    empty($password_confirm)
    || $password_signup !== $password_confirm 
) {
    $erreurs[] = "Ce mot de passe est différent du premier que vous avez saisi";
}

if (!empty($erreurs)){
    foreach ($erreurs as $erreur) {
        echo "<pre>";
        echo $erreur;
        echo "</pre>";
    }
    echo 'Inscrivez-vous <a href="authentification.php"></a>';
} die();




// print_r($erreurs);


?>