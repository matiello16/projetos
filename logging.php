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

logMsg( "Executando a tarefa" );
logMsg( "Isto é um aviso a operação X pode falhar", 'warning' );
logMsg( "A tarefa foi executada com sucesso", 'Logging Efetuado!' );
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="loger.css">
</head>
<body>
    <div class="tabela">
        <div class="topo">
            <h1>Logging Efetuado!</h1>
            <hr>
        </div>
        <div class="conteudo">
            <div class="imagem">
                <img src="image/follow.jpeg">
            </div>
            <div class="links">
                <a href="carrinho.php">Carrinho de compras</a><br>
                <a href="home.php">Voltar para o home</a>
            </div>
        </div>
    </div>
</body>
</html>
