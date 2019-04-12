<?php
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["surname"]))
{
    session_start();
    include_once "functions.php";
    $conn = getDBConnection();
    // verifica su eventuali errori di connessione
    if ($conn->connect_errno) {
        echo "Connessione fallita: ". $conn->connect_error . ".";
        exit("Connessione fallita");
    }
    $password=crypt($_POST["password"], "stringadisalt");
    $sql="INSERT INTO `users` (`username`, `password`, `email`, `name`, `surname`) VALUES (?, ?, ?, ?, ?);";
    $sql=$conn->prepare($sql);
    $sql->bind_param("sssss", $_POST["username"], $password, $_POST["email"], $_POST["name"], $_POST["surname"]);
    $sql->execute();
    $sql="SELECT MAX(id_user) AS id_user, username FROM users";
    $sql=$conn->prepare($sql);
    $sql->execute();
    $row=$sql->get_result()->fetch_assoc();
    $conn->close();
    $_SESSION["id_user"]=$row["id_user"];
    $_SESSION["username"]=$row['username'];
    exit("success");
}
else
{
    die("Riempi tutti i campi");
}
?>