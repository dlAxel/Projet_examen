<?php

/* We intialize to clear variable*/

require_once('config.php');
    $postClone = [];
    $postClone['Nom'] = '';
    $postClone['Adresse'] = '';
    $postClone['Ville'] = '';
    $postClone['CP'] = '';
    $postClone['Jour'] = 0;
    $postClone['Heured'] = 0;
    $postClone['Minuted'] = 0;
    $postClone['Heuref'] = 0;
    $postClone['Minutef'] = 0;
    $postClone['Mineur'] = 0;
    $postClone['Type'] = 0;
    $postClone['Liste'] = '';
    $postClone['Tenue'] = '';
    $postClone['lat'] =0;
    $postClone['lon'] =0;

    foreach ($_POST as $key => $value) {
        if ($key=='Nom' || $key=='Ville' || $key=='Adresse' || $key=='Liste' || $key=='Tenue' || $key=='CP') {
            $postClone[$key] = filter_var(trim($value),FILTER_SANITIZE_STRING);
        } else if($key=='Jour') {

            $test = intVal($value);
            if ($test>=1 && $test<=31) {
                $postClone[$key] = $test;
            }
        }else if($key=='Heured' || $key=='Heuref') {

            $test = intVal($value);
            if ($test>=0 && $test<=23) {
                $postClone[$key] = $test;
            }
        } else if($key=='Minuted' || $key=='Minutef') {
            $test = intVal($value);
            if ($test>=0 && $test<=59) {
                $postClone[$key] = $test;
            }
        } else if($key=='Mineur' || $key=='Type') {
            $test = intVal($value);
            if ($test>=0 && $test<=1) {
                $postClone[$key] = $test;
            }
        } else if($key=='lat' || $key=='lon') {
            $test = floatVal($value);
            if ($test) {
                $postClone[$key] = $test;
            }
        }
    }

    if (empty($postClone)) {
        echo "Veuiller remplir tout les champs";
    }

/*Call the function to save the form into DB*/

envoie($postClone);

function envoie($inPostClone) {
    global $bdd;
    $query = null;

    $query= "INSERT INTO `evenement`(`nom_evenement`, `adresse_evenement`, `ville`, `code_postal`, `date_evenement`, `heure_debut`, `heure_fin`, `minute_debut`, `minute_fin`, `mineur_autorisee`, `public_prive`, `liste`, `tenue`, `lng`, `lat`) ";
    $query.='VALUES (';
	$query.=$bdd->quote($inPostClone['Nom']).',';
	$query.=$bdd->quote($inPostClone['Adresse']).',';
	$query.=$bdd->quote($inPostClone['Ville']).',';
	$query.=$bdd->quote($inPostClone['CP']).',';
	$query.=$inPostClone['Jour'].',';
	$query.=$inPostClone['Heured'].',';
	$query.=$inPostClone['Minuted'].',';
	$query.=$inPostClone['Heuref'].',';
	$query.=$inPostClone['Minutef'].',';
	$query.=$inPostClone['Mineur'].',';
	$query.=$inPostClone['Type'].',';
    $query.=$bdd->quote($inPostClone['Liste']).',';
    $query.=$bdd->quote($inPostClone['Tenue']).',';
    $query.=$inPostClone['lat'].',';
    $query.=$inPostClone['lon'];
   $query.=')';

$bdd->exec($query);
 header('Location: page_principale.php');
}
