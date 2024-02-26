<?php

if (isset($_POST['btnSend'])) {

    $msg = '';
    
    //campos do formulario
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST['mensagem'];

    //valida se os campos não estão vazios
    if ((!empty($nome)) && (!empty($email)) && (!empty($telefone)) && (!empty($assunto)) && (!empty($mensagem))) {
        
        $email_remetente = "contato@cristianefaria.com"; // deve ser uma conta de email do seu dominio 
        $email_destinatario = $email; // email que receberá as mensagens
        $email_recebidoDe = "$email";
        $email_assunto = "Envio Teste do Formulário de Contato | Cristiane Faria"; // Este será o assunto da mensagem
        $email_conteudo = "FORMULÁRIO DE CONTATO\n"
            . "<br><b>De:</b> " . $nome
            . "<br><b>Email:</b> " . $email
            . "<br><b>Telefone:</b> " . $telefone
            . "<br><b>Assunto:</b> " . $assunto
            . "<br><b>Mensagem:</b> " . $mensagem
            . "<br><br>"
            . "<hr>"
            . "<br>Mensagem enviada do formulário de contato da demonstração de formulário de contato com php.";

        //encapsula os dados do cabeçalho do email
        $email_cabecalho = implode("\n", array("From: $email_remetente", "Reply-To: $email_recebidoDe", "Return-Path: $email_remetente", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));
        
        //utiliza função nativa do php mail para o envio
        //valida se o email foi enviado
        if (mail($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_cabecalho)) {
            
            //mostra mensagem de envio com sucesso
            $msg = '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Mensagem enviada com sucesso!</strong> 
            </div>';
        } else {

            //mostra mensagem de erro ao enviar
            $msg = '<div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Erro ao enviar mensagem, tente novamente! </strong> 
            </div>';
        }
        
    } else {
        
        //mostra mensagem de erro caso algum dos campos esteja vazio
        $msg = '<div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Preencha todos os campos!! </strong> 
            </div>';
    }
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
    <header>
        <nav>
        <div class="logo">
            <a href=""><img src="../img/logoeconnect.png" alt=""></a>
        </div>

        <!--<div class="menu" class="menu">
            <a href="index.php">Home</a>
            <a href="indexiphone.php">Apple</a>
            <a href="indexxaiomi.php">Xiaomi</a>
            <a href="indexmotorola.php">Motorola</a>
            <a href="indexsamsung.php">Samsung</a>
        </div>
        <div class="navbar">
            <div class="hamburguer" id="hamburger">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div> -->
    </nav>
    </header>

    
    <div id="section1">
        <div class="content">
            <h2 class="title">ECONNECT</h2>
            <p class="description">"Conectando tecnologia e Sustentabilidade"</p>
            <button class="cta-button"><a href="#section2">Saiba Mais</a></button>
       </div>
    </div>
    
    <div id="section2">
        <div id="conheca">
    <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #215934; /* 215934 */
      color: #fff;
    }
    .header {
      background-color: #008000; /* Cor verde escura */
      padding: 20px;
      text-align: center;
      padding-top: 5%;
    }
    .content {
      text-align: center;
      padding: 30px;
    }
    .button {
      background-color: #808080; /* Cinza */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 12px;
    }
    .circle-container {
      display: flex;
      justify-content: space-around;
      align-items: flex-end;
    }
    .circle {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin: 20px;
      position: relative;
      text-align: center;
    }
    .circle h3, .circle p {
      margin: 0;
      padding: 0;
    }
    .circle h3 {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 16px;
      color: white;
    }
    .circle p {
      margin-top: 100px; /* Distância entre o círculo e o texto */
      font-size: 14px;
      color: white;
    }
    .green {
      background-color: #ABE56B; /* Verde */
    }
    .brown {
      background-color: #8B4513; /* Marrom */
    }
    .blue {
      background-color: #007bff; /* Azul */
    }
    .white {
      background-color: #ffffff; /* Branco */
      color: #000;
    }
  </style>


<div class="header">
  <h1>Na junção da inovação e respeito ao meio ambiente, nossa iniciativa de coleta de eletrônicos ecoa alto, trazendo consigo a promessa de um futuro mais sustentável</h1>
  <button class="cta-button"><a href="#section3">Conheça mais</a></button>
</div>

<div class="content">
  <h2>O que descartar?</h2>
  <div class="circle-container">
    <div class="circle green">
      <h3>LINHA VERDE</h3>
      <p>Computadores, tablets, notebooks, celulares, impressoras, monitores, fones de ouvido, entre outros.</p>
    </div>
    <div class="circle brown">
      <h3>LINHA MARROM</h3>
      <p>Aparelhos de som, TV, equipamentos de DVD/VHS, televisores de tubo, plasma, filmadores, etc.</p>
    </div>
    <div class="circle blue">
      <h3>LINHA AZUL</h3>
      <p>Torradeiras, batedeiras, aspiradores de pó, ventiladores, mixers, secadores de cabelo, ferramentas elétricas, calculadoras, rádios, etc.</p>
    </div>
    <div class="circle white">
      <h3>LINHA BRANCA</h3>
      <p>Geladeiras, freezers, máquinas de lavar, fogões, ar condicionados, microondas, etc.</p>
    </div>
  </div>
</div>
<div id="section3">
        <div class="content">
            <h5 class="pq">Porque descartar corretamente?</h5>
            <p class="descricao">Conheça nossos programas de
                 recompensas para usuários que descartam eletrônicos regularmente</p>
            <button class="cta-button"><a href="#section4">Mais Detalhes</a></button>
        </div>
    <div id="container">
        <div class="faleconosco">
            <form class="form-horizontal" action="index.php#formulario" method="post" role="form" data-toggle="validator">
                <h1>Formulário de Contato</h1>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nome*:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nome" id="nome" value="" placeholder="seu nome" required >
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Email*:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="email" value="" placeholder="exemplo@dominio.com" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Telefone*:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="telefone" id="telefone" placeholder="(00) 00000-0000" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Assunto*:</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="assunto" required>
                            <option value="" selected="selected" disabled="disabled"> -- Escolha uma opção --</option>
                            <option value="contato">Contato</option>
                            <option value="vendas">Vendas</option>
                            <option value="financeiro">Financerio</option>
                            <option value="informacoes">Informações</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Mensagem*:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="exampleTextarea" rows="6" 
                                  id="mensagem" name="mensagem" placeholder="sua mensagem" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 text-right">
                        <input class = "btn btn-primary" id="submit" name="btnSend" type="submit" value="ENVIAR">
                        <a name="formulario"></a>
                        <div class="mensagem-alerta"><?php echo $msg ?></div>
                    </div>
                </div>
                <a href="#section1">aperta</a>
            </form>
        </div>
    </div>
    <footer>
        <p>Meu Rodapé</p>
    </footer>

    <script>
        function toggleMenu() {
            var menu = document.querySelector( '.menu' );
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