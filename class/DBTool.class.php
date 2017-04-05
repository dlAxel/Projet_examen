<?php

require_once('config.php');
require_once ('Event.class.php');

/**
 * Description of DBTool
 *
 * @author mode83
 */
class DBTool {

    /**
     * Return all events occuring taday and in the future
     * @param integer $inType 0-> allEvents, 1->public only, 2-> private only
     * @return array of Event
     */
    function getAllEvents($inType) {

        $bdd = $this->connectDB();
        $query = null;

        $today = mktime(0, 0, 0, date('n'), date('j'), date('Y'));
        if ($inType == 0) {
            $query = "SELECT * FROM `evenement` WHERE date_evenement>=" . $today;
        } else if ($inType == 1) {
            $query = "SELECT * FROM `evenement` WHERE public_prive = 1 and date_evenement>=" . $today;
        } else if ($inType == 2) {
            $query = "SELECT * FROM `evenement` WHERE public_prive = 0 and date_evenement>=" . $today;
        }
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
     * Return all events for a given email
     * @param integer $inType 0-> allEvents, 1->public only, 2-> private only
     * @param string $inUserMail Search for this email
     * @return Array of Events
     */
    function getAllEventsForUser($inType, $inUserMail) {

        $bdd = $this->connectDB();
        $query = null;

        $today = mktime(0, 0, 0, date('n'), date('j'), date('Y'));
        if ($inType == 0) {
            $query = 'SELECT * FROM `evenement_prive` JOIN evenement ON evenement.id = evenement_prive.event_id '
                    . 'WHERE `guest_mail`=' . $bdd->quote($inUserMail);
        } else if ($inType == 1) {
            $query = 'SELECT * FROM `evenement_prive` JOIN evenement ON evenement.id = evenement_prive.event_id '
                    . 'WHERE `guest_mail`=' . $bdd->quote($inUserMail) . ' AND  public_prive = 1 and date_evenement>=' . $today;
        } else if ($inType == 2) {
            $query = 'SELECT * FROM `evenement_prive` JOIN evenement ON evenement.id = evenement_prive.event_id '
                    . 'WHERE `guest_mail`=' . $bdd->quote($inUserMail) . ' AND  public_prive = 0 and date_evenement>=' . $today;
        }


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

    public function getUserMailFromSessionToken($inToken) {
        global $bdd;
        $query = 'SELECT `email` FROM `compte` WHERE `token`=' . $bdd->quote($inToken);

        try {
            $sth = $bdd->query($query);
            $data = $sth->fetchAll();
            return $data[0]['email'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
    
    public function getUserIdFromSessionToken($inToken) {
        global $bdd;
        $query = 'SELECT `id` FROM `compte` WHERE `token`=' . $bdd->quote($inToken);

        try {
            $sth = $bdd->query($query);
            $data = $sth->fetchAll();
            return $data[0]['id'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

}
