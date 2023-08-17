<?php
session_start();
$connexion_data = '';

class traitement_data_connexion {
    // recois les information de connexion 
    public function rcv_connexion() {
        $mail = $_POST['mail'];
        $password = $_POST['mdp'];
        $data_connexion = array(
            'mail' => $mail,
            'password' => $password
        );
        return $data_connexion;
    }
    // verifie les informations de connexion pour qu'il rentre bien dans les criteres
    function data_traitement($data) {
        if(empty($data['mail'])) {
            $check_mail = 'empty';
        } else {
            $check_mail = 'checked';
        }
        if(empty($data['password'])) {
            $check_password = 'empty';
        } else {
            $check_password = "checked";
        }
        if($check_password == 'empty' || $check_mail == 'empty') {
            return False;
        } else {
            return True;
        }
    }
    // *! apres les verification sur les data des fonctions precedente renvoi le resultat de la verificaiton
    // *!dans le but de l'authentification sur la page index.php et si resultat True alors renvoi egalement l'adrresse
    // *!mail de l'utilisateur
    function send_result($data) {
        $_SESSION['valid_data'] = $data['data'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['id'] = $data['id'];
    }
}


// appelle les fonctions pour verifier les donners
$function_traitement = new traitement_data_connexion();
while($connexion_data == '') {
    $connexion_data = $function_traitement->rcv_connexion();
}
$valid_data  = $function_traitement->data_traitement($connexion_data);


// renvoi si oui ou non il faut afficher un message qui dit aue le mot de passe ou l'adresse mail
// n'est pas valide
$data_all = array('data'=>$valid_data);
// envoie les resultat a index.php



// *TODO: Coder la gestion des infomations dans la base de donnement
if($valid_data == True) {
    // **coder ici les commande qui verifirons l'identite de la personne dans la base de donne 
    // *TODO: Lien de la video pour apprendre a utiliser une base de donner : https://www.youtube.com/watch?v=OZ2yDVcDjpc&ab_channel=Graven-D%C3%A9veloppement
    // *TODO: Lien de la video pour integrer la base de donner a PHP 3.01 minutes : https://www.youtube.com/watch?v=8vIBeDVfOrs&ab_channel=Graven-D%C3%A9veloppement


    // declarer la base de donne et s'y connect
    include 'database.php';
    global $db;
    // integre les valeurs de la base de donne dans $q soumis la condition WHERE mail = " . $connexion_data['mai'], cette condition permet de se limiter au l'adresse mail qui est donner donc de retrouver son id, mot de passe, username
    $stmt = $db->prepare('SELECT * FROM users WHERE mail = :mail');
    $stmt->bindParam(':mail', $connexion_data['mail']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user) {
        $password_database = $user['password'];
        // condition modifier
        if($password_database == $connexion_data['password']) {
            $data_all = array(
                'data'=>$valid_data,
                'id'=>$user['id'],
                'username'=>$user['pseudo'],
            );
            $function_traitement->send_result($data_all);
        } else {
            $valid_data = False;
            $data_all = array(
                'data'=>$valid_data
            );
            $function_traitement->send_result($data_all);
        }
    } else {
        $valid_data = False;
        $data_all = array('data'=>$valid_data);
        $function_traitement->send_result($data_all);
    }
}
header("location: index.php");
exit;
?>