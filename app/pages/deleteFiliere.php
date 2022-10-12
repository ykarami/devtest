<?php
    session_start();
    if(isset($_SESSION['user'])){
        require_once('connexiondb.php');
        $idF = isset($_GET['idF'])?$_GET['idF']:0;

        $requetCount = "SELECT COUNT(*) countStag FROM stagiaire WHERE idFiliere=$idF";
        $resultat = $pdo->query($requetCount);
        $tabCountStag = $resultat->fetch();
        $nbrStag = $tabCountStag['countStag'];
        if($nbrStag==0){
        $requet = "DELETE FROM filiere WHERE idFiliere= ?";
        $params = array($idF);
        $resultat = $pdo->prepare($requet);
        $resultat->execute($params);
        header('location:filieres.php');
        }else{
            $msg = "Erreur de supperission : Filiere contient des stagiaire !! ";
            header("location:alerte.php?message=$msg");
        }
    }else{
        header("location:login.php");
    }  

    

?>