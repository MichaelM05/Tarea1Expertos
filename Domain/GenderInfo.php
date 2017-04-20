<?php

class GenderInfo {

    private $mean;
    private $gender;

    public function GenderInfo($mean, $gender) {
        $this->mean = $mean;
        $this->gender = $gender;
    }

    public function getMean() {
        return $this->mean;
    }

    public function setMean($mean) {
        $this->mean = $mean;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

}
