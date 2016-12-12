<!doctype html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="CSS/Style.css">
			<ul>
 			  <li><a href="#home">Home</a></li>
			  <li><a href="#news">News</a></li>
			  <li><a href="#contact">Contact</a></li>
			  <li style="float:right"><a class="active" href="#about">About</a></li>
			</ul>
	</head>
	<body>

		<div class="container">
			<h2>Login</h2>


			<form action="PHP/config.php" method="GET">
				<div class="input">
					<label for ="identifiant">Nom d'utilisateur : </label>
					<input type="text" name="identifiant" id="identifiant" placeholder="Entrez nom d'utilisateur" required /><br>
				</div>

				<div class="input">
					<label for ="password">Mot de passe : </label>
					<input type="password" name="password" id="password" placeholder="Entrez Votre mot de passe" required /><br>
				</div>

				<div>
					<input type="submit" name="submit" value="Connexion">
				</div>

					
			</form>
		</div>

	</body>
</html>