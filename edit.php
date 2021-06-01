<?php
include 'connect.php';
include 'checkLogin.php';

if(isset($_POST['sub'])){
    $t=$_POST['text'];
    $u=$_POST['user'];
    $p=$_POST['pass'];
    $c=$_POST['city'];
    $g=$_POST['gen'];
    if($_FILES['f1']['name']){
    move_uploaded_file($_FILES['f1']['tmp_name'], "image/".$_FILES['f1']['name']);
    $img="image/".$_FILES['f1']['name'];
    }
    else{
        $img=$_POST['img1'];
    }
    $i="update reg set name='$t',username='$u',password='$p',city='$c',gender='$g',image='$img' where id='$_SESSION[id]'";
    mysqli_query($con, $i);
    header('location:home.php');
}
    $s="select*from reg where id='$_SESSION[id]'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);
    ?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="edit.css">    
    </head>
    <body>
        <div class="form">
            <form method="POST" enctype="multipart/form-data">
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
                                    <input type="text" name="text" value="<?php echo $f['name']?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="info">
                                    <strong>Usuario</strong>
                                    <input type="text" name="user" value="<?php echo $f['username']?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="info">
                                    <strong>Senha</strong>
                                    <input type="password" name="pass" value="<?php echo $f['password']?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="info">
                                    <strong>Cidade</strong>
                                    <select name="city">
                                        <option value="">-select-</option>
                                    
                                        <?php
                                        $sqlCity= mysqli_query($con, "select * from city");
                                                                    
                                        while($item = mysqli_fetch_assoc($sqlCity))
                                        {
                                            $nomeItem = utf8_encode($item['nameCity']);
                          
                                            if($f['city'] == $nomeItem){
                                                echo "                                
                                                    <option value=$nomeItem selected='selected'>$nomeItem</option>                                
                                                ";
                                            }else{
                                                echo " <option value=$nomeItem>$nomeItem</option>";
                                            }
                                        }
                                        ?>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td class="info">
                                    <strong>Genero</strong>
                                    <?php if($f['gender']=='male'){
                                        ?>
                                      <input type="radio"name="gen" id="gen" value="male" checked>
                                    <?php
                                    } else {
            ?>
                                    <input type="radio"name="gen" id="gen" value="male">
                                    <?php } ?>male
                                   <?php if($f['gender']=='female'){
                                        ?>
                                      <input type="radio"name="gen" id="gen" value="female" checked>
                                    <?php
                                    } else {
            ?>
                                    <input type="radio"name="gen" id="gen" value="female">
                                    <?php } ?>female    <br>
                                    <strong>Foto</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="info">
                                    <img src="<?php echo $f['image']?>" width="100px" height="100px">
                                    <input type="file" name="f1">
                                    <input type="hidden" name="img1" value="<?php echo $f['image']?>">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="submit" name="sub">
                                           
                                </td>
                            </tr>
                        </table>
            </form>
        </body>
    </div>
</html>