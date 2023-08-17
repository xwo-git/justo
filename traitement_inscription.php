<?php
session_start();
$inscription_data = '';


class traitement_data_inscription {
    public function rcv_inscription() {
        $username = $_POST['username'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        $data = array(
            'username'=>$username,
            'mail'=>$mail,
            'password'=>$password,
            'password_confirm'=>$password_confirm
        );
        return $data;
    }
    public function data_traitement($data) {
        $result_traitement = True;
        if(empty($data['username']) or empty($data['mail']) or empty($data['password']) or empty($data['password_confirm'])) {
            $result_traitement = False;
        } else {
            $result_traitement = True;
        }
        return $result_traitement;
    }
    public function send_data($data) {
        $_SESSION['valid_data'] = $data['valid_data'];
        header("Location: index.php");
    }
}

$traitement_functions = new traitement_data_inscription();
while($inscription_data == '') {
    $inscription_data = $traitement_functions->rcv_inscription();
}

$valid_data = $traitement_functions->data_traitement($inscription_data);
$data_all = array(
    'valid_data'=>$valid_data,
    'username'=>$inscription_data['username']
);

if($valid_data == True) {
    // *TODO:Inscrire le code qui interagira avec la base de donne
    include 'database.php';
    global $db;
    // * Ce code ajoute grace a prepare dans les tables pseudo,mail,password en evitant la possibilite d'injection SQL
    $q = $db->prepare("INSERT INTO users(pseudo,mail,password) VALUES(:pseudo, :mail, :password)");
    $q->execute([
        'pseudo'=>$inscription_data['username'],
        'mail'=>$inscription_data['mail'],
        'password'=>$inscription_data['password']
    ]);
    $message = "Creation du compte creer avec succes veuillez vous connecter via le bouton : connexion !";
    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
    header("Location: index.php");
} else {
    $traitement_data_inscription->send_data($data_all);
}
?>
