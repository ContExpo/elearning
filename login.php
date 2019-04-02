<?php
session_start();
if (isset($_POST["username"]) && isset($_POST["password"]))
{
    include_once "functions.php";
    $user=$_POST['username'];
    $password=crypt($_POST["password"], "stringadisalt");
    ///////////////////////////////////////
    $conn = getDBConnection();
    // verifica su eventuali errori di connessione
    if ($conn->connect_errno) {
        echo "conn fallita: ". $conn->connect_error . ".";
        exit();
    }
    $sql = "SELECT username, password FROM utenti WHERE username=? AND password=?";
    $sql=$conn->prepare($sql);
    if($sql===false)
    exit();
    $sql->bind_param("ss", $user, $password);
    $sql->execute();
    $result=$sql->get_result();
    if ($result===FALSE)
    {
        exit ("query fallita");
    }
    else if ($result->num_rows==1)
    {

        $_SESSION["id"]=$_POST['username']; 
        header('Location:/bikesharing/restituzione.php');
    }
    $numero=$sql->get_result()->num_rows;
    $conn->close();
}
?>