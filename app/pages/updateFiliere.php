<?php
    require_once('connexiondb.php');
    $idF = isset($_POST['idF'])?$_POST['idF']:0;
    $nomF = isset($_POST['nomF'])?$_POST['nomF']:"";
    $niveauF = isset($_POST['niveau'])?$_POST['niveau']:"";


    $requet = "UPDATE filiere SET NomFiliere=?, niveau=? WHERE idFiliere=?";
    $params = array($nomF,$niveauF,$idF);
    $resultat = $pdo->prepare($requet);
    $resultat->execute($params);
    header('location:filieres.php');






?>