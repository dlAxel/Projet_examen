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
        <title>Invitation événement privé</title>
    </head>
    <body>
        <!--<form method="GET">-->
        <div class="container-fluid full-height nopadding">
            <div class="row full-height nopadding">
                <div class="col-lg-3 col-md-2 col-sm-3 col-xs-5 full-height nopadding">
                    <?php include 'sideMenu.inc.php'; ?>
                </div>

                <div class="col-lg-9 col-md-10 col-sm-9 col-xs-7 full-height">

                    <div class="row">
                        <h1>Liste d'amis</h1> 
                    </div>
                    <div class="row">
                        
                        <form action="#" method="post">
                            <h2>Inviter un nouvel ami</h2>
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