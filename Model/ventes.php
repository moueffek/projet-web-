<?php
class vente{
    private int $idCmd;
    private int $prixtot;
    private int $email_client;
    private string $titreProd;
    private int $idUsr;
    private int $idProd;



    function __construct(int $idCmd,int $prixtot,int $email_client,string $titreProd,int $idUsr,int $idProd){
        $this->idCmd=$idCmd;
        $this->prixtot=$prixtot;
        $this->email_client=$email_client;
        $this->titreProd=$titreProd;
        $this->idUsr=$idUsr;
        $this->idProd=$idProd;


    }
    function setIdCmd($idCmd) { $this->idCmd = $idCmd; }
    function getIdCmd() { return $this->idCmd; }

    function setPrixtot($prixtot) { $this->prixtot = $prixtot; }
    function getPrixtot() { return $this->prixtot; }

    function setEmail($email_client) { $this->email_client = $email_client; }
    function getEmail() { return $this->email_client; }

    function setTitre($titreProd) { $this->titreProd = $titreProd; }
    function getTitre() { return $this->titreProd; }

    function setIdusr($idUsr) { $this->idUsr = $idUsr; }
    function getIdusr() { return $this->idUsr; }

    function setId($idProd) { $this->idProd = $idProd; }
    function getId() { return $this->idProd; }





}



?>