<?php

class NetworkInfo {

    private $R;
    private $L;
    private $Ca;
    private $Co;
    private $class;

    public function NetworkInfo($R, $L, $Ca, $Co, $class) {

        $this->R = $R;
        $this->L = $L;
        $this->Ca = $Ca;
        $this->Co = $Co;
        $this->class = $class;
    }

    public function getR() {
        return $this->R;
    }

    public function setR($R) {
        $this->R = $R;
    }

    public function getL() {
        return $this->L;
    }

    public function setL($L) {
        $this->L = $L;
    }

    public function getCa() {
        return $this->Ca;
    }

    public function setCa($Ca) {
        $this->Ca = $Ca;
    }

    public function getCo() {
        return $this->Co;
    }

    public function setCo($Co) {
        $this->Co = $Co;
    }

    public function getClass() {
        return $this->class;
    }

    public function setClass($class) {
        $this->class = $class;
    }

}
