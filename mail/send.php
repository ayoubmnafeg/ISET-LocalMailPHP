<?php
$target_dir = "uploads/";
//connect to db
include '../config/db_connnection.php';
$conn = OpenCon();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//get values
session_start();
$sen = $_SESSION['Pseudo'];
$obj = $_post['obj'];
$msg = $_post['msg'];
$res = explode (",", $_post['res']);
$cc = explode (",", $_post['cc']);
$cci = explode (",", $_post['cci']);
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
?>