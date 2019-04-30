<?php
include_once "loggedCheck.php";
include_once "functions.php";
?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="title text-center text-capitalize">
            <h3>Storico esercizi</h3>
        </div>
        <div>
            <?php 
            $conn=getDBConnection();
            $sql = "SELECT * FROM exercises WHERE id_user=?";
            $sql=$conn->prepare($sql);
            $sql->bind_param("i", $_SESSION["id_user"]);
            if($sql===false)
            {
                die(mysqli_error($conn));
            }
            $sql->execute();
            $result=$sql->get_result();
            $riga="<tr><td>%d</td><td>%s</td><td>%d</td></tr>";
            if ($result->num_rows>0)
            {
                echo '<table class="table table-striped table-bordered hoverable">';
                $echo="<thead class='thead-light'><td>ID esercizio</td><td>Data</td><td>Punteggio</td></thead>";
                $riga="<tr><td>%d</td><td>%s</td><td>%d</td></tr>";
                while($row=$result->fetch_assoc())
                {
                    printf($riga, $row["id_exercise"], $row["date"], $row["score"]);
                }
                echo "</table>";
            }
            ?>
        </div>
    </div>
</div>