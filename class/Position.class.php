<?php

/**
 * Description of Position
 *
 * @author mode83
 */
class Position {

    private $lat;
    private $lon;

    /**
     * 
     * @param type $inLat
     * @param type $inLon
     */
    public function __construct($inLat, $inLon) {
        $this->lat = $inLat;
        $this->lon = $inLon;
    }

    public function getLat() {
        return $this->lat;
    }

    public function getLon() {
        return $this->lon;
    }

    /**
     * Return a full format position, decimal style
     * @return string google format position
     */
    public function getFullPosition() {
        return $this->lat . ',' . $this->lon;
    }

    public function setLat($lat) {
        $this->lat = $lat;
    }

    public function setLon($lon) {
        $this->lon = $lon;
    }

}
