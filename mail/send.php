<?php
//connect to db
include '../config/db_connnection.php';
$conn = OpenCon();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//get values
session_start();
$sen = $_SESSION['Pseudo'];
$obj = $_POST['obj'];
$msg = $_POST['msg'];
$res = explode(",", $_POST['res']);
$cc = explode(",", $_POST['cc']);
$cci = explode(",", $_POST['cci']);
$dt = date("Y-m-d H:i:s");
//insert values

$result = $conn->query("INSERT INTO `mails` (`emailid`, `sender`, `object`, `message`, `timedate`) VALUES (NULL, '$sen', '$obj', '$msg', '$dt')");
foreach ($res as $key => $value) {
    $result = $conn->query("INSERT INTO `receiver` (`emailid`, `email`) VALUES ((select emailid from mails order by emailid DESC LIMIT 1), '$value')");
}
foreach ($cc as $key => $value) {
    $result = $conn->query("INSERT INTO `cc` (`emailid`, `email`) VALUES ((select emailid from mails order by emailid DESC LIMIT 1), '$value')");
}
foreach ($cci as $key => $value) {
    $result = $conn->query("INSERT INTO `cci` (`emailid`, `email`) VALUES ((select emailid from mails order by emailid DESC LIMIT 1), '$value')");
}
$conn->query("DELETE FROM `cci` WHERE `cci`.`email` = ''");
$conn->query("DELETE FROM `cc` WHERE `cc`.`email` = ''");

if (!empty(array_filter($_FILES['inpfile']['name']))) {
    $res = $conn->query("select emailid from mails order by emailid DESC LIMIT 1");
    $emailid = $res->fetch_all(MYSQLI_ASSOC)[0]['emailid'];
    mkdir("../uploads/".$emailid."/");
    $uploadsDir = "../uploads/".$emailid."/";
    foreach ($_FILES['inpfile']['name'] as $id => $val) {
        $fileName = $_FILES['inpfile']['name'][$id];
        $tempLocation = $_FILES['inpfile']['tmp_name'][$id];
        $targetFilePath = $uploadsDir . $fileName;
        if (move_uploaded_file($tempLocation, $targetFilePath)) {
            $sqlVal = "('" .$emailid. "', '" . $targetFilePath . "')";
        }
        if (!empty($sqlVal)) {
            $insert = $conn->query("INSERT INTO `piece joint` (`emailid`, `url`) VALUES $sqlVal");
        }
    }
}

header("Location: ../reception/");
?>