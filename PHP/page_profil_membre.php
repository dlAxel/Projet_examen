<!doctype html>
<html>
	<head>
		<meta charset='utf-8'>
			<link rel="stylesheet" type="text/css" href="../Vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="../HTML/CSS/page_principale.css">
		<title>Page profile membre</title>
	</head>
	<body>
        <form method="post"></form>
    
        
            <div class="sidebar1">
                <div class="logo">
                    <a class="img-responsive center-block" href="ton_lien.html">
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
                        <li><a href="#">zbeub</a></li>
                    </ul>

                    <br>
               	<div class="bouton">
					<a href="deconnexion.php" class="button" type="submit">Déconnexion</a>
				</div>

                </div>
            </div>
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-offset-2 col-lg-12">
                        <?php
                        require_once('config.php');
                        recupInfo();

                        function recupInfo() {
                            "SELECT `profile_image` FROM `compte` WHERE `id`";
                        }
                                
                        ?>  
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>