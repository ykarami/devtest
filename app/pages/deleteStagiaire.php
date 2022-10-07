<?php
    $idStagiaire = isset($_GET['idStagiaire']?$_GET['idStagiaire']:0);

    $request = "DELETE FROM stagiaire WHERE idStagiaire= ?";
    $params = array($idStagiaire);

    $resulat = $pdo->prepare($request);
    $resulat->execute($params);




    header('location:stagiaires.php');


?>