<?php
class mail{
    private $emailid;
    private $sen;
    private $res;
    private $cc;
    private $cci;
    private $obj;
    private $msg;
    private $pjt;
    private $timedate;
    private $status;

    function __construct($emailid,$sen,$obj,$msg,$timedate,$status){
        $this->emailid = $emailid;
        $this->sen = $sen;
        $this->obj = $obj;
        $this->msg = $msg;
        $this->timedate=$timedate;
        $this->status = $status;
        $this->res = array();
        $this->cc = array();
        $this->cci = array();
        $this->pjt = array();
    }
    
    function addRes($res){
        array_push($this->res,$res);
    }
    function addCc($cc){
        array_push($this->cc,$cc);
    }
    function addCci($cci){
        array_push($this->cci,$cci);
    }
    function addPjt($pjt){
        array_push($this->pjt,$pjt);
    }
    function __toString(){
        $timestamp = $this->timedate;
        $date = date("d.m.Y");
        $match_date = date('d.m.Y', strtotime($timestamp));
        $dtime = new DateTime($timestamp);
        if($date == $match_date){
            $dt = $dtime->format("h:i");
        }else{
            $dt = $dtime->format("d-m-Y");
        }
        if(strlen($this->msg)>40){
            $msg = substr($this->msg, 0, 40) . '...';
        } else {
            $msg = $this->msg;
        }
        $unseen = '<b>
            <div class="nameMail">
                '.$this->obj.'
            </div>
            <div class="objectMail">
                '.$msg.'
            </div>
            <div class="timeMail">
                '.$dt.'
            </div>
        </b>';
        $seen = '<div>
            <div class="nameMail">
                '.$this->obj.'
            </div>
            <div class="objectMail">
                '.$msg.'
            </div>
            <div class="timeMail">
                '.$dt.'
            </div>
        </div>';
        if($this->status=='unseen'){
            $msg = $unseen;
        }else if($this->status=='seen'){
            $msg = $seen;
        }
        return '
        <div class="mail">
            <label class="main">
                <input type="checkbox">
                <span class="radiobtn"></span>
            </label>
            '.$msg.'
        </div>
        ';
    }



}


?>