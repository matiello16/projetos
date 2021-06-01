<?php
    include 'connect.php';
    include 'checkLogin.php';

    $s="select * from reg where id='$_SESSION[id]'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);

?>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="home.css">
    </head>
    <body>
        <div class="form">
            <table>
                <tr class="cabeca">
                    <td class="topo">
                        <h1>Bem vindo!</h1>
                         <hr>
                    </td>
                 </tr>
                 <tr>
                     <td class="imagem">
                         <img src="image/follow.jpeg" style="width: 60%; padding-left: 20%; padding-top: 1px;">
                     </td>
                 </tr>
                <tr>
                    <td class="info">
                       <strong>Nome</strong> 
                        <?php echo $f['name'];?>
                    </td>
                </tr>
                <tr>
                    <td class="info">
                        <strong>Email</strong>                
                        <?php echo $f['username'];?>
                    </td>
                </tr>
                <tr>
                    <td class="info">
                        <strong>Senha</strong>
                        <?php echo $f['password']."<br>";?>
                    </td>
                </tr>
                <tr>
                    <td class="info">
                        <strong>Cidade</strong>          
                        <?php echo $f['city']."<br>";?>
                    </td>
                </tr>
                <tr>
                  <td class="info">
                        <strong>Genero</strong>
                        <?php echo $f['gender']."<br>";?>
                        <strong><p class="foto">Foto</p></strong>
                    </td>
              </tr>
              <tr>
                <td class="info">
                    <img src="<?php echo $f['image'];?>" width="100px" height="100px">
                </td>
             </tr>
             <tr>
                 <td class="links">
                     <?php
                        if($_SESSION['profile']=='Admin'){
                            echo 
                            "
                            <a href='logger.php'>Clique para fazer o logging</a><br>
                            <a href='viewall.php'>Visualizar Usuarios</a><br>
                            <a href='logout.php'>Logout</a>
                            ";
                        }else{
                         echo 
                         "
                        <tr>
                            <td>
                                <a href='logging.php'>Clique para fazer o logging</a><br>
                                <a href='carrinho.php'>Carrinho de Compra</a><br>
                                <a href='logout.php'>Logout</a>
                            </td>
                        </tr>
                         ";
                        }
                    ?>
                 </td>
             </tr>
            </table>     
        </div>




    </body>
</html>