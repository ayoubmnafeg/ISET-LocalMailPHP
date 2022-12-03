<?php
class mail{
    private $sen;
    private $res;
    private $cc;
    private $cci;
    private $obj;
    private $msg;
    private $pjt;
    
    function __construct($sen,$res,$cc,$cci,$obj,$msg){
        $this->sen=$sen;
        $this->res=$res;
        $this->cc=$cc;
        $this->cci=$cci;
        $this->obj=$obj;
        $this->msg=$msg;
    }
    function sendMail(){
        
    }



}


?>