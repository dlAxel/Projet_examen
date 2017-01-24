<?php

	session_start();
	var_dump($_REQUEST);
	include('config.php');

	$email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
	$mdp = filter_var($_POST['mdp'],FILTER_SANITIZE_STRING);

	//verify the textfield are empty if not empty he execute the function 
	if (empty ($email) || empty($mdp)) {
		echo "Remplie tout les champs pout te connecter.";
	} else {
		connexion($email, $mdp);
	}

	function connexion($inEmail, $inMdp) {
		global $bdd;
		$query = null;

		$query = "SELECT `mdp` FROM `compte` WHERE `email` = ".$bdd->quote($inEmail);	
		$sth = $bdd->query($query);
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		
		if ($_POST === $result) {
			$bdd->exec($query);
		}
		
		if (count($result) == 1) {
			$test = password_verify($inMdp, $result[0]['mdp']);
			if ($test) {
				echo "Mot de passe correct";
				header("Location: ../HTML/Page_daccueil.html");
			} else {
				echo "Mot de passe incorrect";
			}	
		}
	}

//SELECT `email`, `mdp` FROM `compte`
