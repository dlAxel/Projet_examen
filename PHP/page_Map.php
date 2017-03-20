
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <link rel="stylesheet" type="text/css" href="../Vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../HTML/CSS/page_Map.css">
        <title>Page Map</title>
    </head>

    <body>
    <div class="sidebar1">
            <div class="logo">
                <a class="img-responsive center-block" href="ton_lien.html">
                    <img src="../HTML/CSS/default.png" class="img-responsive center-block" alt="Logo">
                </a>
            </div>
            <br>
            <div class="left-navigation">
                <ul class="list">
                    <h5><strong>Menu</strong></h5>
                    <li><a href="page_principale.php">Accueil</a></li>
                    <li><a href="Page_creation_evenement.php">Créer un évènement</a></li>
                    <li><a href="page_Map.php">Google map</a></li>
                    <li><a href="page_ami.php">Amis</a></li>
                    <li><a href="page_profil_membre.php">Profil</a></li>
                    <li><a href="#">Guide d'utilisation</a></li>
                </ul>

                <br>
                <div class="bouton">
                    <a href="deconnexion.php" class="button" type="submit">Déconnexion</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div id="map" class="map"></div>
        </div>
    </body>

<script type="text/javascript">

    var map;
    var mrk;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 46.316584181822186, lng: 2.63671875},
            zoom: 8
        });
        google.maps.event.addListener(map, 'click', function (event) {
            placeMarker(event.latLng);
        });
    }



    function placeMarker(location) {
        if (!mrk) {
            mrk = new google.maps.Marker({
                position: location,
                map: map
            });

        } else {
            mrk.setPosition(location);

        }
        map.panTo(location);
        document.getElementById('lat').value = location.lat();
        document.getElementById('lon').value = location.lng();
    }

</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv3-DsvBZbXoplCVec9-FzFGd2XEbhtrA&callback=initMap">
</script>

</html>