<?php

session_start();

include './cabecalho.php';

include './conectorBD.php';

$conexao = new conexao();
$conexao->conecta();

$query = 'SELECT * FROM questionarios WHERE periodo_inicial <= CURRENT_DATE AND periodo_final >= CURRENT_DATE';
$resultset = mysql_query($query);

echo '<div class="container" style="margin-top: 20px;">';
echo '<table><tr>';

$count = 0;

while ($row = mysql_fetch_row($resultset)) {
    
    $count++;
    
    if($count > 3){
        echo '</tr><tr>';
        $count = 0;
    }
        
    echo '<td>';
    echo '<div class="alert" style="width: 260px; height: 200px;" align="center">';
    echo '<form method="post" action="exibequestoes.php">';
    echo '<input type="hidden" name="pesquisa" value="'.$row[0].'"><br> ';
    echo '<img src="imagens/'.$row[7].'" style="width: 150px; heigth: 100px"/><br><br>';
    echo '<b>'.$row[1].'</b><br>';
    
    //VERIFICA LOG, CASO USUARIO JÁ RESPONDEU A PESQUISA HAVERÁ UM BLOQUEIO
    $querylog = 'SELECT * FROM log_questionarios WHERE id_questionario = '.$row[0].' AND usuario = "'.$_SESSION['usuario'].'"';
    $resultsetlog = mysql_query($querylog);
    $rowlog = mysql_fetch_row($resultsetlog);
    
    if(!empty($rowlog[0])){
        echo '<div class="alert alert-error" style="width: 200px">Pesquisa já Respondida</div>';
    }else{
        echo '<input type="submit" class="btn btn-success" value="Iniciar" style="width: 150px">';
    }
    
    echo '</form>';
    echo '</div>';
    echo '</td>';
    
}
echo '</tr></table></div>';

$conexao->desconecta();