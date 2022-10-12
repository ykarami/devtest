<?php 
    session_start();
    if(isset($_SESSION['user'])){
        require_once('connexiondb.php');
        ini_set('display_errors', 'on');
        ini_set('display_errors', 'on');

        $idUtilisateur = isset($_GET['idUtilisateur'])?$_GET['idUtilisateur']:"";

        $requet= "SELECT * FROM utilisateur WHERE idUtilisateur='$idUtilisateur' ";

        $resultat = $pdo->query($requet);
        $utilisateur = $resultat->fetch();

        $one = 1;
        $zero = 0;
        
        $etat = $utilisateur['etat'];

        echo $etat;
        
        if($etat==0){
            $request = "UPDATE utilisateur SET etat=? WHERE idUtilisateur=?";
            $params = array(1,$idUtilisateur);
            $resultat = $pdo->prepare($request);
            $resultat->execute($params);
            
        }else{
            $request = "UPDATE utilisateur SET etat=? WHERE idUtilisateur=?";
            $params = array(0,$idUtilisateur);
            $resultat = $pdo->prepare($request);
            $resultat->execute($params);

        }

        header('location:utilisateurs.php');
    }else{
        header('location:login.php');
    }

?>