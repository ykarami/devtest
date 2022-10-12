<?php
    require_once("identifier.php");
    require_once('connexiondb.php');
    ini_set('display_errors', 'on');

    $nomS = isset($_POST['nom'])?$_POST['nom']:"";
    $prenomS = isset($_POST['prenom'])?$_POST['prenom']:"";
    $civiliteS = isset($_POST['civilite'])?$_POST['civilite']:"";
    $filiereS= isset($_POST['filiere'])?$_POST['filiere']:0;

    $requet = "INSERT INTO stagiaire(nom, prenom, civilite, idFiliere) VALUES(?,?,?,?)";
    $params = array($nomS,$prenomS, $civiliteS,$filiereS);
    $result = $pdo->prepare($requet);
    $result->execute($params);

    header('location:stagiaires.php')

?>