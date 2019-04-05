<?php
session_start();
if (isset ($_SESSION["username"]))
{
    die("success");
}

if (isset($_POST["username"]) && isset($_POST["password"]))
{
    include_once "functions.php";
    $user=$_POST['username'];
    $password=crypt($_POST["password"], "stringadisalt");
    ///////////////////////////////////////
    $conn = getDBConnection();
    // verifica su eventuali errori di connessione
    if ($conn->connect_errno) 
    {
        die("conn fallita: ". $conn->connect_error . ".");
    }
    $sql = "SELECT id_user, username FROM users WHERE username=? AND password=?";
    $sql=$conn->prepare($sql);
    if($sql===false)
    {
        die("Errore nella query");
    }
    $sql->bind_param("ss", $user, $password);
    $sql->execute();
    $result=$sql->get_result();
    $numero=$result->num_rows;
    $row=$result->fetch_assoc();
    if ($result===FALSE)
    {
        die ("Query fallita");
    }
    else if ($numero==1)
    {
        $conn->close();
        $_SESSION["id_user"]=$row["id_user"];
        $_SESSION["username"]=$row['username'];
        die ("success");
    }
    else
    {
        die ("Utente non trovato oppure credenziali non corrette");
    }
}
else {
    die ("Inserisci tutti i campi");
}
?>