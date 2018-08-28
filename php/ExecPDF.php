<?php

require_once '../bd/conectar.php';
$result = mysqli_query($conexao, "select * from alunos");


$escola = "ESCOLA MUNICIPAL DE ENSINO FUNDAMENTAL BERNARDO LEMKE";
$escolaend = "PORTARIA DE FUNCIONAMENTO 01563/23-01-87";
$endereco = "Rua Carlos Nobre, nº181, Bairro Vila Nova, Nova  Hartz-RS,";
$contado = "Telefone: (51) 35652004  E-mail: emefbernardolemke@novahartz.rs.gov.br";
$assinatura = "Professor(a):_______________________________________________";
$mes = date('M');
$dia = date('d');
$ano = date('Y');

$semana = array(
    'Sun' => 'Domingo',
    'Mon' => 'Segunda-Feira',
    'Tue' => 'Terca-Feira',
    'Wed' => 'Quarta-Feira',
    'Thu' => 'Quinta-Feira',
    'Fri' => 'Sexta-Feira',
    'Sat' => 'Sábado'
);

$mes_extenso = array(
    'Jan' => 'janeiro',
    'Feb' => 'fevereiro',
    'Mar' => 'março',
    'Apr' => 'abril',
    'May' => 'maio',
    'Jun' => 'junho',
    'Jul' => 'julho',
    'Aug' => 'agosto',
    'Nov' => 'novembro',
    'Sep' => 'setembro',
    'Oct' => 'outubro',
    'Dec' => 'dezembro'
);

//logotip do relatório
$imagem = "../img/logopdf.png";
//endereço da biblioteca fpdf
$end_fpdf = "../fpdf";
//número de resultados por página
$por_pagina = 13;
//endereço onde será gerado o arquivo pdf
$end_final = "Pareceres.pdf";
//tipo de pdf gerado
//F cria o pdf no endereço especificado
//I gera o pdf para tela
$tipo_pdf = "I";
$sql = mysqli_query($conexao, "select * from alunos ORDER BY turma ASC");


//$sqlP= mysql_quuery("select parecer_a from pareceres, alunos where alunos.matematica='a' or alunos.matematica='A'");
$row = mysqli_num_rows($sql);
//verificamos se a consulta retornou alguma linha
if (!$row) {
    echo "Nenhum registro encontrado";
    die;
}
//calcular quantas páginas serão necessárias
$paginas = ceil($row /$por_pagina);
//preparar para gerar o pdf
define("FPDF_FONTPATH", "$end_fpdf/font/");
require_once("$end_fpdf/fpdf.php");
$pdf = new FPDF(); //instancia a classe FPDF
//inicializa as variáveis
$linha_atual = 0;
$inicio = 0;
//comando for para controlar o total de páginas necessárias para o relatório
for ($x = 0; $x <= $paginas; $x++) {
    //controlar o numero de registros por página (13 por folha A4)
    $inicio = $linha_atual;
    $fim = $linha_atual + $por_pagina;
    if ($fim > $row) {
        $fim = $row;
    }
    $pdf->Open();
    $pdf->SetFont("Arial", "B", 10);

    
    //número da página do relatório e a posição L "left
    //R "right" ou C "center"
    //primeiro parametro = 1 indica bordar ao redor do texto
    //segundo parametro = 1 espaço abaixo ao redor do texto
    //titulo do relatorio
//    $pdf->Cell(180, -10, $escola, 0, 0, 'C');
//    $pdf->SetFont("Arial", "", 11);
//    $pdf->Cell(-180, -3, $escolaend, 0, 0, 'C');
//    $pdf->Cell(180, 4, $endereco, 0, 0, 'C');
//    $pdf->Cell(-180, 11, $contado, 0, 0, 'C');
    //$pdf->Cell(185, 25, "Pagina $x de $paginas", 0, 0, 'R');
    //quebra de linha
//    $pdf->Ln(20);
    //montar o cabeçalho de relatorio
    //$pdf->Cell(80, -9, $escolaend, 0, 0, 'C');


    /* $pdf->Cell(8, 8, "Cod_aluno", 1, 0, 'C');
      $pdf->Cell(85, 8, "Nome", 1, 0, 'C');
      $pdf->Cell(25, 8, "Português", 1, 0, 'C');
      $pdf->Cell(70, 8, "Matemática", 1, 1, 'C'); */
    //comando for para exibir os registros


    while($rest = mysqli_fetch_array($sql)) {
        $pdf->AddPage();
        $pdf->Image($imagem, 10, 1); //posição alinhamento coluna-linha
        $pdf->Ln(2);
        $pdf->Image($imagem, 10, 1); //posição alinhamento coluna-linha
        $pdf->SetFont("Arial", "B", 11);
        $pdf->Cell(192, -10, $escola, 0, 0, 'C');
        $pdf->SetFont("Arial", "", 11);
        $pdf->Cell(-192, -3, $escolaend, 0, 0, 'C');
        $pdf->Cell(192, 4, $endereco, 0, 0, 'C');
        $pdf->Cell(-192, 11, $contado, 0, 0, 'C');
        $pdf->Ln(15);
        //variaveis
        $nome_aluno = utf8_encode($rest["nome_aluno"]);
        $serie = ($rest["serie"]+1)."º";
        $turma = $rest["turma"];
        $turno = utf8_encode($rest["turno"]);
        $prof_regente = utf8_encode($rest["prof_regente"]);
        $aluno = (string) $rest["nome_aluno"];
        $sqli = "select * from textos where aluno='$aluno'";
        $sqlP = mysqli_query($conexao, $sqli);
        $mostrar = mysqli_fetch_array($sqlP, MYSQLI_ASSOC);
        $pdf->SetFont("Arial", "B", 11);
        //$pdf->Cell(80, 9, $cod_aluno, 0, 0, 'L');
        $pdf->Cell(192, -1, "PARECER DESCRITIVO - 1º TRIMESTRE - " . $ano, 0, 1, "C");
        $pdf->Ln(5);
        $pdf->Cell(80, 9, "Aluno: " . $nome_aluno, 0, 0, 'L');
        $pdf->Cell(20, 9, "Ano: " . $serie, 0, 0, 'C');
        $pdf->Cell(44, 9, "Turma: " . $turma, 0, 0, 'C');
        $pdf->Cell(42, 9, "Turno: " . $turno, 0, 1, 'R');
        $pdf->Cell(48, 2, "Professor: " . $prof_regente, 0, 1, 'L');
        $pdf->Ln();


        $pdf->SetFont("Arial", "", 11);
        /* if (mysql_result($sql, $i, "matematica") == "A") {
          $pdf->MultiCell(192, 5, "       " . mysql_result($sqlP, $i, "matematica"), 0, 'J');
          } */
        $pdf->MultiCell(192, 5, "       " . utf8_encode($mostrar["matematica"]), 0, 'J');
        $pdf->MultiCell(192, 5, "       " . utf8_encode($mostrar["portugues"]), 0, 'J');
        $pdf->MultiCell(192, 5, "       " . utf8_encode($mostrar["ciencias"]), 0, 'J');
        $pdf->MultiCell(192, 5, "       " . utf8_encode($mostrar["geografia"]), 0, 'J');
        $pdf->MultiCell(192, 5, "       " . utf8_encode($mostrar["historia"]), 0, 'J');
        $pdf->MultiCell(192, 5, "       " . utf8_encode($mostrar["ingles"]), 0, 'J');
        $pdf->MultiCell(192, 5, "       " . utf8_encode($mostrar["ed_fis"]), 0, 'J');
        $pdf->MultiCell(192, 5, "       " . utf8_encode($mostrar["artes"]), 0, 'J');
        $pdf->MultiCell(192, 5, "       " . utf8_encode($mostrar["ens_reg"]), 0, 'J');
        $pdf->Ln(5);
        $pdf->Cell(140, 5, $assinatura, 0, 0, 'L');
        $pdf->Cell(45, 5, "Nova Hartz, " . $dia . " de " . $mes_extenso["$mes"] . " de " . $ano, 0, 0, 'R');
        $linha_atual++;
    }
}
//fecha FOR (Pafinas - x)
//saida do PDF
$pdf->Output("$end_final", "$tipo_pdf");
echo "<font color='blue' size='5'>";
echo "Relatorio gerado com sucesso!";
echo "</font>";
?>