<html>
    <head>
        <meta charset="utf-8"/>
    </head>

    <?php
    error_reporting(0);

    session_start();

    include './conectorBD.php';

    $conexao = new conexao();
    $conexao->conecta();

    $quantidadequestoes = $_POST['quantidadequestoes'];
    $questionario = $_POST['questionario'];
    $usuario = $_SESSION['usuario'];
    $setor = $_SESSION['setor'];
    $status = true;

    for ($i = 1; $i <= $quantidadequestoes; $i++) {
        $questao = $_POST['questao' . $i];
        $resposta = $_POST['resposta' . $i];
        $consideracoes = $_POST['consideracoes' . $i];

        $query = 'INSERT INTO respostas_questionario (id_questionario, id_questao, resposta, consideracoes, id_setor) VALUES (' . $questionario . ',' . $questao . ',"' . $resposta . '","' . $consideracoes . '",' . $setor . ')';

        if ($resultset = mysql_query($query)) {
            $status = true;
        } else {
            $status = false;
        }
    }

    $query2 = 'INSERT INTO respostas_questionario_camposabertos (id_questionario, pontos_fortes, melhorias, novos_servicos, comentarios, id_setor) VALUES (' . $questionario . ',"' . $_POST["pontosfortes"] . '","' . $_POST["melhorias"] . '","' . $_POST["servicos"] . '","' . $_POST["comentarios"] . '",' . $setor . ')';

    if ($resultset2 = mysql_query($query2)) {
        $status = true;
    } else {
        $status = false;
    }

    if ($status = true) {
        $querylog = 'INSERT INTO log_questionarios (id_questionario, usuario, id_setor) VALUES (' . $questionario . ', "' . $usuario . '", ' . $setor . ')';

        $resultsetlog = mysql_query($querylog);
        echo '<script>alert("Sua pesquisa foi cadastrada com sucesso!")</script>';
        echo '<script type="text/javascript">location.href = "exibequestionarios.php";</script>';
    } else {
        echo '<script>alert("Houve algum erro ao gravar sua pesquisa! Entre em contato com setor responsável.")</script>';
        echo '<script type="text/javascript">location.href = "exibequestionarios.php";</script>';
    }


    $conexao->desconecta();
    