<?php 
    
function logMsg( $msg, $level = 'info', $file = 'main.log' )
{
    // variável que vai armazenar o nível do log (INFO, WARNING ou ERROR)
    $levelStr = '';
 
    // verifica o nível do log
    switch ( $level )
    {
        case 'info':
            // nível de informação
            $levelStr = 'INFO';
            break;
 
        case 'warning':
            // nível de aviso
            $levelStr = 'WARNING';
            break;
 
        case 'error':
            // nível de erro
            $levelStr = 'ERROR';
            break;
    }
    
    date_default_timezone_set('America/Sao_Paulo');
    // data atual
    $date = date( 'Y-m-d H:i:s' );
 
    // formata a mensagem do log
    // 1o: data atual
    // 2o: nível da mensagem (INFO, WARNING ou ERROR)
    // 3o: a mensagem propriamente dita
    // 4o: uma quebra de linha
    $msg = sprintf( "[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL );
 
    // escreve o log no arquivo
    // é necessário usar FILE_APPEND para que a mensagem seja escrita no final do arquivo, preservando o conteúdo antigo do arquivo
    file_put_contents( $file, $msg, FILE_APPEND );
    $con=  mysqli_connect("localhost","root","","test");


    //$idReg = $_SESSION[id];
    $idReg = '6';

    $sqlInsertLogging = "INSERT INTO logging (dataLogging, level, msg, fk_reg) VALUES ('$date', '$levelStr', '$msg', '$idReg')";
    mysqli_query($con, $sqlInsertLogging);

}

logMsg( "A tarefa foi executada com sucesso", 'Logging Efetuado!' );
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="loggging.css">
    </head>
    <body>
        <div class="table">
            <div class="topo">
                <img src="image/follow.jpeg">
            </div>
            <table border='1' class="tabela">
                <tr>
                    <th>
                        Id Usuario
                    </th>
                    <th>
                        Mensagem
                    </th>
                    <th>
                        Data
                    </th>
                </tr>

            <?php

            $con=  mysqli_connect("localhost","root","","test");
            $sl="select * from logging";
            $qul=mysqli_query($con,$sl);
            while($f=  mysqli_fetch_assoc($qul)){
                ?>
                <tr>
                    <td>
                        <?php echo $f['idLogging']?>
                    </td>
                    <td>
                        <?php echo $f['msg']?>
                    </td>
                    <td>
                        <?php echo $f['dataLogging'] ?>
                    </td>
                </tr>
                <?php
            }
            ?>
                </table>
        </div>
    </body>
</html>