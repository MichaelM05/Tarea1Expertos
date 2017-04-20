<?php

/**
 * Description of Columns
 *
 * @author Michael Meléndez Mesén
 */
class TeacherInfo {

    private $A;
    private $B;
    private $C;
    private $D;
    private $E;
    private $F;
    private $G;
    private $H;
    private $class;

    public function TeacherInfo($A, $B, $C, $D, $E, $F, $G, $H, $class) {

        $this->A = $A;
        $this->B = $B;
        $this->C = $C;
        $this->D = $D;
        $this->E = $E;
        $this->F = $F;
        $this->G = $G;
        $this->H = $H;
        $this->class = $class;
    }

    public function getA() {
        return $this->A;
    }

    public function setA($A) {
        $this->A = $A;
    }

    public function getB() {
        return $this->B;
    }

    public function setB($B) {
        $this->B = $B;
    }

    public function getC() {
        return $this->C;
    }

    public function setC($C) {
        $this->C = $C;
    }

    public function getD() {
        return $this->D;
    }

    public function setD($D) {
        $this->D = $D;
    }

    public function getE() {
        return $this->E;
    }

    public function setE($E) {
        $this->E = $E;
    }

    public function getF() {
        return $this->F;
    }

    public function setF($F) {
        $this->F = $F;
    }

    public function getG() {
        return $this->G;
    }

    public function setG($G) {
        $this->G = $G;
    }

    public function getH() {
        return $this->H;
    }

    public function setH($H) {
        $this->H = $H;
    }

    public function getClass() {
        return $this->class;
    }

    public function setClass($class) {
        $this->class = $class;
    }

}
