<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="style.css">
  <script src="app.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet"> 
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="vanilla-tilt.js"></script>
</head>
<body>
    <?php
        session_start();    
        $error_message = "Un des champs de saisie a ete incorrectement remplie ! ";
        if(isset($_SESSION['valid_data'])) {
            $valid_data = $_SESSION['valid_data'];
            $username = $_SESSION['username'];
            unset($_SESSION['username']);
            unset($_SESSION['$valid_data']);
            if($valid_data == False) {
                echo '<script type="text/javascript">window.alert("'.$error_message.'");</script>';
            }
        }


    ?>
    <div class="inscription-page">
        <h1 class="title-inscription-page lpt"> Inscription </h1>
        <a href="index.php"  class="lplc"><ion-icon name="close-outline"></ion-icon></a>
        <div class="formulaire">
            <form action="traitement_inscription.php" method="post">
                <div class="username-input">
                    <input type="text" name="username" placeholder="Nom d'utilisateur" class="input-inscription-page uip">
                    <i class="icon-username-input iui"><ion-icon name="person-circle-outline" class="username-ion-icon uiii"></ion-icon></i>
                </div>
                <div class="mail-input">
                    <input type="text" name="mail" placeholder="Adresse e-mail" class="input-inscription-page mii">
                    <i class="icon-mail-input imi"><ion-icon name="mail-outline" class="mail-ion-icon mii2"></ion-icon></i>
                </div>
                <div class="password-input">
                    <input type="password" name="password" placeholder="Mot de passe" class="input-inscription-page psii">
                    <i class="icon-password-input ipi"><ion-icon name="lock-closed-outline" class="password-ion-icon pii"></ion-icon></i>
                </div>
                <div class="password-input-confirm">
                    <input type="password" name="password_confirm" placeholder="Reconfirmer le Mot de passe" class="input-inscription-page psrii">
                    <i class="icon-password-reconfirm-input ipri"><ion-icon name="lock-closed-outline" class="password-reconfirm-ion-icon prii"></ion-icon></i>
                </div>
                <button type="submit" value="S'inscrire" class="btn-submit">S'inscrire</button>
            </form>
        </div>
    </div>
</body>
</html>