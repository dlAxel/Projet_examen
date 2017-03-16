<?php
/*
Array
(
    [Nom] => 
    [Adresse] => 
    [Ville] => 
    [CP] => 
    [jour] => 
    [heured] => 
    [minuted] => 
    [heuref] => 
    [minutef] => 
    [mineur] => 1
    [type] => 1
    [Liste] => :l;pk,jkl;m:!fsdb
    [Tenue] => df95b95ze
    [lat] => 45.70234306798272
    [lon] => 4.145622253417969
)

Array
(
    [Nom] => vzv
    [Adresse] => zvz
    [Ville] => vzv
    [CP] => zvvz
    [Heured] => 0
    [Minuted] => 0
    [Minutef] => 0
    [Mineur] => 1
    [Type] => 0
    [Liste] => vzevzev
    [Tenue] => vefvefv
)
*/

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
   echo "<pre>";
   print_r($_POST);
print_r($postClone);
die();

/*Call the function to save into DB*/

envoie($postClone);

function envoie($inPostClone) {
    global $bdd;
    $query = null;

    $query= "INSERT INTO `evenement`(`nom_evenement`, `adresse_evenement`, `ville`, `code_postal`, `date_evenement`, `heure_debut`, `heure_fin`, `mineur_autorisee`, `public_prive`, `lng`, `lat`) ";
    $query.='VALUES (';
	$query.=$bdd->quote($inPostClone['Nom']).',';
	$query.=$bdd->quote($inPostClone['Adresse']).',';
	$query.=$bdd->quote($inPostClone['Ville']).',';
	$query.=$bdd->quote($inPostClone['CP']).',';
	$query.=$bdd->quote($inPostClone['Jour']).',';
	$query.=$bdd->quote($inPostClone['Heured']).',';
	$query.=$bdd->quote($inPostClone['Minuted']).',';
	$query.=$bdd->quote($inPostClone['Heuref']).',';
	$query.=$bdd->quote($inPostClone['Minutef']).',';
	$query.=$bdd->quote($inPostClone['Mineur']).',';
	$query.=$bdd->quote($inPostClone['Type']).',';
    $query.=$bdd->quote($inPostClone['Liste']).',';
    $query.=$bdd->quote($inPostClone['Tenue']).',';
    $query.=$bdd->quote($inPostClone['lat']).',';
    $query.=$bdd->quote($inPostClone['lon']).',';


   $query.=')';
echo $query;

    exec();
}
