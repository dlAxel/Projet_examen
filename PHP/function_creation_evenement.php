<?php

/*
 * Friends in request:
 * ["friends_cb_0"]=> string(19) "dl_aznar@mode83.net" 
 * 
 */

/* We intialize to clear variable */

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
$postClone['lat'] = 0;
$postClone['lon'] = 0;

foreach ($_POST as $key => $value) {
    if ($key == 'Nom' || $key == 'Ville' || $key == 'Adresse' || $key == 'Liste' || $key == 'Tenue' || $key == 'CP') {
        $postClone[$key] = filter_var(trim($value), FILTER_SANITIZE_STRING);
    } else if ($key == 'Jour') {
        $details = explode('-', $value);
        $postClone[$key] = mktime(0, 0, 0, $details[1], $details[2], $details[0]);
    } else if ($key == 'Heured' || $key == 'Heuref') {

        $test = intVal($value);
        if ($test >= 0 && $test <= 23) {
            $postClone[$key] = $test;
        }
    } else if ($key == 'Minuted' || $key == 'Minutef') {
        $test = intVal($value);
        if ($test >= 0 && $test <= 59) {
            $postClone[$key] = $test;
        }
    } else if ($key == 'Mineur' || $key == 'Type') {
        $test = intVal($value);
        if ($test >= 0 && $test <= 1) {
            $postClone[$key] = $test;
        }
    } else if ($key == 'lat' || $key == 'lon') {
        $test = floatVal($value);
        if ($test) {
            $postClone[$key] = $test;
        }
    }
}


if (empty($postClone)) {
    echo "Veuiller remplir tout les champs";
    die();
}

/* Call the function to save the form into DB */

$eventid = envoie($postClone);
saveEventGuests($_REQUEST, $eventId);

header('Location: page_principale.php');

function envoie($inPostClone) {
    global $bdd;
    $query = null;

    $query = "INSERT INTO `evenement`(`nom_evenement`, `adresse_evenement`, `ville`, `code_postal`, `date_evenement`, `heure_debut`, `heure_fin`, `minute_debut`, `minute_fin`, `mineur_autorisee`, `public_prive`, `liste`, `tenue`, `lng`, `lat`) ";
    $query .= 'VALUES (';
    $query .= $bdd->quote($inPostClone['Nom']) . ',';
    $query .= $bdd->quote($inPostClone['Adresse']) . ',';
    $query .= $bdd->quote($inPostClone['Ville']) . ',';
    $query .= $bdd->quote($inPostClone['CP']) . ',';
    $query .= $inPostClone['Jour'] . ',';
    $query .= $inPostClone['Heured'] . ',';
    $query .= $inPostClone['Minuted'] . ',';
    $query .= $inPostClone['Heuref'] . ',';
    $query .= $inPostClone['Minutef'] . ',';
    $query .= $inPostClone['Mineur'] . ',';
    $query .= $inPostClone['Type'] . ',';
    $query .= $bdd->quote($inPostClone['Liste']) . ',';
    $query .= $bdd->quote($inPostClone['Tenue']) . ',';
    $query .= $inPostClone['lon'] . ',';
    $query .= $inPostClone['lat'];
    $query .= ')';

    
    $bdd->exec($query);

    return $bdd->lastInsertId();
}

// ["friends_cb_0"]=> string(19) "dl_aznar@mode83.net" 
function saveEventGuests($inRequest, $inEventId) {
    global $bdd;
    $query = null;

    try {
        foreach ($inRequest as $key => $value) {
            if (strpos($key, 'friends_cb_') !== false) {
                // guest found, add it
                $query = 'INSERT INTO `evenement_prive`(`event_id`, `guest_mail`) VALUES (';
                $query .= $inEventId . ', ';
                $query .= $bdd->quote($value) . ')';
                error_log(__FILE__ . ' ' . __FUNCTION__ . ' ' . $query);
                $bdd->exec($query);
            }
        }
    } catch (Exception $ex) {
         error_log(__FILE__ . ' ' . __FUNCTION__ . ' ' . $ex->getMessage());
    }
}
