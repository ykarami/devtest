<?php
    session_start();
        if(isset($_SESSION['user'])){
        require_once('connexiondb.php');
        ini_set('display_errors', 'on');

        $idUtilisateur = isset($_GET['idUtilisateur'])?$_GET['idUtilisateur']:0;

        $request = "DELETE FROM utilisateur WHERE idUtilisateur= ?";
        $params = array($idUtilisateur);

        $resulat = $pdo->prepare($request);
        $resulat->execute($params);

        header('location:utilisateurs.php');
    }else{
        header('location:login.php');
    }

?>