<?php include_once('validConnection.inc.php'); ?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <link rel="stylesheet" type="text/css" href="../Vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../HTML/CSS/page_principale.css">
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
        <div class="container-fluid">
            <div class="row">
                
                    <h1>Évènements publics</h1>
                </div>
            </div>
            <div class="row">
                    <?php
                    require_once('../class/DBTool.class.php');
                    require_once('../class/Event.class.php');

                    $tool = new DBTool();
                    foreach ($tool->getAllEvents(0) as $event) {
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
                        echo $event->getLowAgeAccess();
                        echo '<br>';
                        //echo $event->getPosition();
                        echo '</div>';
                    }
                    ?>
                </div>

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
