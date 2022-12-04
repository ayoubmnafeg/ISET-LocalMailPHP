<?php
    include '../config/db_connnection.php';
    include '../Objects/mail.php';
    $conn = OpenCon();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/reception3.css">
    <link rel="stylesheet" href="../style/reception2.css">
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
                <li><a href="nonlus.php">Non lus</a></li>
                <li><a href="envoyes.php">Envoyer</a></li>
                <li><a href="corbeille.php">Corbeille</a></li>
            </ul>
        </nav>
    </div>
    <div class="disp">
        <div class="topbar">
            <label class="main">
                <input type="checkbox">
                <span class="radiobtn"></span>
            </label>
            <a class="delbtn" href="#"><img src="../images/trash-bin.png" alt="bin" id="delbtn" title="click to delete selected items"></a>
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
        $Pseudo = $_SESSION['Pseudo'];
        $result = $conn->query("SELECT * FROM mails WHERE emailid in (select emailid FROM receiver  Where email='$Pseudo') ORDER BY timedate DESC");
        if($result->num_rows == 0) {
            echo "<span>no E-mail resived</span>";
        } else {
            $emails = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($emails as $key => $value) {
                $mail = new mail($value['emailid'], $value['sender'], $value['object'], $value['message'], $value['timedate'],$value['status']);
                echo $mail;
                
            }
        }
        ?>
    </div>
</body>
</html>












