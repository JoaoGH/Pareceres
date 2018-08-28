<?php
require_once("../bd/conectar.php");
$turminha = $_POST["turma"];
$materia = $_POST["materia"];
$parecer_a = $_POST["parecer_1"];
$parecer_b = $_POST["parecer_2"];
$parecer_c = $_POST["parecer_3"];
$parecer_d = $_POST["parecer_4"];
$parecer_e = $_POST["parecer_5"];

    mysql_query("insert into pareceres_".$turminha." (materia,parecer_a,parecer_b,parecer_c,parecer_d, parecer_e) VALUES ('$materia','$parecer_a','$parecer_b','$parecer_c','$parecer_d','$parecer_e')") or die(mysql_error());
echo "Parecer Cadastrado com sucesso";


?>