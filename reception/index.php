<?php
    include '../config/db_connnection.php';
    include '../Objects/mail.php';
    $conn = OpenCon();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    session_start();
        
    function deletemail(){
        $conn = OpenCon();
        foreach($_POST['selected'] as $deleteid){
            $conn->query("DELETE FROM mails WHERE `mails`.`emailid` = ".$deleteid.";");
        }
    }
    function removemail(){
        $conn = OpenCon();
        foreach($_POST['selected'] as $deleteid){
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
        //header("Refresh:0");
    }
    if (isset($_POST[''])) { // If it is the first time, it does nothing
        remdelmail();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/reception.css">
    <title>reception - <?php echo $_SESSION['Pseudo'] ?></title>
</head>
<body>
    <header>
        <img src="../images/logo.svg" height="70" class="logo" alt="logo">
        <div class="profilenav">
            <img src="../images/avatar-01.jpg" height="50" class="avatar" alt="profile picture">
            <p class="Pseudo"><?php echo $_SESSION['name']; ?></p>
            <a href="../access/logout.php">
                <div class="logout">
                    <img src="../images/logout.png" height="50" class="avatar" alt="logout icon">
                    <p class="Pseudo">Logout</p>
                </div>
            </a>
        </div>
    </header>
    <div class="side-bar">
        <nav>
            <a href="../mail/"><button>Ecrire</button></a>
            <ul>
                <li><a href="index.php">Boite reception</a></li>
                <li><a href="index.php?page=unseen">Non lus</a></li>
                <li><a href="index.php?page=envoyer">Envoyer</a></li>
                <li><a href="index.php?page=corbeille">Corbeille</a></li>
            </ul>
        </nav>
    </div>
    <form class="disp" method="post">
        <div class="topbar">
            <label class="main">
                <input type="checkbox" name="all">
                <span class="radiobtn"></span>
            </label>
            <!--input type="image" alt="Submit" src="../images/trash-bin.png" alt="bin" onclick="remdelmail()" class="delbtn" title="click to delete selected items"-->
        </div>
        <hr>
        <!--div class="mail">
            <label class="main">
                <input type="checkbox">
                <span class="radiobtn"></span>
            </label>
            <div>
                <div class="nameMail">
                    
                </div>
                <div class="objectMail">
                    
                </div>
                <div class="timeMail">
                    
                </div>
            </div>
        </div-->
        <?php
        if (empty($_GET)) {
            $Pseudo = $_SESSION['Pseudo'];
            $result = $conn->query("SELECT * FROM mails WHERE emailid in (select emailid FROM receiver  Where email='$Pseudo' UNION select emailid FROM cc Where email='$Pseudo' UNION select emailid FROM cci Where email='$Pseudo') AND deleted='0' ORDER BY timedate DESC");
            if($result->num_rows == 0) {
                echo "<span style='margin: 10px;'>no E-mail resived</span>";
            } else {
                $emails = $result->fetch_all(MYSQLI_ASSOC);
                foreach ($emails as $key => $value) {
                    $mail = new mail($value['emailid'], $value['sender'], $value['object'], $value['message'], $value['timedate'],$value['status']);
                    echo $mail;
                }
            }
        }else if($_GET['page'] == 'unseen'){
            $Pseudo = $_SESSION['Pseudo'];
            $result = $conn->query("SELECT * FROM mails WHERE emailid in (select emailid FROM receiver Where email='$Pseudo' UNION select emailid FROM cc Where email='$Pseudo' UNION select emailid FROM cci Where email='$Pseudo') AND status='unseen' AND deleted='0' ORDER BY timedate DESC");
            if($result->num_rows == 0) {
                echo "<span style='margin: 10px;'>no E-mail unseened</span>";
            } else {
                $emails = $result->fetch_all(MYSQLI_ASSOC);
                foreach ($emails as $key => $value) {
                    $mail = new mail($value['emailid'], $value['sender'], $value['object'], $value['message'], $value['timedate'],$value['status']);
                    echo $mail;
                }
            }
        }else if($_GET['page'] == 'envoyer'){
            $Pseudo = $_SESSION['Pseudo'];
            $result = $conn->query("SELECT * FROM mails WHERE sender = '$Pseudo' AND deleted='0' ORDER BY timedate DESC");
            if($result->num_rows == 0) {
                echo "<span style='margin: 10px;'>no E-mail sended</span>";
            } else {
                $emails = $result->fetch_all(MYSQLI_ASSOC);
                foreach ($emails as $key => $value) {
                    $mail = new mail($value['emailid'], $value['sender'], $value['object'], $value['message'], $value['timedate'],$value['status']);
                    echo $mail;
                }
            }
        }else if($_GET['page'] == 'corbeille'){
            $Pseudo = $_SESSION['Pseudo'];
            $result = $conn->query("SELECT * FROM mails WHERE emailid in (select emailid FROM receiver Where email='$Pseudo' UNION select emailid FROM cc Where email='$Pseudo' UNION select emailid FROM cci Where email='$Pseudo') AND deleted='1' ORDER BY timedate DESC");
            if($result->num_rows == 0) {
                echo "<span style='margin: 10px;'>no E-mail deleted</span>";
            } else {
                $emails = $result->fetch_all(MYSQLI_ASSOC);
                foreach ($emails as $key => $value) {
                    $mail = new mail($value['emailid'], $value['sender'], $value['object'], $value['message'], $value['timedate'],$value['status']);
                    echo $mail;
                }
            }
        } else if ($_GET['page'] == 'mail') {
            $res = $conn->query("UPDATE `mails` SET `status` = 'seen' WHERE `mails`.`emailid` = ".$_GET['mail'].";");
            $mail = $conn->query("SELECT * FROM `mails` WHERE `mails`.`emailid` = ".$_GET['mail'].";")->fetch_all(MYSQLI_ASSOC)[0];

            $temparr = array();
            $receiver = $conn->query("SELECT email FROM `receiver` WHERE `receiver`.`emailid` = " . $_GET['mail'] . ";")->fetch_all(MYSQLI_ASSOC);
            foreach($receiver as $key => $value){
                array_push($temparr, $value['email']);
            }$receiver = implode(", ", $temparr);

            $temparr = array();
            $cc = $conn->query("SELECT email FROM `cc` WHERE `cc`.`emailid` = " . $_GET['mail'] . ";")->fetch_all(MYSQLI_ASSOC);
            foreach($cc as $key => $value){
                array_push($temparr, $value['email']);
            }$cc = implode(", ", $temparr);

            $temparr = array();
            $url = $conn->query("SELECT * FROM `piece joint` WHERE `piece joint`.`emailid` = " . $_GET['mail'] . ";")->fetch_all(MYSQLI_ASSOC);
            foreach($url as $key => $value){
                $file = '<a href="' . $value['url'] . '" download>'.$value['file name'].'<a><br>';
                array_push($temparr, $file);
            }$url = implode("", $temparr);

            echo '<div class="mailCard">'.
            'from: &nbsp;&nbsp;'.$mail['sender'].'<br>'.
            'to: &nbsp;&nbsp;'.$receiver.'<br>'.
            'cc: &nbsp;&nbsp;'.$cc.'<br>'.
            'date: &nbsp;&nbsp;'.$mail['timedate'].'<br>'.
            'subject: &nbsp;&nbsp;'.$mail['object'].'<br>'
            .'</div>';
            echo '<div class="mailContent">message:<br><br>'.$mail['message'].'
                <div>
                    <br><hr><br>
                    '.$url.'
                </div>
            </div>';
        }
        ?>
    </form>
    <script src="../lib/jquery.js"></script>
    <script>
        $(document).ready(function () {
            var allCB = $('input[name="selected"]');
            var mainCB = $('input[name="all"]')
            mainCB.on('click', function () {
                var status = $(this).is(':checked');
                allCB.prop('checked', status);
            });
            allCB.on('change', function () {
                var status = $('input[name="selected"]:checked').length === allCB.length;
                $('input[name="all"]').prop('checked', status);
            });
        });
    </script>
</body>
</html>












