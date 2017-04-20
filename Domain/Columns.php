<?php

class Columns {

    private $CA;
    private $EC;
    private $EA;
    private $OR;
    private $style;

    public function Columns($CA, $EC, $EA, $OR, $style) {

        $this->CA = $CA;
        $this->EA = $EA;
        $this->EC = $EC;
        $this->OR = $OR;
        $this->style = $style;
    }

    public function getCA() {
        return $this->CA;
    }

    public function setCA($CA) {
        $this->CA = $CA;
    }

    public function getEC() {
        return $this->EC;
    }

    public function setEC($EC) {
        $this->EC = $EC;
    }

    public function getEA() {
        return $this->EA;
    }

    public function setEA($EA) {
        $this->EA = $EA;
    }

    public function getOR() {
        return $this->OR;
    }

    public function setOR($OR) {
        $this->OR = $OR;
    }

    public function getStyle() {
        return $this->style;
    }

    public function setStyle($style) {
        $this->style = $style;
    }

}
