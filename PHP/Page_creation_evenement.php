<!doctype html>
<html>
	<head>
		<meta charset='utf-8'>
			<link rel="stylesheet" type="text/css" href="../Vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="../HTML/CSS/Page_creation_evenement.css">
		<title>Page principale</title>
	</head>
	<body>
        <form action="function_creation_evenement.php" method="POST">
        
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
                            <table  width="100%">
                                <tr>
                                    <td class="text">
                                        Nom de l'évènement :
                                    </td>
                                    <td class="champ">
                                        <input type="text" name="Nom">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text">
                                        Adresse de l'évènement :
                                    </td>
                                    <td class="champ"> 
                                        <input type="text" name="Adresse">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text">
                                        Ville : 
                                    </td>
                                    <td class="champ">
                                        <input type="text" name="Ville">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text">
                                        Code postal :
                                    </td>
                                    <td class="champ">
                                        <input type="text" size="5" maxlength="5" name="CP">
                                    </td>
                                </tr>
                            </table>    
                        </div> 
                    
                        <div class="col-lg-5 center">
                            <table>
                                <tr>
                                    <td class="text-2">
                                        Date de l'évènement : 
                                    </td>
                                    <td class="champ-2">
                                        <input type="date" size="10" name="jour">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-2">
                                        Heure de début :
                                    </td> 
                                    <td class="champ-2">
                                        <input type="text" maxlength="2" size="2" name=""><span>h</span><input type="text" size="2" name="">
                                    </td>
                                </tr>
                                    <tr>
                                    <td class="text-2">
                                        Heure de fin :
                                    </td>
                                    <td class="champ-2">
                                        <input type="text" maxlength="2" size="2" name=""><span>h</span><input type="text" size="2" name="">
                                    </td>
                                </tr>
                                    <tr>
                                        <form>
                                            <td class="text-2">
                                                Mineur accepté :
                                            </td>
                                            <td class="champ-2">
                                                <select>
                                                    <option>Oui
                                                    <option>Non
                                                </select>
                                            </td>
                                        </form>
                                    </tr>
                                    <tr>
                                        <form>
                                            <td class="text-2">
                                                Visibilité :
                                            </td>
                                            <td class="champ-2">    
                                               <select>
                                                    <option>Public
                                                    <option>Privé
                                                </select>
                                            </td>
                                        </form>    
                                    </tr>
                                </div>
                            </table>
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
                    </form>
                </div>
            </div>                    	
        </div>
    </body>
</html>