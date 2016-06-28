<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
        <title>Pesquisas Unimed</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8"/>
        <meta name="description" content="Pesquisas Unimed Erechim"/>
        <meta name="author" content="Douglas Perosa"/>

        <link rel="shortcut icon" href="imagens/favicon.ico"/>

        <link href="bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="js/functions.js"></script>
    </head>

    <body style="background-color: #00995D">
        <div class="container">
            <table height="200" width="550" style="margin-left: 250px; margin-top: 180px; background-color: #FFF0C7; border-radius: 15px">
                <tr>
                    <td valign="middle" align="center">
                        <br>
                            <form class="form-signin" name="form" id="form-login" method="post" action="gravaUsuario.php">
                                <br><b>Preencha o Formul&aacute;rio:</b><br><br>
                                    <table width="300" border="0" align="center" bgcolor="#99cc99">
                                        <tr>
                                            <td width="30%">Nome:</td>
                                            <td width="70%"><input placeholder="Digite seu Nome" type="text" class="text" name="nome" id="nome" style="height: 30px" required></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Setor:</td>
                                            <td width="70%">
                                                <select name="setor" required>
                                                    <?php
                                                    
                                                    header("Content-Type: text/html; charset=ISO-8859-1",true);
                                                    
                                                    include './conectorBD.php';

                                                    $conexao = new conexao();
                                                    $conexao->conecta();

                                                    $query = 'SELECT * FROM setores ORDER BY SETOR ASC';
                                                    $resultset = mysql_query($query);
                                                    
                                                    echo '<option name="Selecione" value="">Selecione</option>';
                                                    while ($row = mysql_fetch_row($resultset)) {
                                                        echo '<option name="'.$row[1].'" value="'.$row[0].'">'.$row[1].'</option>';
                                                    }
                                                    
                                                    $conexao->desconecta();
                                                    
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Usu&aacute;rio:</td>
                                            <td width="70%"><input placeholder="Digite seu Usu&aacute;rio" type="text" class="text" name="usuario" id="usuario" style="height: 30px" required></td>
                                        </tr>
                                        <tr>
                                            <td>Senha:</td>
                                            <td><input placeholder="Digite sua Senha" type="password" class="text" name="senha" id="senhaCadastro"  style="height: 30px" required></td>
                                        </tr>
                                        <tr>
                                            <td>Confirma&ccedil;&atilde;o:</td>
                                            <td><input placeholder="Digite sua Senha" type="password" class="text" name="confirmacao" id="confirmacao"  style="height: 30px" onblur="validaConfirmacao()" required></td>
                                        </tr>
                                        <tr align="right">
                                            <td>&nbsp;</td>
                                            <td><input style="width: 120px; margin-top: 10px" type="submit" class="btn btn-success" name="confirmar" value="Comfirmar" id="loginButton"></td>
                                        </tr>
                                    </table>
                            </form>
                    </td>
                </tr>
            </table>
            <!--<img style="position: absolute; z-index: 1; margin-top: -80px; margin-left: 110px" src="imagens/logo.png" width="250" height="200">-->
        </div>
    </body>