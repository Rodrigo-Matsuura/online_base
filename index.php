<?php
    header('Cache-Control: no cache'); //no cache
    session_cache_limiter('private_no_expire'); // works
    //session_cache_limiter('public'); // works too
    session_start();
    include_once("/conectabd.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        
        <script data-ad-client="ca-pub-4241594865030406" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" type="image/png" href="/imagens/box.png" />
        <link rel="stylesheet" type="text/css" href="/main.css" media="screen" />
        <meta charset="UTF-8">
        <title>Base Online</title>
    </head>
    <body>
        
        <script>function selectElementContents(el) {
            var body = document.body, range, sel;
            if (document.createRange && window.getSelection) {
                range = document.createRange();
                sel = window.getSelection();
                sel.removeAllRanges();
                    try {
                        range.selectNodeContents(el);
                        sel.addRange(range);
                    }
                catch (e) {
                    range.selectNode(el);
                    sel.addRange(range);
                }
            document.execCommand("copy");
            }
            else if (body.createTextRange) {
                range = body.createTextRange();
                range.moveToElementText(el);
                range.select();
                range.execCommand("Copy");
            }
        }</script>
        
        <h1>BASE ONLINE</h1>
        <div id = "menu">
            <ul>
                <li><a href="/index.php">Home</a></li>
                <li><a href="/sobre.php">Sobre</a></li>
            </ul>
        </div>
        <h2>Enviar para campo</h2>
        <form method = "POST" action = "index.php">
            <label>DIGITE O Código: </label><input type = "text" name="pesquisar" required />
            <input type = "submit" value = "ENVIAR">
        </form>
        <br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        
        
        <?php
            if (!empty($_POST)) {
        ?>
            <table>
            <tr>
                <td>
                    <input type="button" value="Copiar tabela" onclick="selectElementContents( document.getElementById('tableId') );">
                    <input type="button" value="Copiar telefones" onclick="selectElementContents( document.getElementById('oe') );">
                    <input type="button" value="Copiar IP" onclick="selectElementContents( document.getElementById('ipa') );">
                </td>
                <td>
                    <input type="button" value="Copiar tabela POS" onclick="selectElementContents( document.getElementById('tableIde') );">
                    <input type="button" value="Copiar telefones POS" onclick="selectElementContents( document.getElementById('oee') );">

                </td>
            </tr>
            <tr>
                <td>
            <?php

            $pesquisarcomespaco = $_POST['pesquisar'];
            $pesquisar = str_replace(' ', '', $pesquisarcomespaco);
            $result_codigo = "SELECT * FROM basepostos WHERE codigo LIKE '$pesquisar'";
            $resultado_codigo = mysqli_query($conn, $result_codigo);
            
            while($rows_codigo = mysqli_fetch_array($resultado_codigo)){
                echo '<div class="texto">';
                echo '<table id="tableId">';
                echo "<tr>
                      <td>codigo</td>
                        <td>///</td>
                        <td>". $rows_codigo['codigo'] ."</td>
                        <td>///</td>
                    </tr>
                    <tr>
                        <td>Razão Social</td>
                        <td>///</td>
                        <td>". $rows_codigo['razaosocial'] ."</td>
                        <td>///</td>
                    </tr>
                    <tr>
                        <td>CPNJ</td>
                        <td>///</td>
                        <td>". $rows_codigo['cnpj'] ."</td>
                        <td>///</td>
                    </tr>
                    <tr>
                        <td>Endereço</td>
                        <td>///</td>
                        <td>". $rows_codigo['endereco'] ."</td>
                        <td>///</td>
                    </tr>
                    <tr>
                        <td>Bairro</td>
                        <td>///</td>
                        <td>". $rows_codigo['bairro'] ."</td>
                        <td>///</td>
                    </tr>
                    <tr>
                        <td>Cidade</td>
                        <td>///</td>
                        <td>". $rows_codigo['cidade'] ."</td>
                        <td>///</td>
                    </tr>
                    <tr>
                        <td>UF</td>
                        <td>///</td>
                        <td>". $rows_codigo['uf'] ."</td>
                        <td>///</td>
                    </tr>
                    <tr>
                        <td>CEP</td>
                        <td>///</td>
                        <td>". $rows_codigo['cep'] ."</td>
                        <td>///</td>
                    </tr>
                    <tr>
                        <td>Latitude</td>
                        <td>///</td>
                        <td>". $rows_codigo['latitude'] ."</td>
                        <td>///</td>
                    </tr>
                    <tr>
                        <td>Longitude</td>
                        <td>///</td>
                        <td>". $rows_codigo['longitude'] ."</td>
                        <td>///</td>
                    </tr>
                    <tr>
                        <td>Telefone/Contato</td>
                        <td>///</td>
                        <td id='oe'>". $rows_codigo['telefone'] ."</td>
                        <td>///</td>
                    </tr>
                    <tr>
                        <td>Funcionamento</td>
                        <td>///</td>
                        <td>". $rows_codigo['funcionamento'] ."</td>
                        <td>///</td>
                    </tr>
                    <tr>
                        <td>Funcionamento Escritório</td>
                        <td>///</td>
                        <td>". $rows_codigo['funcionamentoescrito'] ."</td>
                        <td>///</td>
                    </tr>
                    <tr>
                        <td>Horário de Acesso</td>
                        <td>///</td>
                        <td>". $rows_codigo['funcionamentoacesso'] ."</td>
                        <td>///</td>
                    </tr>
                    <tr>
                        <td>SLA</td>
                        <td>///</td>
                        <td>". $rows_codigo['sla'] ."</td>
                        <td>///</td>
                    </tr>
                </table>";
                echo "</div>";
                $cidade = $rows_codigo['cidade'];
                $uf = $rows_codigo['uf'];
                
            }
            ?>
            </td>
                </tr>
                </table>
                <?php
                $pesquisarip = $pesquisar;
                $result_codigoip = "SELECT * FROM automacao WHERE codigob LIKE '$pesquisarip'";
                $resultado_codigoip = mysqli_query($conn, $result_codigoip);
                while($rows_codigoip = mysqli_fetch_array($resultado_codigoip)){
                    echo '<div class="texto">'; 
                    echo '<table id="tableId">';
                    echo "<tr>
                            <td>codigo</td>
                            <td>///</td>
                            <td>". $rows_codigoip['codigob'] ."</td>
                            <td>///</td>
                        </tr>
                        <tr>
                            <td>Nome</td>
                            <td>///</td>
                            <td>". $rows_codigoip['nomeb'] ."</td>
                            <td>///</td>
                        </tr>
                        <tr>
                            <td>Endereço de IP</td>
                            <td>///</td>
                            <td id='ipa'>". $rows_codigoip['IPb'] ."</td>
                            <td>///</td>
                        </tr>
                        <tr>
                            <td>Modelo</td>
                            <td>///</td>
                            <td>". $rows_codigoip['controlerb'] ."</td>
                            <td>///</td>
                        </tr>
                    </table>";
                    echo "</div>";
                
                }

                $pesquisarReg = $pesquisar;
                $result_Reg = "SELECT * FROM regiao WHERE codigoreg LIKE '$pesquisarReg'";

                $resultado_Reg = mysqli_query($conn, $result_Reg);
                while($rows_Reg = mysqli_fetch_array($resultado_Reg)){
                    echo '<div class="texto">';
                    echo '<table id="tableId">';
                    echo "<tr>
                            <td>codigo</td>
                            <td>///</td>
                            <td>". $rows_Reg['codigoreg'] ."</td>
                            <td>///</td>
                        </tr>
                        <tr>
                            <td>Nome</td>
                            <td>///</td>
                            <td>". $rows_Reg['razaoreg'] ."</td>
                            <td>///</td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td>///</td>
                            <td>". $rows_Reg['estadoreg'] ."</td>
                            <td>///</td>
                        </tr>
                        <tr>
                            <td>Cidade</td>
                            <td>///</td>
                            <td>". $rows_Reg['cidadereg'] ."</td>
                            <td>///</td>
                        </tr>
                        <tr>
                            <td>FILA</td>
                            <td>///</td>
                            <td>". $rows_Reg['regiaoreg'] ."</td>
                            <td>///</td>
                        </tr>
                        <tr>
                            <td>Validação</td>
                            <td>///</td>
                            <td>". $rows_Reg['validareg'] ."</td>
                            <td>///</td>
                        </tr>
                    </table>";
                    echo "</div>";
                
                }

            } else {
                echo '<br>';
                echo "<p>Por favor, digite o codigo</p>";
            }
            
        ?>
    </body>
</html> 
