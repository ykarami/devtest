<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nouvelle filièere</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <?php include("menu.php"); ?>

        <div class="container">    
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Entrer les informations de la filiere :</div>
                <div class="panel-body">
                    <form method="post" action="insertFilieres.php" class="form">
                        <div class="form-group">
                            <label for="niveau">Nom de la fieliere :</label> 
                            <input type="text" name="nomF" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="niveau">Niveau :</label> 
                        <select name="niveau" class="form-control" id="niveau">
                                <option value="M">Master</option>
                                <option value="L">Licence</option>
                                <option value="TS" selected >Technicien Spécialisé</option>
                                <option value="T">Technicien</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" > <span class="glyphicon glyphicon-save"></span> Enregister</button>
                        </div>      
                    </form>
                </div>
                
            </div>
        </div>   
</body>
</html>