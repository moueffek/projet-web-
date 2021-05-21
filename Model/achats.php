<?php
class achat{
    private int $idCmd;
    private float $prixtot;
    private int $idUsr;
    private string $lieu;



    function __construct(int $idCmd,float $prixtot,int $idUsr,string $lieu){
        $this->idCmd=$idCmd;
        $this->prixtot=$prixtot;
        $this->lieu=$lieu;
        $this->idUsr=$idUsr;


    }
    function setIdCmd($idCmd) { $this->idCmd = $idCmd; }
    function getIdCmd() { return $this->idCmd; }

    function setPrixtot($prixtot) { $this->prixtot = $prixtot; }
    function getPrixtot() { return $this->prixtot; }

    function setLieu($lieu) { $this->lieu = $lieu; }
    function getLieu() { return $this->lieu; }

    function setId($idUsr) { $this->idUsr = $idUsr; }
    function getId() { return $this->idUsr; }



}



?>