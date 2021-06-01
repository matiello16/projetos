<?php
    include 'connect.php';
    include 'checkLogin.php';
    include 'checkAdmin.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="viewall.css">
    </head>
    <body>
        <div class="tabela">
            <div class="img">
                <img src="image/follow.jpeg">
            </div>
            <table border='1'>
                <tr>
                    <th>
                        Nome
                    </th>
                    <th>
                        Usuario
                    </th>
                    <th>
                        Cidade
                    </th>
                </tr>

            <?php
            $sq="select * from reg";
            $qu=mysqli_query($con,$sq);
            while($f=  mysqli_fetch_assoc($qu)){
                ?>
                <tr>
                    <td>
                        <?php echo $f['name']?>
                    </td>
                    <td>
                        <?php echo $f['username']?>
                    </td>
                    <td>
                        <?php echo $f['city']; ?>
                    </td>
                    <td>
                        <a href="edit.php">Editar</a>
                    </td>
                </tr>
                <?php

            }
            ?>
            </table>
        </div>
    </body>
</html>