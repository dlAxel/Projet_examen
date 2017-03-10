
<!doctype html>
<html>
	<head>
		<meta charset='utf-8'>
			<link rel="stylesheet" type="text/css" href="../Vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="../HTML/CSS/page_Map.css">
		<title>Page Map</title>
	</head>

	<body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <form method="post"></form>

                    <div class="sidebar1 col-md-2">
                <div class="logo">
                    <a class="img-responsive center-block" href="ton_lien.html">
                        <img src="../HTML/CSS/default.png" class="img-responsive center-block" alt="Logo">
                    </a>
                </div>
                    </div>
    
                        <div class="left-navigation">
                            <ul class="list">
                        <h5><strong>TEST</strong></h5>
                        <li><a href="page_principale.php">Accueil</a></li>
                        <li><a href="Page_creation_evenement.php">Créer un évènement</a></li>
                        <li><a href="page_Map.php">Google map</a></li>
                        <li><a href="#">Amis</a></li>
                        <li><a href="page_profil_membre.php">Profil</a></li>
                        <li><a href="#">Art Class</a></li>
                            </ul>

                            <br>

                            <div class="bouton">
				                <a href="deconnexion.php" class="button" type="submit">Déconnexion</a>
		                    </div>
                        </div> <!-- end left-navigation -->
                    </div> <!-- end sidebar1 col-md-2 -->

                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-md-10 col-lg-10">
                                <div id="map" class="map"> </div>
                            </div> <!-- end col-md-10 -->
                        </div> <!--- end row -->
                    </div> <!-- end container-fluid -->
                </div> <!-- end col-md-12 -->
            </div>
        </div>
    </body>

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
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv3-DsvBZbXoplCVec9-FzFGd2XEbhtrA&callback=initMap">
    </script>

</html>