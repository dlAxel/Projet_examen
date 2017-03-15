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
*/


require_once('config.php');

envoie();

function envoie() {
    $query= "INSERT INTO `evenement`(`nom_evenement`, `adresse_evenement`, `ville`, `code_postal`, `date_evenement`, `heure_debut`, `heure_fin`, `mineur_autorisee`, `public_prive`, `lng`, `lat`) ";
    $query.='VALUES (';
	$query.=$db->quote($Nom).',';
	$query.=$db->quote($toto).',';
	$query.=$db->quote($toto).',';
	$query.=$db->quote($toto).',';
	$query.=$db->quote($toto).',';
	$query.=$db->quote($toto).',';
	$query.=$db->quote($toto).',';
	$query.=$db->quote($toto).',';
	$query.=$db->quote($toto).',';
	$query.=$db->quote($toto).',';
	$query.=$db->quote($toto).',';

   $query.=')';
echo $query;

    exec();
}
