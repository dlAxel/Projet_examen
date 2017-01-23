<?php

	session_start();
	var_dump($_REQUEST);
	include('config.php');

	$email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
	$mdp = filter_var($_POST['mdp'],FILTER_SANITIZE_STRING);

	//verify the textfield are empty if not empty he execute the function 
	if (empty ($email) || empty($mdp)) {
		die('Remplie tout les champs pout te connecter.');
	} 
		connexion();

	function connexion() {
		global $bdd;
		$query = null;

		$query = "SELECT `email`, `mdp` FROM `compte`";
		if ($result === )
		exec($query);
	}

//SELECT `email`, `mdp` FROM `compte`