    <?php 
    
    
    ?>
    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="../index.php" class="navbar-brand"> Gestion des stagiaires</a>
        </div>
        <ul class="nav navbar-nav">
                <li><a href="stagiaires.php"><i class="glyphicon glyphicon-list-alt "></i> Stagiaires </a></li>
                <li><a href="filieres.php"> <i class="glyphicon glyphicon-tags "></i>  Filieres </a></li>
                <li><a href="utilisateurs.php"> <i class="glyphicon glyphicon-user "></i> Utilisateurs </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
                <li><a href="editCompte.php?id=<?php echo $_SESSION['user']['idUtilisateur'] ?>"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['user']['login']?> </a></li>
                <li><a href="seDeconnecter.php"><i class="glyphicon glyphicon-log-out"></i> Se deconnecter</a></li>
        </ul>
    </div>
    
</nav>        