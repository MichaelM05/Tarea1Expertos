<?php

class EnclosureInfo {

    private $mean;
    private $enclosure;

    public function EnclosureInfo($mean, $enclosure) {
        $this->mean = $mean;
        $this->enclosure = $enclosure;
    }

    public function getMean() {
        return $this->mean;
    }

    public function setMean($mean) {
        $this->mean = $mean;
    }

    public function getEnclosure() {
        return $this->enclosure;
    }

    public function setEnclosure($enclosure) {
        $this->enclosure = $enclosure;
    }

}
