<?php
if (isset($_COOKIE['user']) and isset($_COOKIE['pass'])) {
    $userguardado = $_COOKIE['user'];
    $passguardado = $_COOKIE['pass'];

    #autoLogin($userguardado, $passguardado);
}

if (isset($_POST['login'])) {
    if(isset($_POST['user']) && isset($_POST['password'])){
        $user = $_POST['user'];
        $password = $_POST['password'];

        $userId = getUsuarioId($user);

        if(getAdminEstado($userId)){
            $_SESSION['admin'] = true;
        }else{
            $_SESSION['admin'] = false;
        }

        $error = autoLogin($user, $password);

        if(isset($_POST['rememberme'])){
            setcookie("user",$user,time()+1000);
            setcookie("pass",$password,time()+1000);
        }else{
            setcookie("user",$user,time()-1000);
            setcookie("pass",$password,time()-1000);
        }
    }
}

function autoLogin($user, $password){
    $validar = login($user, $password);
    if($validar['user'] == $user){
        session_start();
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $validar['id'];
        $_SESSION['name'] = getNombreClienteByIdUsuario($_SESSION['user']);
        header('Location: /');
    }else{
        return 'El usuario o la contraseña no son validos.';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="/public/css/signin.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body class="text-center">
<form class="form-signin" method="post" action="" enctype="application/x-www-form-urlencoded">
    <img class="mb-4" src="/public/img/rocket.png" width="72" height="72"/>
    <h1 class="h3 mb-3 font-weight-bold">Bienvenido a GauchoRocket!</h1>
    <h4 class="h4 mb-3 font-weight-normal">Inicio de Sesion</h4>
    <?php
    if( isset($error) ){
        echo "<label class='text-danger'>" . $error . "</label>";
    }
    ?>
    <label for="inputUser" class="sr-only">Usuario</label>
    <?php
        if (isset($userguardado) and isset($passguardado)){
            echo "
                <input type='text' id='inputUser' class='form-control' placeholder='Usuario'  name='user' value='$userguardado'  required autofocus>
                <label for=\"inputPassword\" class=\"sr-only\">Contraseña</label>
                <input type=\"password\" id=\"inputPassword\" class=\"form-control\" placeholder=\"Contraseña\" name=\"password\" value='$passguardado' required>
            ";
        }
        else{
            echo "
            <input type='text' id='inputUser' class='form-control' placeholder='Usuario'  name='user'   required autofocus>
            <label for=\"inputPassword\" class=\"sr-only\">Contraseña</label>
            <input type=\"password\" id=\"inputPassword\" class=\"form-control\" placeholder=\"Contraseña\" name=\"password\" required>
            ";
        }
    ?>
    <label>
        <input type="checkbox" name="rememberme"> Recordarme
    </label>
    <input class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Iniciar sesión" style="background-color: darkslateblue"/>
</form>
</body>
</html>