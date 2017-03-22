<?php

require_once 'Position.class.php';

/**
 * Object representing the model data in DB for Events
 *
 * @author mode83
 */
class Event {

    private $id;
    private $name;
    private $description;
    private $adress1;
    private $adress2;
    private $city;
    private $zipCode;
    private $startHour;
    private $endHour;
    private $date;
    private $dressCode;
    private $list;
    private $visibility;
    private $lowAgeAccess;
    private $position;

    public function __construct() {
        $this->id = 0;
        $this->name = NULL;
        $this->description = NULL;
        $this->adress1 = NULL;
        $this->adress2 = NULL;
        $this->city = NULL;
        $this->zipCode = NULL;
        $this->startHour = NULL;
        $this->endHour = NULL;
        $this->date = NULL;
        $this->dressCode = NULL;
        $this->list = NULL;
        $this->visibility = NULL;
        $this->lowAgeAccess = NULL;
        $this->position = NULL;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return ucfirst(strtolower($this->name));
    }

    public function getDescription() {
        return $this->description;
    }

    public function getAdress1() {
        return $this->adress1;
    }

    public function getAdress2() {
        return $this->adress2;
    }

    public function getCity() {
        return $this->city;
    }

    public function getZipCode() {
        return $this->zipCode;
    }

    public function getStartHour() {
        return $this->startHour;
    }

    public function getEndHour() {
        return $this->endHour;
    }

    public function getDateWithFormat($inFormat='%d/%m/%Y') {
        return strftime($inFormat, $this->getDate());
    }
    
    public function getDate() {
        return $this->date;
    }

    public function getDressCode() {
        return $this->dressCode;
    }

    public function getList() {
        return $this->list;
    }

    public function getVisibility() {
        return $this->visibility;
    }

    public function getLowAgeAccess() {
        return $this->lowAgeAccess;
    }

    public function getPosition() {
        return $this->position;
    }

    public function setName($name) {
        $cleanName = filter_var($name, FILTER_SANITIZE_STRING);
        $this->name = $cleanName;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setAdress1($adress1) {
        $this->adress1 = $adress1;
        return $this;
    }

    public function setAdress2($adress2) {
        $this->adress2 = $adress2;
        return $this;
    }

    public function setCity($city) {
        $this->city = $city;
        return $this;
    }

    public function setZipCode($zipCode) {
        $this->zipCode = $zipCode;
        return $this;
    }

    public function setStartHour($startHour) {
        $this->startHour = $startHour;
        return $this;
    }

    public function setEndHour($endHour) {
        $this->endHour = $endHour;
        return $this;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }

    public function setDressCode($dressCode) {
        $this->dressCode = $dressCode;
        return $this;
    }

    public function setList($list) {
        $this->list = $list;
        return $this;
    }

    public function setVisibility($visibility) {
        $this->visibility = $visibility;
        return $this;
    }

    public function setLowAgeAccess($lowAgeAccess) {
        $this->lowAgeAccess = $lowAgeAccess;
        return $this;
    }

    public function setPosition($position) {
        $this->position = $position;
        return $this;
    }

    public function fillWithDBData($inDataLine) {
        $this->id = $inDataLine['id'];
        $this->name = $inDataLine['nom_evenement'];
        $this->description = '';
        $this->adress1 = $inDataLine['adresse_evenement'];
        $this->adress2 = '';
        $this->city = $inDataLine['ville'];
        $this->zipCode = $inDataLine['code_postal'];
        $this->startHour = $inDataLine['heure_debut'] . ':' . $inDataLine['minute_debut'];
        $this->endHour = $inDataLine['heure_fin'] . ':' . $inDataLine['minute_fin'];
        $this->date = $inDataLine['date_evenement'];
        $this->dressCode = $inDataLine['tenue'];
        $this->list = $inDataLine['liste'];
        $this->visibility = boolval($inDataLine['public_prive']);
        $this->lowAgeAccess = boolval($inDataLine['mineur_autorisee']);
        $this->position = new Position($inDataLine['lat'], $inDataLine['lng']);
        
        return $this;
    }

}