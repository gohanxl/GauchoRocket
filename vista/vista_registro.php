<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>
<?php

if(isset($_POST['registro'])){

    if(isset($_POST['user']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['telefono'])){
        $user = $_POST['user'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $fec_nacimiento = $_POST['nacimiento'];

        $id = random_int(2, 40);

        registrarUsuario($id, $user, $password, $email);

        $userId = getUsuarioId($user);
        addCliente($user, $userId, $telefono, $fec_nacimiento);

        header("Location: /login");
    }
}


?>
<body class="text-center">
<form class="form-signin" method="post" action="" enctype="application/x-www-form-urlencoded">
    <img class="mb-4" src="/public/img/rocket.png" width="72" height="72"/>
    <h1 class="h3 mb-3 font-weight-bold">Bienvenido a GauchoRocket!</h1>
    <h4 class="h4 mb-3 font-weight-normal">Registro</h4>
    <?php
    if (isset($error)) {
        echo "<label class='text-danger'>" . $error . "</label>";
    }
    ?>
    <label for="inputUser" class="sr-only">Usuario</label>
    <input type='text' id='inputUser' class='form-control' placeholder='Usuario' name='user' value=''
           required autofocus>

    <input type='password' id='\"inputPassword\"' class='form-control' placeholder='Contraseña'  name='password'   required autofocus>

    <input type='email' id='inputEmail' class='form-control' placeholder='E-mail'  name='email'   required autofocus>

    <input type='text' id='inputTelefono' class='form-control' placeholder='Telefono'  name='telefono'   required autofocus>

    <input type='date' id='inputDate' class='form-control' placeholder='Nacimiento'  name='nacimiento'   required autofocus>

    <input class="btn btn-lg btn-primary btn-block" type="submit" name="registro" value="Registrarse"
           style="background-color: darkslateblue"/>
</form>
</body>
</html>
