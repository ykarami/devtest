<?php
    session_start();
    if(isset($_SESSION['user'])){
        require_once('connexiondb.php');
        ini_set('display_errors', 'on');

        $idStagiaire = isset($_GET['idStagiaire'])?$_GET['idStagiaire']:0;

        $request = "DELETE FROM stagiaire WHERE idStagiaire= ?";
        $params = array($idStagiaire);

        $resulat = $pdo->prepare($request);
        $resulat->execute($params);

        header('location:stagiaires.php');
    }else{
        header('location:login.php');
    }


?>