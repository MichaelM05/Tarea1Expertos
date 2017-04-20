<?php

class StyleInfo {

    private $mean;
    private $style;

    public function StyleInfo($mean, $style) {
        $this->mean = $mean;
        $this->style = $style;
    }

    public function getMean() {
        return $this->mean;
    }

    public function setMean($mean) {
        $this->mean = $mean;
    }

    public function getStyle() {
        return $this->style;
    }

    public function setStyle($style) {
        $this->style = $style;
    }

}
