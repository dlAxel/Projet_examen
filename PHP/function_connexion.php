<?php

	session_start();
	include('config.php');

	$email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
	$mdp = filter_var($_POST['mdp'],FILTER_SANITIZE_STRING);

	//if the email is empty return a error message
	if (empty ($email)) {
		$toreturn ['err']=1;
		$toreturn ['message']="Veuiller retaper votre email";
		echo json_encode($toreturn);
		exit();
	}
	//if the password is empty return a error message
	if (empty ($mdp)) {
		$toreturn ['err']=2;
		$toreturn ['message']="Mot de passe non valide";

		echo json_encode($toreturn);
		exit();
	}

	//verify the textfield are empty if not empty he execute the function 
	if (empty ($email) || empty($mdp)) {
		$toreturn ['err']=3;
		$toreturn ['message']="Remplie tout les champs pour te connecter.";
		echo json_encode($toreturn);
		exit();
	} else {
		$test = connexion($email, $mdp);
		if ($test) {
			$toreturn ['err']=4;
			$toreturn ['message']=$test;
			echo json_encode($toreturn);
			exit();
		}
	}
	$toreturn ['err']=0;
	$toreturn ['message']="";
	echo json_encode($toreturn);
	exit();

	function connexion($inEmail, $inMdp) {
		global $bdd;
		$query = null;

		$query = "SELECT `mdp` FROM `compte` WHERE `email` = ".$bdd->quote($inEmail);	
		$sth = $bdd->query($query);
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);

		if (count($result) == 1) {
			$test = password_verify($inMdp, $result[0]['mdp']);
			if ($test) {
				$_SESSION['starttime']= time();
				session_write_close();
				return null;
			} 
		}
		return "Mot de passe incorrect";

	}
