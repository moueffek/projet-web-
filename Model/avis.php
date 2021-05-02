<?php
class avis{
    private int $idav;
    private int $idusr;
    private int $idProd;
    private string $message;
    private int $etoiles;


function __construct(int $idusr,int $idprod,string $message,int $etoiles){
    $this->idusr=$idusr;
    $this->idprod=$idprod;
    $this->message=$message;
    $this->etoiles=$etoiles;
}

function setIdav($idav) { $this->idav = $idav; }
function getIdav() { return $this->idav; }

function setIdusr($idusr) { $this->idusr = $idusr; }
function getIdusr() { return $this->idusr; }

function setIdprod($idprod) { $this->idprod = $idprod; }
function getIdprod() { return $this->idprod; }

function setMessage($message) { $this->message = $message; }
function getMessage() { return $this->message; }

function setEtoiles($etoiles) { $this->etoiles = $etoiles; }
function getEtoiles() { return $this->etoiles; }

}

?>