<?php
if (empty(session_id())) {
    session_start();
}
?>

<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <link rel="stylesheet" type="text/css" href="../Vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../HTML/CSS/Page_creation_evenement.css">
        <title>Invitation événement privé</title>
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

        <div class="container-fluid full-height nopadding">

            <div class="row full-height nopadding">
                <div class="col-lg-3 col-md-2 col-sm-3 col-xs-5 full-height nopadding">
                    <?php include 'sideMenu.inc.php'; ?>
                </div>

                <div class="col-lg-9 col-md-10 col-sm-9 col-xs-7 full-height">   
                    <form action="function_creation_evenement.php" method="POST"> 


                        <h1 class="titre">Créer votre évènement !</h1>
                        <h2>Veuiller renseigner les champs</h2>

                        <div>          
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

                        <div class="row nopadding">

                            <div class="col-md-6 center">

                                <p>Liste de chose a ramener : </p>
                                <textarea name="Liste"rows="4" cols="50"></textarea>

                                <p>Tenue requise : </p>
                                <textarea name="Tenue"rows="4" cols="50"></textarea>                     

                                <div style="display: none;" id="friendzone">
                                    <p>Amis : </p>
                                    <div>
                                        <?php
                                        require_once('config.php');
                                        global $bdd;
                                        require_once '../class/DBTool.class.php';
                                        $tool = new DBTool();



                                        $mail = $tool->getUserMailFromSessionToken($_SESSION['token']);

                                        $user = $tool->getAllEventsForUser(0, $mail);

                                        $query = 'SELECT `ami_to` FROM `amis` WHERE `ami_from`=' . $tool->getUserIdFromSessionToken($_SESSION['token']);
                                        ;
                                        try {

                                            $sth = $bdd->query($query);
                                            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                                            if (count($result)) {
                                                // var_dump($result);
                                                $i = 0;
                                                foreach ($result as $infos) {
                                                    $friend = $infos['ami_to'];
                                                    echo ' <input type="checkbox" name="friends_cb_' . $i . '" value="' . $friend . '"> ' . $friend . '<br>';
                                                    $i++;
                                                }
                                            } else {
                                                echo "<p>Aucun ami enregistré.</p>";
                                            }
                                        } catch (Exception $exc) {
                                            echo $exc->getMessage();
                                            echo $exc->getTraceAsString();
                                        }
                                        ?>
                                    </div>                  
                                </div>
                            </div>
                            <div class="col-md-6 center">
                                <div id="map" class="map"> </div>
                                <p>Veuiller indiquer l'endroit de l'événement en cliquant sur la carte </p>
                            </div>
                        </div>  <!--end row-->

                        <div class="row nopadding">
                            <div class="col-lg-12 center">
                                <button type="submit" class="btn btn-success">Envoyer</button>
                                <input type="hidden" id="lat" name="lat" value="" />
                                <input type="hidden" id="lon" name="lon" value="" />
                            </div>
                        </div>
                    </form>  
                </div>



            </div> 



        </div>
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