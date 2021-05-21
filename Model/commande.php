<?php
class commande{
    private int $idCmd;
    private int $idUsr;
    private float $prixtot;
    private int $idLiv;

function __construct(int $idUsr,float $prixtot,int $idLiv){
    $this->idUsr=$idUsr;
    $this->prixtot=$prixtot;
    $this->idLiv=$idLiv;
}



function setIdCmd($idCmd) { $this->idCmd = $idCmd; }
function getIdCmd() { return $this->idCmd; }

function setIdUsr($idUsr) { $this->idUsr = $idUsr; }
function getIdUsr() { return $this->idUsr; }

function setPrixtot($prixtot) { $this->prixtot = $prixtot; }
function getPrixtot() { return $this->prixtot; }

function setIdLiv($idLiv) { $this->idLiv = $idLiv; }
function getIdLiv() { return $this->idLiv; }


}

?>