<?php
include("config.php");
$msg = 0;
if(isset($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $consulta = $MySQLi->query("SELECT * FROM TB_CLIENTES where CLI_USUARIO = '$usuario' and CLI_SENHA = '$senha'");
    if($resultado = $consulta->fetch_assoc()){
        $_SESSION['codigocliente'] =
            $resultado['CLI_CODIGO'];
        $_SESSION['nomecliente'] =
            $resultado['CLI_NOME'];
        header("Location: index.php");
    }
    $msg = 1;
} 
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta author="Guilherme Costa de Medeiros">
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a class="navbar-brand" href="index.php">PizzaGuiga</a><span class="splash-description"><small>Usuário: gui | senha: 123</small></span></div>
            <?php if($msg==1) echo "<span style='text-align: center; color:red'>Usuário ou senha inválida!</span>"; ?>
            <div class="card-body">
                <form action="?" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="usuario" type="text" placeholder="Usuário" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="senha" type="password" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Lembrar</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Logar</button>
                </form>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>