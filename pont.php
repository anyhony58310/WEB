<?php
declare(strict_types = 1);

class Pont {
    public $longueur;
    public $largeur;
    
    public function getSurface() {
        return $this->longueur * $this->largeur;
    }
}

$pont = new Pont;
$pont->longueur = 263.0;
$pont->largeur = 15.0;

$surface = $pont->getSurface();

var_dump($pont);
var_dump("longueur -> " . $pont->longueur);
var_dump("largeur -> " . $pont->largeur);
var_dump("surface -> " . $surface);
?>