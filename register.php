<?php
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["nome"]) && isset($_POST["cognome"]))
{
    include_once "functions.php";
    $conn = getDBConnection();
    // verifica su eventuali errori di connessione
    if ($conn->connect_errno) {
        echo "Connessione fallita: ". $conn->connect_error . ".";
        exit();
    }
    $password=crypt($_POST["password"], "stringadisalt");
    $query="INSERT INTO utenti(nome, cognome, indirizzo, citta, username, password, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $sql = $conn->stmt_init();
    $sql->prepare ($query);
    $sql->bind_param("sssssss", $_POST["nome"], $_POST["cognome"], $_POST["indirizzo"], $_POST["citta"], $_POST["username"], $password, $_POST["email"]);
    $sql->execute();
    $result=$sql->get_result();
    if ($result===FALSE)
    {
        exit ("query fallita");
    }
}
?>