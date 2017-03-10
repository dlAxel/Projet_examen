
<!doctype html>
<html>
	<head>
		<meta charset='utf-8'>
			<link rel="stylesheet" type="text/css" href="../Vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="../HTML/CSS/page_principale.css">
		<title>Page Map</title>
	</head>
	<body>
        <form method="post"></form>

        <div class="sidebar1">
            <div class="logo">
                <a class="Img-clic" href="ton_lien.html"><img src="../HTML/CSS/default.png" class="img-responsive center-block" alt="Logo"></a>
            </div>
    
            <div class="left-navigation">
                    <ul class="list">
                        <h5><strong>TEST</strong></h5>
                        <li><a href="page_principale.php">Accueil</a></li>
                        <li><a href="Page_creation_evenement.php">Créer un évènement</a></li>
                        <li><a href="page_Map.php">Google map</a></li>
                        <li><a href="#">Amis</a></li>
                        <li><a href="#">Gym</a></li>
                        <li><a href="#">Art Class</a></li>
                    </ul>

                    <br>
                <div class="bouton">
				    <a href="deconnexion.php" class="button" type="submit">Déconnexion</a>
		       </div>
            </div>
        </div>

        <div id="map"></div>
            <script type="text/javascript">

                var map;
                function initMap() {
                  map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: -34.397, lng: 150.644},
                    zoom: 8
                  });
                }

             </script>
            <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
        </script>
    </body>
</html>