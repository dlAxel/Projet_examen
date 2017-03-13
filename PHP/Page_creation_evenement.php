<!doctype html>
<html>
	<head>
		<meta charset='utf-8'>
			<link rel="stylesheet" type="text/css" href="../Vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="../HTML/CSS/Page_creation_evenement.css">
		<title>Page principale</title>
	</head>
	<body>
        <form method="POST"></form>
        
            <div class="sidebar1">
                <div class="logo">
                    <a class="img-responsive center-block" href="ton_lien.html">
                        <img src="../HTML/CSS/default.png" class="img-responsive center-block" alt="Logo">
                    </a>
                </div>
                <br>
                <div class="left-navigation">
                    <ul class="list">
                        <h5><strong>TEST</strong></h5>
                        <li><a href="page_principale.php">Accueil</a></li>
                        <li><a href="Page_creation_evenement.php">Créer un évènement</a></li>
                        <li><a href="page_Map.php">Google map</a></li>
                        <li><a href="#">Amis</a></li>
                        <li><a href="page_profil_membre.php">Profil</a></li>
                        <li><a href="#">Art Class</a></li>
                    </ul>

                    <br>
               	<div class="bouton">
					<a href="deconnexion.php" class="button" type="submit">Déconnexion</a>
				</div>

                </div>
            </div>
            <div class="container-fluid">
            	
            		<div class="col-lg-offset-3 col-lg-9">

            			<h1 class="titre">Créer votre évènement !</h1>
                        <h2 class="h2">Veuiller renseigner les champs</h2>
            		</div>

                    <div class="row">          
                        <div class="col-lg-offset-2 col-lg-5 center">
                            <p>Nom de l'évènement : <input type="text" name="Nom">

                            <p>Adresse de l'évènement : <input type="text" name="Adresse">

                            <p>Ville : <input type="text" name="Ville">

                            <p>Code postal : <input type="text" size="5" maxlength="5" name="CP">
                        </div> 
                    
                        <div class="col-lg-5 center">
                            <p>Date de l'évènement : <input type="date" size="10" name="jour">

                            <p>Heure de début : <input type="text" maxlength="2" size="2" name=""><span>h</span><input type="text" size="2" name="">

                            <p>Heure de fin : <input type="text" maxlength="2" size="2" name=""><span>h</span><input type="text" size="2" name="">
                        
                            <form>
                            
                                <p class="menu">Mineur accepté :</p>
                                
                                    <select class="menu">
                                        <option>oui
                                        <option>non
                                    </select>
                            
                            </form>
                        </div>
                    </div>
            <div class="row">
                <div class="col-lg-offset-2 col-lg-10 center">
                    <p>Liste de chose a ramener : </p><textarea name="textarea"rows="4" cols="50"></textarea>
                </div>

                <div class="col-lg-offset-2 col-lg-10 center">
                    <p>Tenue requise : </p><textarea name="textarea"rows="4" cols="50"></textarea>                     
                </div>
                <div class="col-lg-offset-2 col-lg-10 center">
                    <button type="submit" class="btn btn-success">Envoyer</button>
                </div>
            </div>                    	
        </div>
    </body>
</html>