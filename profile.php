<?php
session_start();
include_once "loggedCheck.php";

include_once "functions.php";

$conn = getDBConnection();
if ($conn->connect_errno) 
{
    die("conn fallita: ". $conn->connect_error . ".");
}

$sql = "SELECT *, CONCAT(name, ' ' ,surname) as fullName FROM users WHERE id_user=?";
$sql=$conn->prepare($sql);
if($sql===false)
{
    die("Errore nella query");
}
$sql->bind_param("i", $_SESSION["id_user"]);
$sql->execute();
$result=$sql->get_result();
$numero=$result->num_rows;
$user=$result->fetch_assoc();
?>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="title text-center text-capitalize">
            <h3><?php echo $user["username"]?></h3>
            <h5 class="text-muted"><?php echo $user["fullName"] ?></h4>
        </div>
        <div>
            
        </div>
    </div>
</div>