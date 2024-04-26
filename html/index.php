<?php
// Verifica se os dados foram submetidos via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $assunto = isset($_POST['assunto']) ? $_POST['assunto'] : '';
    $mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';

    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "loginecoo";
    $table = "formulario_contato";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Prepara e executa a query SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO $table (nome, email, telefone, assunto, mensagem)
    VALUES ('$nome', '$email', '$telefone', '$assunto', '$mensagem')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Formulário enviado com Sucesso!');</script>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout Verde</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- <script src="../js/main.js"></script> -->
    <!-- <script src="../js/main.js"></script> -->
</head>

<body>
    <div id="section1">
        <div class="conteudo">
            <div class="left">
                <img class="imagem-header" src="../img/logoeconnect.png" alt="">
            </div>
            <div class="right">
                <p class="tec">Conectando tecnologia e Sustentabilidade</p>
                <center><button class="cta-button"><a href="#section2">Saiba Mais</a></button></center>
            </div>
        </div>
    </div>

    <div id="section2">
        <div id="conheca">


            <div class="meio">
                <p class="conheca">Na junção da inovação e respeito ao meio ambiente, nossa iniciativa de coleta de
                    eletrônicos ecoa alto, trazendo consigo a promessa de um futuro mais sustentável</p>
                <button class="con"><a href="#section3">Conheça mais</a></button>
            </div>

            <div class="content">
                <div class="linha">
                    <a class="lixos" href=""><img src="../img/linha.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>


    <div id="section3">
        <div class="conteudo">
            <div class="left">
                <h5 class="pq">Porque descartar corretamente?</h5>
            </div>
            <div class="right">
              <p class="descricao">Conheça nossos programas de
                    recompensas para usuários que descartam eletrônicos regularmente</p>
                <center><button class="mais"><a href="#section3-b">Mais detalhes</a></button></center>
            </div>
        </div>

    </div>

    <div id="section3-b">
        <div class="content">
            <h5 class="pq">Nossos programas de recompensa</h5>
            <br>
            <div class="figma">
                <a href=""><img src="../img/figma.png" alt=""></a>
            </div>
            <button class="ctaa-button"><a href="#section4">Fale Conosco</a></button>
        </div>
    </div>


    <div id="section4">
        <div id="container">
            <div class="faleconosco">
                <h1>Formulário de Contato</h1>
                <form class="form-horizontal" method="post" role="form" data-toggle="validator">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nome:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nome" id="nome" value=""
                                placeholder="Digite seu nome" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Email:</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email" value=""
                                placeholder="exemplo@dominio.com" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Telefone:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="telefone" id="telefone"
                                placeholder="(00) 00000-0000" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Assunto:</label>
                        <option value="" selected="selected" disabled="disabled">Escolha uma opção</option>
                        <div class="col-sm-9">
                            <select class="form-control" name="assunto" required>
                                <option value="contato">Assunto</option>
                                <option value="contato">Contato</option>
                                <option value="vendas">Vendas</option>
                                <option value="financeiro">Financerio</option>
                                <option value="informacoes">Informações</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Mensagem:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="exampleTextarea" rows="6" id="mensagem" name="mensagem"
                                placeholder="Digite uma mensagem" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <input class="enviar" id="submit" name="btnSend" type="submit" value="Enviar">
                            <a name="formulario"></a>
                            <!-- <button class="cta-button"><a href="#section1">Enviar</a></button> -->
                        </div>
                    </div>

                </form>

                <div id="div-btn-sobrenos">
                    <button class="sobreb"><a href="#section5">Sobre nós</a></button>
                </div>

            </div>
        </div>
    </div>
    <style>
    
</style>

<div id="section5">
    <div class="image-placeholder">
        <img src="../img/sobrenos.png" alt="Imagem sobre nós">
    </div>
    <footer class="footer">
        <p>&copy; 2024 Econnect. Todos os direitos reservados.</p>
    </footer>
</div>

<script>
    function toggleMenu() {
        var menu = document.querySelector('.menu');
        menu.classList.toggle("active");
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
</body>

</html>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>