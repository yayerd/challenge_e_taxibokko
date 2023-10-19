<?php
// include("database.php");
// include("sign_in.php");

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="authentification.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <title>Page d'Authentification e-Taxi Bokko</title>
</head>

<body>
    <div class="container">
        <!-- <div class="authentication"> -->
            <div class="auth-section2">
                <h1 class="title_page">Bienvenue</h1>
                <p>Faites votre inscription en renseignant les informations nécessaires.</p>
                <form action="" method="post">
                    <div class="name-inputs">
                        <div class="name">
                            <label for="firstname">Prénom</label>
                            <input class="input2" type="text" name="prenoms" id="firstname" placeholder="Votre prénom" required>
                        </div>
                        <div class="name">
                            <label for="lastname">Nom</label>
                            <input class="input2" type="text" name="nom" id="lastname" placeholder="Votre nom" required>
                        </div>
                    </div>
                    <label for="email">Email</label>
                    <input class="input1" type="email" id="email" name="email_signup" placeholder="Saisissez votre email" required>
                    <label for="phone">Téléphone</label>
                    <input class="input2" type="tel" id="phone" name="phone" placeholder="Numéro de téléphone (Sénégal)" required>
                    <div class="password_inputs">
                        <div class="password">
                            <label for="password1">Mot de passe</label>
                            <input class="input1" type="password" id="password1" name="password_signup" placeholder="Entrez votre mot de passe" required>
                        </div>
                        <div class="password_confirm">
                            <label for="password2">Confirmer Mot de passe</label>
                            <input class="input1" type="password" id="password2" name="password_confirm" placeholder="Entrez le même mot de passe" required>
                        </div>
                    </div>
                    <div>
                        <label for="adresse">Adresse </label>
                        <input class="input1" type="text" id="adresse" name="user_adress" placeholder="Votre adresse: Région, Ville et Quartier... " required>
                    </div>
                    <div class="last_part">
                        <label> <i class="fa-solid fa-gift"></i> Ajouter un code promo</label>
                        <input type="submit" name="sinscrire" class="signup-btn" value="S'inscrire">
                    </div>
                </form>
            </div>

            <div class="auth-section1">
                <h1 class="title_page">Connexion</h1>
                <p>Votre chauffeur en un clic !</p>
                <button class="facebook-btn">Continuer avec Facebook</button>
                <div class="separator">OU</div>
                <form action="sign_in.php" method="post">
                    <label for="email">Email</label>
                    <input class="input1" type="email" id="email" name="email_signin" placeholder="Saisissez votre email">
                    <label for="password">Mot de passe</label>
                    <input class="input1" type="password" id="password" name="password_signin" placeholder="Entrez votre mot de passe">
                    <div class="options">
                        <span class="text_simple">J'ai déjà un compte</span>
                        <input type="submit" name="seconnecter" class="signup-btn" value="Se connecter">
                    </div>
                </form>

            </div>
        <!-- </div> -->
    </div>
</body>

</html>


<?php








?>