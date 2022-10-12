<?php
        require_once("identifier.php");
        require_once("identifier.php");
        if(!isset($_SESSION['user'])){

            header('location:login.php');
        }

        require_once("connexiondb.php");
        ini_set('display_errors', 'on');

        $login = isset($_GET['login'])?$_GET['login']:"all";

        
        if($login=="all"){
            $requestUtilisateur = "SELECT * FROM utilisateur";
            $requestUtilisateurCount = "SELECT COUNT(*) countU FROM utilisateur";
        }else{
            $requestUtilisateur = "SELECT * FROM utilisateur WHERE login LIKE '%$login%'";
            $requestUtilisateurCount = "SELECT COUNT(*) countU FROM utilisateur WHERE login LIKE '%$login%'";
        }
        
        $resultatUtilisateur = $pdo->query($requestUtilisateur);
        $resultatUtilisateurCount = $pdo->query($requestUtilisateurCount);

        $tabCount = $resultatUtilisateurCount->fetch();

        $nbrU = $tabCount['countU'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> 
    <link rel="stylesheet" type="text/css" href="../css/style.css">     
</head>
<body>
    <?php include("menu.php"); ?>

        <div class="container">    
            <div class="panel panel-default margetop">
                <div class="panel-heading">Rechercher des utiliateurs</div>
                <div class="panel-body">
                    <form method="get" action="utilisateurs.php"class="form-inline">
                        <div class="form-group">
                            <label for="login">username : </label>
                            <input type="text" name="login" placeholder="Tapez le username" class="form-control" value="" id="login">
                        </div>
                        <button type="submit" class="btn btn-success" > <span class="glyphicon glyphicon-search"></span> Chercher...</button>
                        &nbsp &nbsp
                        <a href="newUtilisateur.php"><span class="glyphicon glyphicon-plus"> </span> Nouveau utilisateur</a>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Liste des Utilisateurs: (<?php echo $nbrU ?>) Utilisateurs</div>     

                <div class="panel-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>id Utilisateurs</th><th>Username </th><th>Email</th><th>Role</th><th>Etat</th><th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($utilisateur=$resultatUtilisateur->fetch()){?>
                            <tr>
                                <td><?php echo $utilisateur['idUtilisateur'] ?></td>
                                <td><?php echo $utilisateur['login']?></td>
                                <td><?php echo $utilisateur['email']?></td>
                                <td><?php echo $utilisateur['role']?></td>
                                <td><?php echo $utilisateur['etat']?></td>
                                <td>
                                    <a href="editUtilisateur.php?idUtilisateur=<?php echo $utilisateur['idUtilisateur']?>">
                                        <span class="glyphicon glyphicon-edit"> </span>
                                    </a>
                                     &nbsp 
                                    <a onclick="return confirm(' etes vous sur de suprimer')" href="deleteUtilisateur.php?idUtilisateur=<?php echo $utilisateur['idUtilisateur'] ?>" >
                                        <span class="glyphicon glyphicon-trash"> </span>
                                    </a>&nbsp &nbsp 
                                    <a href="changeEtat.php?idUtilisateur=<?php echo $utilisateur['idUtilisateur'] ?>">
                                       <?php
                                            if($utilisateur['etat']==1)
                                               echo  '<span class="glyphicon glyphicon-remove"> </span>';
                                            else
                                                echo '<span class="glyphicon glyphicon-ok"> </span>';
                                       ?>
                                    
                                    </a>


                                </td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                    
                </div>   
            </div>
        </div>   

</body>
</html>
