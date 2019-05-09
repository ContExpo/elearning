<?php
include_once "loggedCheck.php";

include_once "functions.php";

$conn = getDBConnection();
if ($conn->connect_errno) 
{
    die("conn fallita: ". $conn->connect_error . ".");
}

//Inizio la transazione

//$conn->autocommit(FALSE);
//$conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

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


//Seleziono gli ID di 10 domande casuali
$sql="SELECT id_question FROM questions ORDER BY RAND() LIMIT 10"; 
$sql=$conn->prepare($sql);
if($sql===false)
{
    die(mysqli_error($conn));
}
$sql->execute();
$result=$sql->get_result();
$array=array();
while ($row=$result->fetch_assoc())
{
    $array[]=$row["id_question"];   //In array ci sono gli id
}
//Inserisco i collegamenti tra esercizio e frasi
$sql="INSERT INTO `elearning`.`links` (`id_exercise`, `id_question`, `correct`) VALUES (?, ?, NULL)"; 
$sql=$conn->prepare($sql);
if($sql===false)
{
    die(mysqli_error($conn));
}
$k=0;
foreach ($array as $value)
{
    $sql->bind_param("ii", $id_exercise, $value);
    $sql->execute();
}
echo $id_exercise;
exit;
?>