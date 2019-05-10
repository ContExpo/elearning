<?php
    include_once "loggedCheck.php";

    include_once "functions.php";

    $answer=$_POST["answer"];
    $answer_id=$_POST["answer_id"];
    $solution=$_POST["solution"];
    var_dump($answer);
    echo "<hr>";
    var_dump($answer_id);
    echo "<hr>";
    var_dump($solution);
    echo "<hr>";

    $score=0;
    for ($i=0; $i<count($answer); $i++)
    {
        if (strtolower(trim($answer[$i]))==trim(strtolower($solution[$i])))
        {
            $score++;
        }
    }
    $conn=getDBConnection();
    $sql="UPDATE exercises SET score=? WHERE (id_exercise=?)";
    $sql=$conn->prepare($sql);
    $sql->bind_param("ii", $score, $_POST["id_exercise"]);
    $sql->execute();
    header("location: index.php?page=exercises.php")
?>