<?php

require_once('config.php');

recupUtilisateur();

function recupUtilisateur() {
	global $bdd;
    $query = null;

    $query="SELECT `nom`, `prenom` FROM `compte`";
    $sth = $bdd->query($query);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    print_r($result);

}