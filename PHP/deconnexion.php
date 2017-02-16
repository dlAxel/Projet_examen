<?php

	session_start();
	session_destroy();
	header('location: ../HTML/Page_daccueil.html');
	exit;
?>