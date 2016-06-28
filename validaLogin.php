<html>
    <head>
        <meta charset="utf-8"/>
    </head>

<?php

include './conectorBD.php';

$conexao = new conexao();
$conexao->conecta();

$usuario = $_POST['Usuario'];
$senha = $_POST['Senha'];

$query = 'SELECT * FROM usuarios WHERE usuario = "'.$usuario.'" AND senha = MD5("'.$senha.'")';
$resultset = mysql_query($query);
$row = mysql_fetch_array($resultset); 

if(!empty($row[0])){
    
    session_start();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['nome'] = $row[4];
    $_SESSION['setor'] = $row[3];
    
    echo '<script type="text/javascript">location.href="exibequestionarios.php";</script>';
    
}else{
    echo '<script>alert("Usuário e/ou senha incorreto(s)!")</script>';
    echo '<script type="text/javascript">location.href="login.php";</script>';
}

$conexao->desconecta();