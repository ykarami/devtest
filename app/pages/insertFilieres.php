<?php
    require_once('connexiondb.php');

    $nomF = isset($_POST['nomF'])?$_POST['nomF']:"";
    $niveau = isset($_POST['niveau'])?$_POST['niveau']:"";

    $requet = "INSERT INTO filiere(NomFiliere, niveau) VALUES(?,?)";
    $params = array($nomF,$niveau);
    $resultat = $pdo->prepare($requet);
    $resultat->execute($params);

    header('location:filieres.php')

?>