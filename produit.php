<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
    <script src="app.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet"> 
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="vanilla-tilt.js"></script>
    <script src="app.js"></script>
    <link rel="stylesheet" href="style-produit.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">

</head>
<body>
    <?php
        if(isset($_SESSION['product_add_in_panier'])) {
            if($_SESSION['product_add_in_panier'] == true) {
                $error_message = "Votre produit a été ajouter dans la panier avec succès";
                echo '<script type="text/javascript">window.alert("'.$error_message.'");</script>';
            }
        }
    ?>
<nav>
        <div class="left">

        </div>
        <div class="center">
            <ul class="ul-nav">
                <li class="li-nav ln1"><a href="index.php" class="a-link">Acceuil</a></li>
                <li class="li-nav ln2">Contact</li>
                <li class="li-nav ln3"><a href="index.php">Connexion</a> </li>
            </ul>
        </div>
        <div class="right">

        </div>
    </nav>
    
    <main>
    <div class="container-grid-product">
        <?php
        include_once "product_dbb.php";
        // afficher la liste des produits 
        $req = mysqli_query($connexion, "SELECT * FROM produits");
        $index = 1; // Variable pour l'index

        while ($produit = mysqli_fetch_assoc($req)) {
            $product_class = "product p" . $index; // Classe unique pour chaque produit
        ?>
            <div class="<?= $product_class ?>">
                <div class="img-product imgp1">
                    <a href="#" class="link-img-product lip1"><img src="<?= $produit['img'] ?>" alt="" class="img-product-image ipi1"></a>
                </div>
                <div class="text-product tp1">
                    <div class="titre-product tp1">
                        <form action="traitement-panier.php" method="post">
                            <h4 style="text-decoration: underline;"><?= $produit['name'] ?></h4>
                            Prix : <?= $produit['price'] ?>$
                            <br>
                            <?php echo $produit['Description'] ?>
                            <br>
                            <br>
                            <p>suite de la description</p>
                            <br>
                            <a href="traitement-panier.php?id=<?= $produit['id'] ?>" class="btn-submit">Ajouter au panier</a>
                        </form>
                    </div>
                </div>
            </div>
        <?php
            $index++; // Incrémenter l'index pour le prochain software
        } // Fin de la boucle while
        ?>
    </div>
</main>
</body>
</html>