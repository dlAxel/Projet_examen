<?php include_once('validConnection.inc.php'); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../HTML/CSS/page_principale.css">
        <title>Page Google map API</title>
    </head>
    <body>
        <div id="map">
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
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXnqiAnjMi9xOI1XE3AiYneWPcoTEQ_bc&callback=initMap">
                            </script>
        </div>
    </body>
</hmtl>