<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <link rel="stylesheet" type="text/css" href="../Vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../HTML/CSS/Page_creation_evenement.css">
        <title>Page principale</title>   

        <script>
            function showFriendsZone(inSelect) {

                if (inSelect.options[inSelect.selectedIndex].value === "0") {
                    document.getElementById("friendzone").style.display = 'block';
                } else {
                    document.getElementById("friendzone").style.display = 'none';
                }

                // var chkbox = document.getElementById("chkbox").value;
                // document.getElementById("demo").innerHTML +;
            }
        </script>
    </head>
    <body>

        <div class="sidebar1">
            <div class="logo">
                <a class="img-responsive center-block" href="page_profil_membre.php">
                    <img src="../HTML/CSS/default.png" class="img-responsive center-block" alt="Logo">
                </a>
            </div>

            <div class="left-navigation">
                <ul class="list">
                    <h5><strong>Menu</strong></h5>
                    <li><a href="page_principale.php">Accueil</a></li>
                    <li><a href="Page_creation_evenement.php">Créer un évènement</a></li>
                    <li><a href="page_Map.php">Google map</a></li>
                    <li><a href="page_ami.php">Amis</a></li>
                    <li><a href="Page_invit_evenement_prive.php">Invitation événement privé</a></li>
                    <li><a href="#">Guide d'utilisation</a></li>
                </ul>

               	<div class="bouton">
                    <a href="deconnexion.php" class="button">Déconnexion</a>
                </div>

            </div>
        </div>
        <form action="function_creation_evenement.php" method="POST">
            <div class="container-fluid">

                <div class="col-lg-offset-3 col-lg-9">

                    <h1 class="titre">Créer votre évènement !</h1>
                    <h2 class="h2">Veuiller renseigner les champs</h2>
                </div>

                <div class="row">          
                    <div class="col-lg-offset-2 col-lg-5 center">
                        <table  width="100%">
                            <tr>
                                <td class="text">
                                    Nom de l'évènement :
                                </td>
                                <td class="champ">
                                    <input type="text" name="Nom"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text">
                                    Adresse de l'évènement :
                                </td>
                                <td class="champ"> 
                                    <input type="text" name="Adresse"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text">
                                    Ville : 
                                </td>
                                <td class="champ">
                                    <input type="text" name="Ville">
                                </td>
                            </tr>
                            <tr>
                                <td class="text">
                                    Code postal :
                                </td>
                                <td class="champ">
                                    <input type="text" size="5" maxlength="5" name="CP">
                                </td>

                            </tr>

                        </table>    
                    </div> 

                    <div class="col-lg-5 center">

                        <table>
                            <tr>
                                <td class="text-2">
                                    Date de l'évènement : 
                                </td>
                                <td class="champ-2">
                                    <input type="date" size="10" name="Jour">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-2">
                                    Heure de début :
                                </td> 
                                <td class="champ-2">
                                    <input type="text" maxlength="2" size="2" name="Heured">
                                    <span>h</span>
                                    <input type="text" maxlength="2" size="2" name="Minuted">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-2">
                                    Heure de fin :
                                </td>
                                <td class="champ-2">
                                    <input type="text" maxlength="2" size="2" name="Heuref">
                                    <span>h</span>
                                    <input type="text" maxlength="2" size="2" name="Minutef">
                                </td>
                            </tr>
                            <tr>

                                <td class="text-2">
                                    Mineur accepté :
                                </td>
                                <td class="champ-2">
                                    <select name="Mineur">
                                        <option value="1">Oui</option>
                                        <option value="0">Non</option>
                                    </select>
                                </td>

                            </tr>
                            <tr>

                                <td class="text-2">
                                    Visibilité :
                                </td>
                                <td class="champ-2">    
                                    <select name="Type" onchange="showFriendsZone(this)">
                                        <option value="1">Public</option>
                                        <option value="0">Privé</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-2 col-lg-5">
                    <div class="col-lg-12 center">
                        <p>Liste de chose a ramener : </p>
                        <textarea name="Liste"rows="4" cols="50"></textarea>
                    </div>
                    <div class="col-lg-12 center">
                        <p>Tenue requise : </p>
                        <textarea name="Tenue"rows="4" cols="50"></textarea>                     
                    </div>
                    <div class="col-lg-12 center" style="display: none;" id="friendzone">
                        <p>Amis : </p>
                        <div style="margin-left:50px;text-align:left;">
                            <?php
                            require_once('config.php');
                            global $bdd;

                            $query = 'SELECT `ami_to` FROM `amis` WHERE `ami_from`=1';
                            $sth = $bdd->query($query);
                            $result = $sth->fetchAll(PDO::FETCH_ASSOC);

                            // var_dump($result);
                            $i=0;
                            foreach ($result as $infos) {
                                $friend = $infos['ami_to'];
                                echo ' <input type="checkbox" name="friends_cb_'.$i.'" value="' . $friend . '"> ' . $friend . '<br>';
                                $i++;
                            }
                            ?>
                        </div>                  
                    </div>

                </div>

                <div class="col-lg-5">
                    <div id="map" class="map"> </div>
                    <p>Veuiller indiquer l'endroit de l'événement en cliquant sur la carte </p>
                </div>
                <div class="col-lg-offset-2 col-lg-10 center">
                    <button type="submit" class="btn btn-success">Envoyer</button>

                </div>
            </div> 
            <input type="hidden" id="lat" name="lat" value="" />
            <input type="hidden" id="lon" name="lon" value="" />
        </form>  

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
    </body>
</html>