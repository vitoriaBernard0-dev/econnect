<?php
// Conexão com o banco de dados
$servername = "localhost"; // Altere para o nome do seu servidor, se necessário
$username = "root"; // Altere para o seu nome de usuário do banco de dados
$password = ""; // Altere para a sua senha do banco de dados
$dbname = "loginecoo"; // Nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Inicializando a variável de controle da mensagem de erro
$display_error_message = false;

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Processar os dados do formulário
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Criptografar a senha
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Inserir dados no banco de dados
    $sql = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Redirecionar para a página de login após o cadastro
        header("Location: login.php");
        exit();
    } else {
        // Exibir mensagem de erro caso ocorra um problema ao inserir os dados
        echo "Erro ao cadastrar o usuário: " . $conn->error;
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
                    Cadastre-se
                </span>

                <div class="wrap-input100 validate-input" data-validate="Email válido é necessário: ex@abc.xyz">
                    <input class="input100" type="email" name="email" placeholder="Email" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Senha é necessária">
                    <input class="input100" type="password" name="senha" placeholder="Senha" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
