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
<script src="app.js"></script>
</head>
<body>
    <?php
        session_start();
        if(isset($_COOKIE['id'])) {
            include 'database.php';
            global $db;
            $q = $db->prepare('SELECT * FROM users WHERE id = :id');
            $q->bindParam(':id', $_COOKIE['id']);
            $q->execute();
            $user = $q->fetch(PDO::FETCH_ASSOC);

            if($user) {
                $username = $user['pseudo'];
                $id = $user['id'];
            }
            
        }
        // declare la variable incription pour afficher le bouton mais peut devenir nul apres connexion
        $inscription_cc="inscription";
        $connexion_cc="connexion";
        $deconnexion="";
        $error_message = "Mot de passe ou adresse e-mail incorrect !";
        // verifier si les donner sont bien recu 
        if(isset($_SESSION['valid_data'])) {
            $valid_data = $_SESSION['valid_data'];
            unset($_SESSION['valid_data']);
            if($valid_data == True) {
                $username = $_SESSION['username'];
                $id = $_SESSION['id'];
                setcookie('id', $id, time() + (30*24*3600));
                setcookie('username', $username, time() + (30*24*3600));
            }
            if($valid_data == False){
                echo '<script type="text/javascript">window.alert("'.$error_message.'");</script>';
            }
        }
        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            unset($_SESSION['username']);
            $inscription_cc = "";
            $connexion_cc="";
            $deconnexion="deconnexion";
            
        } else {
            $username = '';
        }
        if(isset($_COOKIE['id'])) {
            $inscription_cc="";
            $connexion_cc ="";
            $deconnexion="Deconnexion";
            $username = $_COOKIE['username'];
        }
        unset($_SESSION['username']);
        unset($_SESSION['id']);
        
    ?>
    <script src="app.js">
        pop_connexion('connexion-page');
    </script>
    <div class="website" id="website">
        <a href=""></a>
        <nav id="nav">
            <ul class="center">
                <li class="nav-buttons"><a href="index.php" class="a-nav">Accueil</a></li>
                <li class="nav-buttons"><a href="contact.php?username=<?= $username?>" class="a-nav" onclick="contact_open('contact-page')">Contact</a></li>
                <li class="nav-buttons"><a href="produit.php" class="a-nav" onclick="justaucorpswebsiteclose('website');">Justaucorps</a></li> <!-- Ne pas oublier de laisser de la place pour un menu deroulant (methode voir obsidina)-->
                <li class="nav-buttons"><a href="#" class="a-nav" onclick="pop_connexion('connexion-page'); web_site_slide('website')"><?php echo $connexion_cc; ?></a></li>
                <li class="nav-buttons"><a href="#" class="a-nav"><?php echo $username ?></a> </li>
                
                <li class="nav-buttons"><a href="inscription.php" class="a-nav inscription-nav-button" ></a> </li>
                <li class="nav-buttons"><a href="deconnexion.php" class="a-nav"><?php echo $deconnexion;?></a><li>
            </ul>
            <ul class="right">
                <a href="panier.php" class="panier-icon" style='color: black;'><ion-icon name="bag-handle-outline" class="nav-panier"></ion-icon></a>
                
            </ul>
        </nav>
        <main>
            <div class="main-left ml" id="main-left">
                <img src="logo3-main-left.png" alt="logo principale de la partie gauche" id="logo-main-left">
                <br>
                <br>
                <br>
                <br>
                <div class="text-box-main-left" data-tilt data-tilt-max="10" data-tilt-speed="50" data-tilt-perspective="1000">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit quae libero eveniet alias! Corporis voluptas ullam laborum, quod soluta esse explicabo debitis eius molestiae, magni, non fugit eos officiis.
                </div>
            </div>
            <div class="main-right mr">
                <div class="wrapper-main-right" id="main-right">
                    <div class="product p1" id="p1-center"><a href="#" onclick="pop_product_center('p1-center', 'imgp1')">test</a>
                        <img src="imgp1.jpg" id="imgp1" style="display: none;">
                        <p class="p-product p-p1" style="display: none;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium laboriosam reiciendis at autem iste sit non optio impedit excepturi earum maxime, illo molestiae culpa et velit repellat cum deserunt unde.

                        </p>
                    </div>
                    <div class="product p2"><a href="#">test</a>
                    </div>
                    <div class="product p3"><a href="#">test</a></div>
                    <div class="product p4"><a href="#">test</a></div>
                    <div class="product p5"><a href="#">test</a></div>
                    <div class="product p6"><a href="#">test</a></div>
                    <div class="product p7"><a href="#">test</a></div>
                    <div class="product p8"><a href="#">test</a></div>
                    <div class="product p9"><a href="#">test</a></div>
                </div>
            </div>
        </main>
    </div>
    <div class="connexion-page" id="connexion-page">
        <h1 class="login-page-title lpt">Connexion</h1>
        <a href="#" onclick="pop_connexion_close('connexion-page'); web_site_slide_close('website')" class="login-page-link-close lplc"><ion-icon name="close-outline"></ion-icon></a>
        <div class="formulaire">
            <form action="traitement_login.php" method="post" class="form-login-page">
                <div class="login-page-mail-input">
                    <input type="text" placeholder="Adresse e-mail" name="mail" class="form-login-input flim">
                <i class="logo-login ll1"><ion-icon name="mail-outline" class="logo-login-icon lli1"></ion-icon></i>
                </div>
                <div class="login-page-mail-mdp">
                    <input type="password" placeholder="Mot de passe" name="mdp" class="form-login-input flimdp">
                    <i class="logo-login ll2"><ion-icon name="lock-closed-outline" class="logo-login-icon lli2"></ion-icon></i>
                </div>
                <button type="submit" value="Se connecter" class="login-page-button-submit btn-submit">Se connecter</button>
                <a href="inscription.php" class="inscription-link">Creer un nouveau compte</a>
            </form>
        </div>
    </div>


    </div>
    <script type="text/javascript" src="vanilla-tilt.js"></script>
</body>
</html>


