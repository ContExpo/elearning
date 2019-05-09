<?php

if (!isset($_GET["id"]))
{
    http_response_code(404);
    exit();
}
else
{
    $id = $_GET["id"];
}

include_once "loggedCheck.php";

include_once "functions.php";
?>

<div class="row">
    <div class="col-md-10 offset-md-1">
        <h3>Nuovo esercizio</h3>
        <div>
        <form id="testForm">
        <?
        $conn = getDBConnection();
        if ($conn->connect_errno) 
        {
            die("conn fallita: ". $conn->connect_error . ".");
        }
        
        $sql = "SELECT q.* FROM links AS l, questions AS q WHERE (l.id_question=q.id_question AND (id_exercise=?))";
        
        $sql=$conn->prepare($sql);
        if($sql===false)
        {
            die("Errore nella query");
        }
        $sql->bind_param("i", $id);
        $sql->execute();
        $result=$sql->get_result();
        $dropdown ='<select class= "form-control-md" name="answer[]"';
        $dropdownRow = "<option value='%s'>%s</option>";
        $textbox ='<input type="text" name="answer[]" class="form-control-md">';
        $hidden= '<input type="hidden" name="answer_id[]" value="%d">';
        $answer= '<input type="hidden" name="answer[]" value="%s">';
        
        while($row = $result->fetch_assoc())
        {
            switch (strtolower($row["type"]))  //Domanda a scelta multipla
            {
            case "m":   //Scelta multipla
                $dropdown ='<select class= "form-control-md" name="answer[]"';
                $sql = "SELECT * FROM multiple_choices WHERE id_question=?";
                $sql=$conn->prepare($sql);
                if($sql===false)
                {   
                    die("Errore nella query");
                }
                $sql->bind_param("i", $row["id_question"]);
                $sql->execute();
                $subqueryResult=$sql->get_result();
                
                while ($choice=$subqueryResult->fetch_assoc())
                {
                    $dropdown.=sprintf($dropdownRow, $choice["text"], $choice["text"]);
                }
                $dropdown.="</select>";
                $text = str_replace("***", $dropdown, $row["text"]);
                break;

            case 'i':   //Fill the gap
                $text = str_replace("***", $textbox, $row["text"]);
                break;

            case 'c':   //Correggi l'errore
                $text = $row["text"].$textbox;
                break;
            }
            echo '<p class="exerciseDiv">'.stripslashes ($text);
            printf($hidden, $row["id_question"]);
            printf($answer, $row["solution"]);
            echo '</p>';
        }
        ?>
        <button class="btn-success" onclick="submitExercise();">
        </form>
        </div>
    </div>
</div>
<script>
function submitExercise()
{

}
</script>