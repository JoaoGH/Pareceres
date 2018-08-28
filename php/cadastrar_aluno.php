<?php

require_once '../bd/conectar.php';
$aluno = $_POST['aluno'];
$serie = $_POST['serie'];
$turma = $_POST['turma'];
$profReg = $_POST['profReg'];
$turno = $_POST['turno'];
$materia = $_POST['materia'];
$parecer = $_POST['parecer'];
if ($_POST['contador'] == 0) {
    $query = "insert into alunos (nome_aluno,serie,turma,prof_regente,turno,$materia) VALUES ('$aluno','$serie','$turma','$profReg','$turno','$parecer')";
    mysql_query($query) or die(mysql_error());
    echo 'Letra do parecer cadastrada com sucesso';
} else if($_POST['contador'] <=8 and $_POST['contador'] > 0) {
    $query = "update alunos set $materia='$parecer' where nome_aluno='$aluno'";
    mysql_query($query) or die(mysql_error());
    echo 'Letra do parecer cadastrada com sucesso';
}
else{
    echo 'As materias foram finalizadas para este aluno';
}
