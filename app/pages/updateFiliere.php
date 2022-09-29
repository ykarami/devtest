<?php
    require_once('connexiondb.php');
    $idF = isset($_POST['idF'])?$_POST['idF']:0;


    $requet = "UPDATE filiere SET NomFiliere=?, niveau=? WHERE idFiliere=?";
    $params = array($nomF,$niveau,$idF);
    $resultat = $pdo->prepare($requet);
    $resultat->execute($params);
    header('location:filieres.php');






?>