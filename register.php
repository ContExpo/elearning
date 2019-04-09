<?php
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["surname"]))
{
    include_once "functions.php";
    $conn = getDBConnection();
    // verifica su eventuali errori di connessione
    if ($conn->connect_errno) {
        echo "Connessione fallita: ". $conn->connect_error . ".";
        exit("Connessione fallita");
    }
    $password=crypt($_POST["password"], "stringadisalt");
    $query="INSERT INTO `users` (`username`, `password`, `email`, `name`, `surname`) VALUES (?, ?, ?, ?, ?)";
    $query+="SELECT LAST_INSERT_ID() AS id_user FROM users";
    $sql = $conn->stmt_init();
    $sql->prepare ($query);
    $sql->bind_param("sssss", $_POST["username"], $password, $_POST["email"], $_POST["name"], $_POST["surname"]);
    $sql->execute();
    $result=$sql->get_result()->fetch_assoc();
    $connection->close();
    $_SESSION["id_user"]=$row["id_user"];
    $_SESSION["username"]=$_POST['username'];
    exit("success");
}
else
{
    die("Riempi tutti i campi");
}
?>