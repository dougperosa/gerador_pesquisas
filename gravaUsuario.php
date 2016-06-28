<html>
    <head>
        <meta charset="utf-8"/>
    </head>

    <?php
    error_reporting(0);

    include './conectorBD.php';

    $conexao = new conexao();
    $conexao->conecta();

    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $setor = $_POST['setor'];

    $verifica = 'SELECT * FROM usuarios WHERE usuario = "' . $usuario . '"';
    $resultsetverifica = mysql_query($verifica);
    $rowverifica = mysql_fetch_array($resultsetverifica);

    if (empty($rowverifica[0])) {
        $query = "INSERT INTO usuarios (usuario, senha, id_setor, nome) values ('" . $usuario . "', MD5('" . $senha . "'), " . $setor . ",'" . $nome . "')";
        $resultset = mysql_query($query);
        
        if ($resultset) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['nome'] = $nome;
            $_SESSION['setor'] = $setor;

            echo '<script>alert("Usuário cadastrado com sucesso!")</script>';
            echo '<script type="text/javascript">location.href="exibequestionarios.php";</script>';
        } else {
            echo '<script>alert("Usuário não pode ser cadastrado! Entre em contato com suporte responsável.")</script>';
            echo '<script type="text/javascript">location.href="login.php";</script>';
        }
    } else {
        echo '<script>alert("Já há cadastro com esse nome de usuário!")</script>';
        echo '<script type="text/javascript">location.href="primeiroAcesso.php";</script>';
    }

    $conexao->desconecta();
    