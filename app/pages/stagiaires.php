<?php
    require_once('connexiondb.php');

    $choice = isset($_GET['choice'])?$_GET['searchC']:"";
    $search = isset($_GET['search'])?$_GET['choice']:"";


    if($choice=="idS"){
        $requet = "SELECT * FROM stagiaire WHERE idStagiaire=$search";
    }elseif($choice=="prenomS"){
        $requet = "SELECT * FROM stagiaire WHERE nom=$search";
    }else{
        $requet = "SELECT * FROM stagiaire WHERE prenom=$search"; 
    }

    









    $requetAll = "SELECT * FROM stagiaire";
    $resultatAll = $pdo->query($requetAll);


    


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des filièere</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <?php include("menu.php"); ?>

        <div class="container">    
            <div class="panel panel-default margetop">
                <div class="panel-heading">Rechercher des Stagiaires</div>
                <div class="panel-body">
                    <div>
                        <form method="get" action="stagiaires.php" class="form-inline ">
                            <div class="form-group">
                            <label for="Choose">Chercher par :</label>
                                <select name="choice" class="form-control" id="choose">
                                    <option value="idS" selected>ID</option>
                                    <option value="prenomS" >Prénom</option>
                                    <option value="NnomS">Nom</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tet">===></label>
                                <input type="text" name="search" class="form-control" id="tet">
                            </div>&nbsp
                            <div class="form-group">
                                <button class="btn btn-success">Rechercher..</button>
                            </div>    
                        </form>
                    </div>

                </div>
            </div>
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Liste des Stagiaires</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>ID</th><th>Prénom</th><th>Nom</th><th>Civilité</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($stagiaire = $resultatAll->fetch()){ ?>
                                <tr>
                                    <td><?php echo $stagiaire['idStagiaire'] ?></td>
                                    <td><?php echo $stagiaire['prenom'] ?></td>
                                    <td><?php echo $stagiaire['nom'] ?></td>
                                    <td><?php echo $stagiaire['civilite'] ?></td>
                                </tr>
                             <?php } ?>   
                        </tbody>


                    </table>
                </div>
            </div>
        </div>   

</body>
</html>