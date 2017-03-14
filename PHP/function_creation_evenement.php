<?php

	require_once('config.php');

	envoie();

	function envoie() {
		INSERT INTO `evenement`(`nom_evenement`, `adresse_evenement`, `ville`, `code_postal`, `date_evenement`, `heure_debut`, `heure_fin`, `mineur_autorisee`, `public_prive`);
		exec();
	}
