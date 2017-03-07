<?php
$bdd = null;
try {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=projet_final;charset=utf8', 'root', 'riejubetaktm');
}
catch(Exception $e) {

    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
?>