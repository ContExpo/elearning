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
            <div class="text-center" style="margin:10px">
                <a style="color:white" class="btn btn-primary pageLink" data-page="/new_exercise.php"><i class="fas fa-plus-circle"></i>  Nuovo test</a>
            </div>
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
            if ($result->num_rows>0):
            {
                echo '<table class="table table-bordered hoverable text-center">';
                echo "<thead class='thead-light'><th>ID esercizio</th><th>Data</th><th>Punteggio</th><th> </th></thead>";
                $riga="<tr><td>%d</td><td>%s</td><td>%d/10</td><td> <button class='btn pageLink' data-page='exercise.php?id=%d'>Rifai il test</button></td></tr>";
                while($row=$result->fetch_assoc())
                {
                    printf($riga, $row["id_exercise"], dateToRenderFormat($row["date"]), $row["score"], $row["id_exercise"]);
                }
                echo "</table>";
            }
            else: ?>
                <p class="text-muted text-center">Nessun test trovato, puoi <a style="color:blue" class="pageLink" data-page="/new_exercise.php">iniziarne uno nuovo</a> </p>
            <?php endif; ?>
        </div>
    </div>
</div>