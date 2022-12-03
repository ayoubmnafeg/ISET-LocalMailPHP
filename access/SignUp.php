<?php
//connect to db
include '../config/db_connnection.php';
$conn = OpenCon();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//get form values
$Pseudo = $_POST['Pseudo'];
$name = $_POST['name'];
$hash_pswd = crypt($_POST['pswd'],PASSWORD_DEFAULT);
//check if value in db
$result = $conn->query("SELECT Pseudo FROM compte WHERE Pseudo = '".$Pseudo."'");
if($result->num_rows == 0) {
    //add value in db
    
    $sql = "INSERT INTO `compte` (`accountId`, `Pseudo`, `password`, `name`) VALUES (NULL, '$Pseudo', '$hash_pswd', '$name');";
    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION['Pseudo'] = $Pseudo;
        $_SESSION['name'] = $name;
        header("Location: ../reception/");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header("Location: ../index.php");
}









?>