<!DOCTYPE html>
<html lang="en">
<head>
<title>Titre de la page</title>
  <link rel="stylesheet" href="style.css">
  <script src="app.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet"> 
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="vanilla-tilt.js"></script>
<script src="app.js"></script>
<body>
<?php
    if (isset($_GET['username'])) {
        $username = $_GET['username'];
    } else{
        $username = '';
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = '';
    }
?>
<div class="contact-page" id="contact-page" style="    
    width: 650px;
    height: 650px;
    background-color: rgb(0, 52, 100);
    border-radius: 20px;
    border-top: 1px solid white;
    border-left: 1px solid white;
    padding: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 100%;
    color: white;
    font-family: 'Prompt', sans-serif;
    @keyframes contact-open {
        0% {
            top: 140%;
            opacity: 0;
        }
        100% {
            top: 50%;
            opacity: 100%
        }
    }
    @keyframes contact-close {
        0% {
            top: 50%;
            opacity: 100%;
        }
        100% {
            top: 140%;
            opacity: 0%;
        }
    }
    ">
        <div class="top-contact">
            <div class="left">
                <a href="index.php" class="close-contact-link" style="text-decoration: none; color: white;"><ion-icon name="close-circle-outline" style="font-size: 45px;"></ion-icon></a>
            </div>
            <div class="center">
                <h1 style="text-align: center;">CONTACT</h1>
            </div>
        </div>
        <?php
            if($username == "") {
                echo '<h2 class="contact-not-login" style="text-align: center;">Vous devez se connecter ! </h2>';
                echo '<br>';
                echo '<a href="index.php" class="login-page-button-submit btn-submit" style="margin-left: 3%">Se connecter</a>';
            } else {
                echo '<p class="text-contact">Mail : Justaugym@gmail.com</p>';
                echo '<p class="text-contact">Ecrire votre message : </p>';
                echo '<form action="admin.php" method="post">';
                echo '<textarea id="message" name="message" rows="4" cols="50" required></textarea>';
                echo '<button type="submit" value="Envoyer" class="login-page-button-submit btn-submit" style="margin-left: -34.5%; margin-top: 15%;">Envoyer</button>';
                echo '</form>';
            }
        ?>
</body>
</html>