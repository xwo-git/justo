<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="style-admin.css">
  <link rel="stylesheet" href="style.css">
  <script src="app.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet"> 
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="vanilla-tilt.js"></script>
<script src="app.js"></script>
</head>
<style>
    .input-delete:focus {
        outline: none;
    }
    .input-delete::placeholder {
        color: black;
    }
    .btn-admin-delete {
        padding: 10px;
        border-radius: 30px;
        background-color: rgb(181, 64, 64);
        border: 0px solid white;
        transition: 0.3s ease-in-out;
        color: white;
    }
    .btn-admin-delete:hover {
        scale: 120%;
        transition: 0.3s ease-in-out;
    }
    .link-close-delete {
        color: white;
        text-decoration: none;
        font-size: 24px;
        margin: 0;
        padding: 0;
        position: absolute;
        left: 5px;
        top: 5px;
        transition: 0.3s ease-in-out;
    }
    .link-close-delete:hover {
        scale: 120%;
        transition: 0.3s ease-in-out;
    }
    .icon-close-delete {
        padding: 0;
        margin: 0;
    }
</style>
<body>
    <div class="nav">
        <div class="left-nav-bar-admin lnba">
            <a href="index.php" class="link-accueil-admin">Accueil</a>
        </div>
        <div class="center-nav-bar-admin cnba">
            <p>ADMIN</p>
        </div>
        <div class="right-nav-bar-admin rnba">
            <a href="#" class="messagerie-link"><ion-icon name="mail-unread-outline" class="messagerie icon"></ion-icon></a>
        </div>
    </div>
    <hr>
    <div class="delete-popup" style="
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgb(0, 52, 100);
        padding: 15px;
        border-radius: 20px;
        color: white;
        font-family: 'Prompt', 'calibri';
        text-align: center;
        border-left: 1px solid white;
        border-top: 1px solid white;
        box-shadow: 2px 2px 10px 0px rgba(0, 0, 0, 0.746);

    ">
        <div class="top-delete-popup">
            <a href="#" class="link-close-delete"><ion-icon name="close-circle-outline" class="icon-close-delete"></ion-icon></a>
            <h3>Supprimer une produit</h3>
        </div>
        <div class="center-delete-popup">
            <form action="traitement-admin.php" method="post">
                <input type="text" placeholder="Nom du produit" style="
                    padding: 10px;
                    margin-bottom: 20px;
                    background-color: whitesmoke;
                    border-radius: 20px;
                    box-shadow: 0px 0px 7px 0px rgba(0, 0, 0, 0.946);
                    border: 0px solid white;
                " class="input-delete"> <br>
                <button type="submit" class="btn-admin-delete" value="Supprimer le produit">Supprimer le produit</button>
            </form>
        </div>
    </div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>