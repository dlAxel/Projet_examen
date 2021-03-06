<?php

include('config.php');


$name = ucfirst(strtolower($_POST['nom'])) . " " . ucfirst(strtolower($_POST['prenom']));

if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mdp']) || empty($_POST['confirmMdp'])) {

   /* return an error with Ajax*/
    echo "1";
    exit(0);
}

if ($_POST['mdp'] == $_POST['confirmMdp']) {
    $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
    $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $mdp = filter_var($_POST['mdp'], FILTER_SANITIZE_STRING);
    createAccount($nom, $prenom, $email, $mdp);
    
    echo "0";
    exit(0);
} else {
    
    echo "2";
    exit(0);
}

echo "99";
/* function allowing to create an account*/
function createAccount($inLName, $inFName, $inMail, $inPassword) {
    global $bdd;
    $query = null;
    try {
        $hash = password_hash($inPassword, PASSWORD_BCRYPT);
        $query = "INSERT INTO `compte`(`nom`, `prenom`, `email`, `mdp`) VALUES (" . $bdd->quote($inLName) . ", " . $bdd->quote($inFName) . ", " . $bdd->quote($inMail) . ", " . $bdd->quote($hash) . ")";
        echo $query;
        $bdd->exec($query);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
