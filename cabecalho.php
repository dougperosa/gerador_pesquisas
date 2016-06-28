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
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    </head>
    <body>
        <div class="container" style="height: 150px; background-color: #00995D; border-radius: 6px;">
            <table width="100%" border="0">
                <tr>
                    <td width="26%"><a href="exibequestionarios.php"><img src="./imagens/logo.png" id="logo_cabecalho" border="0" style="position: absolute; z-index: 1; width: 187px; height: 115px; margin-left: 30px; margin-top: 5px "></a></td>
                </tr>
            </table>
            <div align="right" style="margin-right: 15px; margin-top: 10px" >
                <?php
                        error_reporting(0);

                        session_start();

                        if (!empty($_SESSION['nome'])) {

                            echo '<font style="color: white"><b>Bem vindo, ' . $_SESSION['nome'] . '&nbsp&nbsp|&nbsp&nbsp<a href="http://www.unimed-erechim.com.br" class="btn btn-info">Sair</a></b></font>';
                            
                        }
                        ?>
            </div>
        </div>
