<?php 
    require_once("identifier.php");
    require_once('connexiondb.php');
    ini_set('display_errors', 'on');

    $idS = isset($_POST['idS'])?$_POST['idS']:0;
    $login = isset($_POST['login'])?$_POST['login']:"";
    $email = isset($_POST['email'])?$_POST['email']:"";
    $role = isset($_POST['role'])?$_POST['role']:"";
    $etat = isset($_POST['etat'])?$_POST['etat']:0;


    $request = "UPDATE utilisateur SET login=?, email=?, role=?, etat=? WHERE idUtilisateur=?";
    $params = array($login,$email,$role,$etat,$idS);
    $resultat = $pdo->prepare($request);
    $resultat->execute($params);

    header('location:utilisateurs.php');

?>