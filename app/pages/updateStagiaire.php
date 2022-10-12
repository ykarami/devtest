<?php 
    require_once("identifier.php");
    require_once('connexiondb.php');
    ini_set('display_errors', 'on');

    $idS = isset($_POST['idS'])?$_POST['idS']:0;
    $nomS = isset($_POST['nom'])?$_POST['nom']:"";
    $prenomS = isset($_POST['prenom'])?$_POST['prenom']:"";
    $civiliteS = isset($_POST['civilite'])?$_POST['civilite']:"";
    $idF = isset($_POST['filiere'])?$_POST['filiere']:0;

    echo $idS;

    $request = "UPDATE stagiaire SET nom=?, prenom=?, civilite=?, idFiliere=? WHERE idStagiaire=$idS";
    $params = array($nomS,$prenomS,$civiliteS,$idF);
    $resultat = $pdo->prepare($request);
    $resultat->execute($params);

   header('location:stagiaires.php');

?>