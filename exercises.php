<?php
session_start();
include_once "loggedCheck.php";

include_once "functions.php";

$conn = getDBConnection();
if ($conn->connect_errno) 
{
    die("conn fallita: ". $conn->connect_error . ".");
}

//Inizio la transazione

$conn->autocommit(FALSE);
$conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

//Inserisco il nuovo esercizio
$sql = "INSERT INTO `exercises` (`id_user`, `date`, `score`, `status`) VALUES (?, NOW(), NULL, 'S');";
$sql=$conn->prepare($sql);
if($sql===false)
{
    die(mysqli_error($conn));
}
$sql->bind_param("i", $_SESSION["id_user"]);
$sql->execute();

//Seleziono l'id dell'esercizio
$sql = "SELECT LAST_INSERT_ID() AS id_exercise FROM exercises";
$sql=$conn->prepare($sql);
if($sql===false)
{
    die(mysqli_error($conn));
}
$sql->execute();
$id_exercise=$sql->get_result()->fetch_assoc()["id_exercise"];
$conn->rollback();
echo $id_exercise;
?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="title text-center text-capitalize">
            <h3>Storico esercizi</h3>
        </div>
        <div>
            
        </div>
    </div>
</div>