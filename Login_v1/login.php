<?php
$servername = "localhost"; // Altere para o nome do seu servidor, se necessário
$username = "root"; // Altere para o seu nome de usuário do banco de dados
$password = ""; // Altere para a sua senha do banco de dados
$dbname = "loginecoo"; // Nome do banco de dados

// Criando a conexão
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
    $sql_query = $mysqli->query($sql_code);

    if ($sql_query->num_rows >= 1) {
        $linha = $sql_query->fetch_assoc();
        $senha_hash = $linha['senha'];

        if (password_verify($senha, $senha_hash)) {
            // Senha correta

            session_start();
            $_SESSION['user'] = $linha['id'];

            header("location: ../html/index.php");
            exit();
        } else {
            // Senha incorreta
            echo '<script>alert("Senha Incorreta Inserida!");</script>';
            echo '<script>
                setTimeout(function(){
                    window.location.href = "login.php";
                }, 1000); // Redireciona após 1 segundo
              </script>';
        }
    } else {
        echo '<script>alert("Usuario Não Encontrado!");</script>';
        echo '<script>
            setTimeout(function(){
                window.location.href = "login.php";
            }, 1000); // Redireciona após 1 segundo
          </script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/Captura_de_tela_2024-01-26_144758-removebg-preview.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/Captura_de_tela_2024-01-26_144758-removebg-preview.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <span class="login100-form-title">
                    ECOCONECT
                </span>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="pass" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">Login</button>
                </div>
            </form>

                <div class="text-center p-t-12">
                    <span class="txt1">Forgot</span>
                    <a class="txt2" href="#">Username / Password?</a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="cadastro.php">Create your Account <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
