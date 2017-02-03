<!doctype>
<html>
	<head>
		<meta charset='utf-8'>
		<link rel="stylesheet" type="text/css" href="page_profil_membre.css">
		<title>Votre profile</title>
	</head>
	<body>
		<form action="" method="POST" enctype="multipart/form-data">
		<h1>Profil</h1>
		<?php
			if(!empty($userinfo['avatar'])) {

			}
		?>
		<img src="Membres/Avatars" <?php echo $userinfo['avatar']; ?> width="150" />
		?>
		<label>Avatar :</label>
		<input type="file" name="Avatar" />
		<?php
			if (isset($_FILES['Avatar']) AND !empty($_FILES['Avatar']['name'])) {
				$tailleMax = 2097152;
				$extensionValides = array('jpg', 'jpeg', 'gif', 'png');
				if ($_FILES['Avatar']['size'] <= $tailleMax) {
					$extensionUpload = strtolower(substr(strrchr($_FILES['Avatar']['name'], '.'), 1));
					if(in_array($extensionUpload, $extensionValides)) {
						$chemin = "Membres/Avatars/".$_SESSION['id'].".".$extensionUpload;
						$resultat = move_uploaded_file($_FILES['Avatar']['tmp_name'], $chemin);
						if($resultat) {
							$updateavatar = $bdd->prepare('UPDATE espace_membres SET avatar = :avatar WHERE id = :id');
							$updateavatar->execute(array('avatar' => $_SESSION['id'].".".$extensionUpload 'id' => $_SESSION['id']));
								header("location: ../HTML/page_principale.php");
						} else {
							$msg = "erreur durant le déplacement de votre photo";
						}
					} else {
						$msg = "Votre photo de profil doit etre au format jpg, jpeg, gif ou png";
					}
				} else {
					$msg = "Photo trop lourd veuiller en mettre une moins lourde";
				}
			}
		?>

	</body>
</html>