<?php
class paniers{
    private int $idProd;
    private int $idUsr;
    private int $idProp;
    private string $titreProd;
    private string $descProd;
    private float $prixProd;
    private int $quantProd;
    private string $typeProd;
    private string $img1;


    function __construct(int $idProd,int $idUsr,int $idProp,string $titreProd,string $descProd,float $prixProd,int $quantProd,string $typeProd,string $img1){
        $this->idProd=$idProd;
        $this->idUsr=$idUsr;
        $this->idProp=$idProp;
        $this->titreProd=$titreProd;
        $this->descProd=$descProd;
        $this->prixProd=$prixProd;
        $this->quantProd=$quantProd;
        $this->typeProd=$typeProd;
        $this->img1=$img1;
    }

function setIdProd($idProd) { $this->idProd = $idProd; }
function getIdProd() { return $this->idProd; }

function setIdPro($idProp) { $this->idProp = $idProp; }
function getIdPro() { return $this->idProp; }

function setIdUsr($idUsr) { $this->idUsr = $idUsr; }
function getIdUsr() { return $this->idUsr; }

function setTitreProd($titreProd) { $this->titreProd = $titreProd; }
function getTitreProd() { return $this->titreProd; }

function setDescProd($descProd) { $this->descProd = $descProd; }
function getDescProd() { return $this->descProd; }

function setPrixProd($prixProd) { $this->prixProd = $prixProd; }
function getPrixProd() { return $this->prixProd; }

function setQuantProd($quantProd) { $this->quantProd = $quantProd; }
function getQuantProd() { return $this->quantProd; }

function setType($typeProd) { $this->typeProd = $typeProd; }
function getType() { return $this->typeProd; }

function setImg1($img1) { $this->img1 = $img1; }
function getImg1() { return $this->img1; }
}



?>