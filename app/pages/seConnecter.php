<?php
    session_start();
    ini_set('display_errors', 'on');
    require_once('connexiondb.php');

    $login = isset($_POST['login'])?$_POST['login']:"";
    $password = isset($_POST['password'])?$_POST['password']:"";


    $request = "SELECT * FROM utilisateur WHERE login='$login' AND pwd=MD5('$password')";

    $resultat = $pdo->query($request);

    if($user = $resultat->fetch()){
        if($user['etat']==1){
            $_SESSION['user'] = $user;
            header('location:../index.php');
        }else{
            $_SESSION['erreurLogin'] = "Erreur : Compte desable.Contact Admin";
            header('location:login.php');
        }
    }else{
         $_SESSION['erreurLogin'] = "Erreur : Login ou mot de passe incorrect !! ";      
         header('location:login.php');
    }





?>