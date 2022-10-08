<?php 
    require_once('connexiondb.php');

    $idS = isset($_POST['idStagiare'])?$_POST['idStagiare']:0;
    $nomS = isset($_POST['nom'])?$_POST['nom']:"";
    $prenomS = isset($_POST['prenom'])?$_POST['nprenom']:"";
    $civiliteS = isset($_POST['civilite'])?$_POST['civiliteS']:"";
    $idF = isset($_POST['filiere'])?$_POST['filiere']:0;


    $request = "UPDATE stagiaire SET nom=?, prenom=?, civilite=?, idFiliere=? WHERE idStagiaire=$idS";
    $params = array($nomS,$prenomS,$civiliteS,$idF);
    $resultat = $pdo->prepare($requet);
    $resultat->execute($params);

    header('location:stagiaires.php');

?>