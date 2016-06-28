<?php

include './cabecalho.php';

include './conectorBD.php';

$conexao = new conexao();
$conexao->conecta();

$pesquisa = $_POST['pesquisa'];

$query = 'SELECT * FROM questoes_questionario WHERE id_questionario = ' . $pesquisa;
$resultset = mysql_query($query);

$querycount = 'SELECT count(*) FROM questoes_questionario WHERE id_questionario = ' . $pesquisa;
$resultsetcount = mysql_query($querycount);
$rowcount = mysql_fetch_row($resultsetcount);

echo '<form class="form-signin" name="form" id="form-questoes" method="post" action="gravaQuestoes.php">';
echo '<input type="hidden" name="questionario" value="' . $pesquisa . '">';
echo '<input type="hidden" name="quantidadequestoes" value="' . $rowcount[0] . '">';

while ($row = mysql_fetch_row($resultset)) {
    $queryquestao = 'SELECT * FROM questoes WHERE id = ' . $row[2] . ' AND ativo = "S" ORDER BY ordem';
    $resultsetquestao = mysql_query($queryquestao);
    $rowquestao = mysql_fetch_row($resultsetquestao);

    echo '<div class="container">';
    if ($rowquestao[4] == 1) {
        echo '<div id="questao' . $rowquestao[4] . '" style="display: block; margin-top: 10px">';
    } else {
        echo '<div id="questao' . $rowquestao[4] . '" style="display: none; margin-top: 10px">';
    }
    echo '<div class="alert alert-info"><br>';
    echo '<input type="hidden" name="questao' . $rowquestao[4] . '" value="' . $rowquestao[0] . '">';
    echo '<b>' . $rowquestao[4] . ' - ' . $rowquestao[1] . '</b><br><br>';
    echo '<div class="container" align="center"><b>' . $rowquestao[2] . '</b>&nbsp&nbsp&nbsp&nbsp'
    . '<input type="radio" name="resposta' . $rowquestao[4] . '" id="' . $rowquestao[4] . 'resposta1" value="1" > 1 &nbsp&nbsp&nbsp&nbsp'
    . '<input type="radio" name="resposta' . $rowquestao[4] . '" id="' . $rowquestao[4] . 'resposta2" value="2" > 2 &nbsp&nbsp&nbsp&nbsp'
    . '<input type="radio" name="resposta' . $rowquestao[4] . '" id="' . $rowquestao[4] . 'resposta3" value="3" > 3 &nbsp&nbsp&nbsp&nbsp'
    . '<input type="radio" name="resposta' . $rowquestao[4] . '" id="' . $rowquestao[4] . 'resposta4" value="4" > 4 &nbsp&nbsp&nbsp&nbsp'
    . '<input type="radio" name="resposta' . $rowquestao[4] . '" id="' . $rowquestao[4] . 'resposta5" value="5" > 5 &nbsp&nbsp&nbsp&nbsp'
    . '<input type="radio" name="resposta' . $rowquestao[4] . '" id="' . $rowquestao[4] . 'resposta6" value="6" > 6 &nbsp&nbsp&nbsp&nbsp'
    . '<input type="radio" name="resposta' . $rowquestao[4] . '" id="' . $rowquestao[4] . 'resposta7" value="7" > 7 &nbsp&nbsp&nbsp&nbsp'
    . '<input type="radio" name="resposta' . $rowquestao[4] . '" id="' . $rowquestao[4] . 'resposta8" value="8" > 8 &nbsp&nbsp&nbsp&nbsp'
    . '<input type="radio" name="resposta' . $rowquestao[4] . '" id="' . $rowquestao[4] . 'resposta9" value="9" > 9 &nbsp&nbsp&nbsp&nbsp'
    . '<input type="radio" name="resposta' . $rowquestao[4] . '" id="' . $rowquestao[4] . 'resposta10" value="10" > 10 &nbsp&nbsp&nbsp&nbsp'
    . '<b>' . $rowquestao[3] . '</b><br><br>'
    . '<input type="radio" name="resposta' . $rowquestao[4] . '" id="' . $rowquestao[4] . 'respostansa" value="nsa" > Não se Aplica &nbsp&nbsp&nbsp&nbsp'
    . '</div><br>';
    echo '<div class="container" align="center"><div align="left" style="margin-left: 120px">Considerações:</div><textarea rows="4" cols="150" style="width: 700px" id="' . $rowquestao[4] . 'consideracoes" name="consideracoes' . $rowquestao[4] . '" ></textarea></div><br>';
    echo '<div class="container" align="center">';
    if ($rowquestao[4] == $rowcount[0]) {
        require './camposAbertos.php';
    }
    if ($rowquestao[4] == 1) {
        echo '<input type="button" class="btn btn-info" style="width: 120px" value="<< Anterior" disabled>';
    } else {
        echo '<input type="button" class="btn btn-info" style="width: 120px" onclick="alternaPerguntas(' . $rowquestao[4] . ',this.name)" id="anterior" name="anterior" value="<< Anterior">';
    }
    echo ' ';
    if ($rowquestao[4] == $rowcount[0]) {
        echo '<input type="submit" class="btn btn-success" style="width: 120px" value="Finalizar">';
    } else {
        echo '<input type="button" class="btn btn-info" style="width: 120px" onclick="alternaPerguntas(' . $rowquestao[4] . ',this.name)" id="proxima" name="proxima" value="Próxima >>">';
    }
    echo '<br><br></div></div></div></div>';
}
echo '</form>';

$conexao->desconecta();
