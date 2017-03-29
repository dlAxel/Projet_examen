<?php
require_once 'config.php';


if (isset($_REQUEST['invit_token'])) {

    if (strlen(getMailFromInvitToken($_REQUEST['invit_token'])) <= 0) {
        // no invitation, return to main page.
        header('Location: ../index.html');
        exit();
    }

    acceptInvit($_REQUEST['invit_token']);
} else {
    header('Location: ../index.html');
    exit();
}
?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <link rel="stylesheet" type="text/css" href="../HTML/CSS/Page_addAccount.css">
        <title>Page d'inscription</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    </head>
    <body>
        <ul>
            <li><a href="../index.html">Accueil</a></li>
            <li><a href="../HTML/Page_addAccount.html">Inscription</a></li>
            <li><a href="../HTML/page_connexion.html">Connexion</a></li>
            <li><a href="../HTML/Page_CGU.html">CGU</a></li>
            <li style="float:right"><a class="active" href="../HTML/A_propos.html">A propos</a></li>
        </ul>

        <h1 class="h1">Création d'un compte !</h1>
        <form action="../PHP/function_addAccount.php" method="POST">
            <div class="centerdiv">
                <table class="table-add-file">

                    <tr class="align">
                        <td class="form-add-user"> <label for="nom">Nom : </label> </td>
                        <td>
                            <input type="text" id="nom" name="nom" placeholder="Entrez le nom"/><br>
                        </td>
                    </tr>

                    <tr class="align">
                        <td class="form-add-user"> <label for="prenom">Prénom : </label> </td>
                        <td>
                            <input type="text" id="prenom" name="prenom" placeholder="Entrez le prénom"/><br>
                        </td>
                    </tr>

                    <tr class="align">
                        <td class="form-add-user"> <label for="email">Email : </label> </td>
                        <td>
                            <input type="email" id="email" name="email" placeholder="Entrez l'adresse Email" value="<?php echo getMailFromInvitToken($_REQUEST['invit_token']); ?>" disabled/><br>
                        </td>
                    </tr>

                    <tr class="align">
                        <td class="form-add-user"> <label for="mdp">Mot de passe : </label> </td>
                        <td>
                            <input type="password" id="mdp" name="mdp" placeholder="Entrez votre mot de passe"/><br>
                        </td>
                    </tr>

                    <tr class="align">
                        <td class="form-add-user"> <label for="confirmMDP">Retaper votre mot de passe : </label> </td>
                        <td>
                            <input type="password" id="confirmMDP" name="confirmMDP" placeholder="Confirmez votre mot de passe"/>
                        </td>
                    </tr>
                </table>

            </div>

            <div id="result" class="warning"></div>

            <div class="w3-container">
                <button class="w3-btn w3-hover-red" input type="button" name="connexion" onclick="addAccountAjax()">Valider</button>
                <a href="../HTML/Page_daccueil.html">
                    <button class="w3-btn w3-hover-red" input type="button" name="inscription"  >Annuler</button></a>
        </form>
    </div>
    <script>

        function addAccountAjax() {

            var nom = document.getElementById("nom").value;
            var prenom = document.getElementById("prenom").value;
            var email = document.getElementById("email").value;
            var pass = document.getElementById("mdp").value;
            var confirmPass = document.getElementById("confirmMDP").value;


            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var err = parseInt(this.responseText, 10);

                    if (err === 1) {
                        document.getElementById("result").innerHTML = "Veuillez renseigner tous les champs";
                    } else if (err === 2) {
                        document.getElementById("result").innerHTML = "Veuiller retaper votre mot de passe";
                    } else {
                        document.getElementById("nom").value = "";
                        document.getElementById("prenom").value = "";
                        document.getElementById("email").value = "";
                        document.getElementById("mdp").value = "";
                        document.getElementById("confirmMDP").value = "";
                        window.location.href = "../HTML/page_connexion.html";
                    }


                }
            };

            if (pass == confirmPass) {

                xhttp.open("POST", "function_addAccount.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("nom=" + nom + "&prenom=" + prenom + "&email=" + email + "&mdp=" + pass + "&confirmMdp=" + confirmPass);
            }

        }
    </script>
</body>
</html>


<?php

function acceptInvit($invitToken) {
    global $bdd;
    $query = 'UPDATE `amis` SET `ami_confirm`=1 WHERE `invit_token`=' . $bdd->quote($invitToken);
    try {
        $bdd->exec($query);
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function getMailFromInvitToken($invitToken) {
    global $bdd;
    $query = 'SELECT `ami_to` FROM `amis` WHERE `invit_token`=' . $bdd->quote($invitToken);

    try {
        $sth = $bdd->query($query);
        $data = $sth->fetchAll();
        if (count($data)) {
            return $data[0]['ami_to'];
        }
        return '';
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
    return null;
}
?>