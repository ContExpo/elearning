<?php
session_start();
include_once "loggedCheck.php";

include_once "functions.php";

$conn = getDBConnection();
if ($conn->connect_errno) 
{
    die("conn fallita: ". $conn->connect_error . ".");
}

//$sql = "SELECT *, CONCAT(name, ' ' ,surname) as fullName FROM users WHERE id_user=?";
$sql=$conn->prepare($sql);
if($sql===false)
{
    die("Errore nella query");
}
//$sql->bind_param("i", $_SESSION["id_user"]);
$sql->execute();
$result=$sql->get_result();
?>

<div class="row">
    <div class="col-md-10 offset-md-1">
        
    </div>
</div>