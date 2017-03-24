<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <link rel="stylesheet" type="text/css" href="../Vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../HTML/CSS/page_principale.css">
        <title>Page principale</title>
    </head>
    <body>

        <div class="sidebar1">
            <div class="logo">
                <a class="img-responsive center-block" href="page_profil_membre.php">
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
                <div class="col-lg-offset-2 col-lg-10">
                    <h1>Liste d'évènements public</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-3 col-lg-9">
                    <?php
                    require_once('../class/DBTool.class.php');
                    require_once('../class/Event.class.php');

                    $tool = new DBTool();
                    foreach ($tool->getAllEvents() as $event) {
                        echo '<div id="div_' . $event->getId() . '" class="small"  onclick="toggleDiv(this)" >';
                        echo $event->getName() . ' le ' . $event->getDateWithFormat();
                        echo '<br>';
                        echo $event->getAdress1();
                        echo '<br>';
                        echo $event->getCity();
                        echo '<br>';
                        echo $event->getZipCode();
                        echo '<br>';
                        echo $event->getStartHour() . ' fini à '. $event->getEndHour(); 
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
        <!--régler ce probléme d'affichage--> 
        <script>
            function toggleDiv(inDiv) {
                inDiv.classList.toggle('big');
            }
            
        </script>
    </body>
</html>
