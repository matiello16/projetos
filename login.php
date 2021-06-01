<?php

// Conexão com banco de dados 
include'connect.php';

if(isset($_POST['sub'])){
    $u=$_POST['user'];
    $p=$_POST['pass'];
    $s= "
    select * from reg as r
    INNER join profile_reg as p on p.idProfile = r.fk_idProfile 
    where username='$u' and password= '$p'
    ";   
    $qu= mysqli_query($con, $s);
   
    if(mysqli_num_rows($qu)>0){
        $f= mysqli_fetch_assoc($qu);
        $_SESSION['id']=$f['id'];
        $_SESSION['profile']=$f['nameProfile'];
        header ('location:home.php');
    }
   else{
       echo 'username or password does not exist';
   }
  
}
?>
<html>
      
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="log.css">
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td class="h1">
                        <h1 class="h3 mb-3 fw-normal">Login</h1>
                    </td>
                    <td class="img">
                        <img src="image/bring.ico">
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
                        <input type="submit" name="sub" value="Logar" class="w-100 btn btn-lg btn-primary">
                    </td>
                </tr>

                <tr>
                    <td>
                </tr>
            </table>
    </body>
</html>
