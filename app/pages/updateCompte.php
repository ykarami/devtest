<?php 
    session_start();
    if(isset($_SESSION['user'])){
    require_once('connexiondb.php');
    ini_set('display_errors', 'on');

    $id = isset($_POST['id'])?$_POST['id']:0;
    $login = isset($_POST['login'])?$_POST['login']:"";
    $email = isset($_POST['email'])?$_POST['email']:"";



    $request = "UPDATE utilisateur SET login=?, email=? WHERE idUtilisateur=?";
    $params = array($login,$email,$id);
    $resultat = $pdo->prepare($request);
    $resultat->execute($params);

    header('location:filieres.php');
    }else{
        header('location:login.php');
    }

?>