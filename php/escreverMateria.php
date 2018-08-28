<?php

require_once '../bd/conectar.php';



$s= mysqli_query($conexao, "select nome_aluno,turma from alunos");
$o = 0;
while($array = mysqli_fetch_array($s, MYSQLI_ASSOC)){
    $aluno[$o] = $array['nome_aluno'];
    $turmaF[$o]= $array['turma'];
    $o++;
}


for($u=0; $u< sizeof($aluno); $u++){

$materias = array (
    0 => "matematica",
    1 => "portugues",
    2 => "ingles",
    3 => "ciencias",
    4 => "historia",
    5 => "geografia",
    6 => "artes",
    7 => "ens_reg",
    8 => "ed_fis");

$resultado = array();

for($i=0; $i<=8; $i++){
    $query="select $materias[$i] from alunos where nome_aluno='$aluno[$u]'";
    $result= mysqli_query($conexao, $query);
    $f = mysqli_fetch_array($result);
    $resultado[$i] = $f[$materias[$i]];
    
}
mysqli_query($conexao,"insert into textos(aluno) VALUES ('$aluno[$u]')");
for($s=0; $s<=8;$s++){
    $Q= "select parecer_$resultado[$s] from pareceres_$turmaF[$u] where materia='$materias[$s]'";
    
    $res=  mysqli_query($conexao,$Q);
    $ar = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $inserir= $ar["parecer_$resultado[$s]"];
    mysqli_query($conexao, "update textos set $materias[$s]='$inserir' where aluno='$aluno[$u]'");
    
}
}

