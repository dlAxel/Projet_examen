<?php

require_once('config.php');
require_once 'Event.class.php';

/**
 * Description of DBTool
 *
 * @author mode83
 */
class DBTool {

    /**
     * Return all events occuring taday and in the future
     * @return array of Event
     */
    function getAllEvents() {

        $bdd = $this->connectDB();
        $query = null;

        $today = mktime(0, 0, 0, date('n'), date('j'), date('Y'));
        $query = "SELECT * FROM `evenement` WHERE date_evenement>=".$today;
        $sth = $bdd->query($query);
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);

        $allEvents = [];
        foreach ($data as $line) {
           $event = new Event();
           $allEvents[] = $event->fillWithDBData($line);
        }
        return $allEvents;
    }

  
    /**
     * Connect to Mysql Database
     * @return \PDO database PDO object
     */
    private function connectDB() {
        $bdd = null;
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_final;charset=utf8', 'root', 'riejubetaktm');
        } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
        }
        return $bdd;
    }

}
