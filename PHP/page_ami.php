<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <link rel="stylesheet" type="text/css" href="../Vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../HTML/CSS/page_ami.css">
        <title>Page ami</title>
    </head>
    <body>
        <form method="post"></form>

        <div class="sidebar1">
            <div class="logo">
                <a class="img-responsive center-block" href="page_profil_membre.php">
                    <img src="../HTML/CSS/default.png" class="img-responsive center-block" alt="Logo">
                </a>
            </div>
            <br>
            <div class="left-navigation">
                <ul class="list">
                    <h5><strong>Menu</strong></h5>
                    <li><a href="page_principale.php">Accueil</a></li>
                    <li><a href="Page_creation_evenement.php">Créer un évènement</a></li>
                    <li><a href="page_Map.php">Google map</a></li>
                    <li><a href="page_profil_membre.php">Profil</a></li>
                    <li><a href="#">Guide d'utilisation</a></li>
                </ul>

                <br>
               	<div class="bouton">
                    <a href="deconnexion.php" class="button" type="submit">Déconnexion</a>
                </div>
            </div>
        </div>
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-offset-6 col-lg-6">
                    <h1>Liste d'amis</h1> 
                </div>
                <div class="row">
                    <div class="col-lg-offset-2 col-lg-10">
                        <input type="search" placeholder="Entrez un mot-clef" name="the_search">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>