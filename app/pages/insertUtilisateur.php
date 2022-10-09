<?php
    require_once('connexiondb.php');

    $login = isset($_POST['login'])?$_POST['login']:"";
    $email = isset($_POST['email'])?$_POST['email']:"";
    $role = isset($_POST['role'])?$_POST['role']:"";
    $etat = isset($_POST['etat'])?$_POST['etat']:"";

    $requet = "INSERT INTO utilisateur(login, email, role, etat) VALUES(?, ?, ?, ?)";
    $params = array($login,$email,$role,$etat);
    $resultat = $pdo->prepare($requet);
    $resultat->execute($params);

    header('location:utilisateurs.php')

?>