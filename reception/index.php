<?php session_start(); ?>
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
                    <img src="./images/logout.png" height="50" class="avatar" alt="logout icon">
                    <p class="Pseudo">Logout</p>
                </div>
            </a>
        </div>
    </header>
    <div class="side-bar">
        <nav>
            <a href="../mail/index.php"><button>Ecrire</button></a>
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
                <input type="checkbox" checked="checked">
                <span class="radiobtn"></span>
            </label>
            <input type="button" value="delete" class="btn">
        </div>
        <?php //echo $_SESSION['name'] ?>
    </div>
</body>
</html>












