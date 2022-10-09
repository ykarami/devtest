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
                <div class="panel-heading">Entrer les informations de l'utilisateur :</div>
                <div class="panel-body">
                    <form method="post" action="insertUtilisateur.php" class="form">
                        <div class="form-group col-xs-5">
                            <label for="login">Login:</label> 
                            <input type="text" name="login" class="form-control" id="login">
                        </div>
                        <div class="form-group col-xs-5">
                            <label for="email">email :</label> 
                            <input type="text" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group col-xs-5">
                            <label for="role">Role :</label> 
                            <select name="role" id="role" class="form-control">
                                <option value="ADMIN">ADMIN</option>
                                <option value="VISITEUR">VISITEUR</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-5">
                            <label for="etat">Etat :</label> 
                            <select name="etat" id="etat" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-5">
                            <button type="submit" class="btn btn-success" > <span class="glyphicon glyphicon-save"></span> Enregister</button>
                        </div>      
                    </form>
                </div>
                
            </div>
        </div>   
</body>
</html>