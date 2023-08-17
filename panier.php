<?php
    session_start();
    include_once "product_dbb.php";
    if(isset($_GET['del'])){
        $id_del = $_GET['del'];
        unset($_SESSION['id_product'][$id_del]);
    }
    if(!isset($_SESSION['id_product'])){
        $_SESSION['id_product'] = array();
    }
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="style-panier.css">
  <script src="app.js"></script>
  <link rel="stylesheet" href="style-produit.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet"> 
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="vanilla-tilt.js"></script>
</head>
<body>
    <div class="panier">
        <div class="top-bar">
            <div class="left">
                <a href="index.php"><ion-icon name="caret-back-outline"></ion-icon> Retour </a>
            </div>
            <div class="center">
                <h1>Panier</h1>
            </div>
            <div class="right">
            </div>
        </div>
        <div class="container-grid-product">
            
        <?php
        $id = array_keys($_SESSION['id_product']);
        $price = array();
        if(empty($id)) {
            echo '<h1 class="panier-vide">Votre panier est vide ! </h1>';
        }else {
            $products= mysqli_query($connexion, "SELECT * FROM produits WHERE id IN (".implode(',', $id).")");
            $index = 1; // Variable pour l'index
            foreach($products as $produit):
                $product_class = "product p" . $index; // Classe unique pour chaque produit
                $price = intval($produit['price']);
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
                            <br>
                            <a href="panier.php?del=<?= $produit['id'] ?>" class="rpl"><ion-icon name="trash-outline" class="rpi"></ion-icon></a>
                        </form>
                    </div>
                </div>
            </div>
        <?php
            $index++; // Incrémenter l'index pour le prochain produit
            endforeach; } // Fin de la boucle else
        ?>
    </div>
    </div>
    <footer>
        <div class="right-footer">

        </div>
        <div class="left-footer">
            <span> 
                <?php
                    
                    var_dump($total_price);
                    if($total_price == 0) {
                        echo "";
                    } else {
                        echo "Total : ".$total_price;
                    }
                ?>
            </span>
        </div>
    </footer>
</body>
</html>

