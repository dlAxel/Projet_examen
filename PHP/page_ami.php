<?php include_once('validConnection.inc.php'); ?>
<?php
if (empty(session_id())) {
    session_start();
    session_write_close();
}
?>
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
                    <li><a href="page_ami.php">Amis</a></li>
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

                        <form action="#" method="post">
                            <h1>Inviter un nouvel ami</h1>
                            <div id="msgInvit"></div>
                            <p>
                                <label for="nomPrenom">
                                    Entrez le Nom et Prénom :
                                </label>
                                <input type="text" name="nomPrenom" id="nomPrenom" />
                                <label for="mail">
                                    Entrez son e-mail :
                                </label>
                                <input type="email" name="mail" id="mail" />
                                <input type="button" value="Inviter" onclick="sendInvitationMail();" />
                            </p>
                        </form>

<!--<input type="search" placeholder="Entrez un mot-clef" name="the_search">-->
                    </div>
                </div>
            </div>
        </div>
        <script type ="text/javascript">
            function sendInvitationMail() {
                var email = document.getElementById('mail');
                var name = document.getElementById('nomPrenom');

                if (email.value.length && name.value.length) {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            var err = parseInt(this.responseText);
                            if (err == 0) {
                                // no error
                                document.getElementById("msgInvit").innerHTML = 'Merci ! un e-mail a été envoyé.';
                            } else {
                                document.getElementById("msgInvit").innerHTML = '<span class="alert-warning">Une erreur est survenue, vérifiez les informations.(' + this.responseText + ')</span>';
                            }
                        }
                    };


                    xhttp.open("POST", "../PHP/function_addFriend.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.send("nom=" + encodeURI(name.value) + "&email=" + encodeURI(email.value));
                }
            }
        </script>

    </body>
</html>