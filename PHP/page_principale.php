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
                <div class="col-lg-offset-2 col-lg-10">
                    <h1>Liste d'évènements public</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-3 col-lg-9">
                    <?php
                        require_once('config.php'); 
                        recupEvent();    

                        function recupEvent() {
                            global $bdd;
                            $query = null;

                            $query="SELECT `nom_evenement`, `date_evenement` FROM `evenement`";
                            $sth = $bdd->query($query);
                            $data = $sth->fetchAll(PDO::FETCH_ASSOC);

                            $cpt = 0;
                            foreach ($data as $line) {
                                echo '<div id="div'.$cpt.'" style="border: 1px solid black; padding: 8px; margin-bottom: 10px; height:150px;" onmouseover="deploy(this)" onmouseout="reploy(this)">'; 
                                $name = $line['nom_evenement'];
                                $date = $line['date_evenement'];
                                echo $name .' le '.strftime('%D/%M/%Y',$date);
                                echo '</div>';
                                $cpt++;

                            }
                        }

                    ?>
                </div>
            </div>
        </div>
<!--régler ce probléme d'affichage--> 
        <script>
            function deploy(indiv3) {
                indiv=document.getElementById('div0');
                indiv.style.border='1px solid red';
                indiv.style.height="100 px";
            }
            function reploy(indiv) {
                indiv.style.border='1px solid black';
                indiv.style.height="10 px";
            }
        </script>
    </body>
</html>
