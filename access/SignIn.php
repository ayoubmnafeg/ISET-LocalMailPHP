
<?php
//connect to db
include '../config/db_connnection.php';
$conn = OpenCon();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//get form values
$Pseudo = $_POST['E-mail'];
$pswd = $_POST['pswd'];
//check if value in db  
$result = $conn->query("SELECT password FROM compte WHERE Pseudo = '$Pseudo'");
if($result->num_rows == 0) {
    header("Location: ../index.php?err=wrongemail");
} else {
    $hash = $result->fetch_all(MYSQLI_ASSOC); 
    $verify = password_verify($pswd, $hash[0]['password']);
    if ($verify) {
        session_start();
        $_SESSION['Pseudo'] = $Pseudo;
        $_SESSION['name'] = $conn->query("SELECT name FROM compte WHERE Pseudo = '$Pseudo'")->fetch_assoc()['name'];
        header("Location: ../reception/");
    } else {
        header("Location: ../index.php?err=wrongpassword");
    }
    
}









?>
