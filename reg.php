<?php

include 'connect.php';
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
    $i="insert into reg(name,username,password,city,image,gender)value('$t','$u','$p','$c','$img','$g')";
    mysqli_query($con, $i);
    header('location:login.php');
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="reg.css">
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td class="h1">
                        <h1 class="h3 mb-3 fw-normal">Cadastre-se</h1>
                    </td>
                    <td class="img">
                        <img src="image/bring.ico">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="text" class="form-control" id="floatingInput" placeholder="Nome">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="user" class="form-control" id="floatingInput" placeholder="Usuario">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="pass" class="form-control" id="floatingInput" placeholder="Senha">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Cidade</label>
                        <select name="city">
                            <option value="">-select-</option>

                            <?php
                            $sqlCity= mysqli_query($con, "select * from city");
                                                        
                            while($item = mysqli_fetch_assoc($sqlCity))
                            {
                                $nomeItem = utf8_encode($item['nameCity']);
                                $idCity = $item['idCity'];
                                echo "                                
                                    <option value=$nomeItem>$nomeItem</option>                                
                                ";
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Sexo</label>
                        <input type="checkbox" name="gen" id="gen" value="male">male
                        <input type="checkbox" name="gen" id="gen" value="female">female
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Foto</label>
                        <input type="file" name="f1">
                    </td>
                </tr>
                <tr >
                    <td>
                        <input type="submit" value="Cadastrar" name="sub" class="w-100 btn btn-lg btn-primary">
                    </td>
                </tr>
            </table>
    </body>
</html>
