<?php include_once('validConnection.inc.php'); ?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <link rel="stylesheet" type="text/css" href="../Vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../HTML/CSS/Page_invit_evenement_prive.css">
        <title>Invitation événement privé</title>
    </head>
    <body>
        <!--<form method="GET">-->
        <div class="container-fluid full-height nopadding">
            <div class="row full-height nopadding">
                <div class="col-lg-3 col-md-2 col-sm-3 col-xs-5 full-height nopadding">
                    <?php include 'sideMenu.inc.php'; ?>
                </div>

                <div class="col-lg-9 col-md-10 col-sm-9 col-xs-7 full-height">

                    <h1>Voici les évènements privés auxquels vous êtes invités</h1>

                    <?php
                    require_once '../class/DBTool.class.php';
                    $tool = new DBTool();
                    if (empty(session_id())) {
                        session_start();
                    }

                    $user = $tool->getUserMailFromSessionToken($_SESSION['token']);
                    $allEvents = $tool->getAllEventsForUser(0, $user);
                    if (count($allEvents)) {
                        foreach ($allEvents as $event) {
                            echo '<div id="div_' . $event->getId() . '" class="small"  onclick="toggleDiv(this)" >';
                            echo $event->getName() . ' le ' . $event->getDateWithFormat();
                            echo '<br>';
                            echo $event->getAdress1();
                            echo '<br>';
                            echo $event->getCity();
                            echo '<br>';
                            echo $event->getZipCode();
                            echo '<br>';
                            echo $event->getStartHour() . ' fini à ' . $event->getEndHour();
                            echo '<br>';
                            echo $event->getDressCode();
                            echo '<br>';
                            echo $event->getList();
                            echo '<br>';
                            echo $event->getVisibility();
                            echo '<br>';
                            if ($event->getLowAgeAccess() == 1) {
                                echo 'Mineurs autorisés';
                            }
                            echo '<br>';
                            //echo $event->getPosition();
                            echo '</div>';
                        }
                    } else {
                        echo '<p>Vous n\'êtes invité à aucun évènement.';
                    }
                    ?>


                </div>
            </div>
        </div>
        <script>
            function toggleDiv(inDiv) {
                inDiv.classList.toggle('big');
            }

        </script>

    </body>
</html>
