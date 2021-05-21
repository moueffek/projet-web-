<?php
class wishlist{
    private int $idUsr;
    private int $idProd;
    private string $typeProd;


    function __construct(int $idUsr,int $idProd,string $typeProd){
        $this->idUsr=$idUsr;
        $this->idProd=$idProd;
        $this->typeProd=$typeProd;
    }



    function setIdUsr($idUsr) { $this->idUsr = $idUsr; }
    function getIdUsr() { return $this->idUsr; }

    function setIdProd($idProd) { $this->idProd = $idProd; }
    function getIdProd() { return $this->idProd; }

    function setTypeProd($typeProd) { $this->typeProd = $typeProd; }
    function getTypeProd() { return $this->typeProd; }

}
?>