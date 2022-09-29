<?php
    try{
    $pdo = new PDO("mysql:host=db;dbname=gestion_stag","yassine","Azerty1");
    }catch(Exception $e){
        die('Erreur de connexion :' .$e->getMessage());
    }
?>
