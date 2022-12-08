<?php
function deletemail(){
    foreach($_POST['selected'] as $deleteid){
        $conn = OpenCon();
        $conn->query("DELETE FROM mails WHERE `mails`.`emailid` = ".$deleteid.";");
    }
}
function removemail(){
    foreach($_POST['selected'] as $deleteid){
        $conn = OpenCon();
        $conn->query("UPDATE `mails` SET `deleted` = '1' WHERE `mails`.`emailid` = ".$deleteid.";");
    }
}
function remdelmail()
{
    if (empty($_GET) or $_GET['page'] == 'unseen' or $_GET['page'] == 'mail') {
        removemail();
    } else if ($_GET['page'] == 'envoyer' or $_GET['page'] == 'corbeille') {
        deletemail();
    }
    header("Refresh:0");
}

?>