<!DOCTYPE html>
<html>
<head>
    <title>Sobre Nós - Equipe</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Sobre Nós - Equipe</h1>

    <table>
        <tr>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Email</th>
        </tr>
        <?php
        // Array com informações sobre os membros da equipe
        $equipe = array(
            array("nome" => "João", "cargo" => "Desenvolvedor Web", "email" => "joao@example.com"),
            array("nome" => "Maria", "cargo" => "Designer Gráfico", "email" => "maria@example.com"),
            array("nome" => "Pedro", "cargo" => "Gerente de Vendas", "email" => "pedro@example.com"),
        );

        // Loop para exibir cada membro da equipe em uma linha da tabela
        foreach ($equipe as $membro) {
            echo "<tr>";
            echo "<td>" . $membro['nome'] . "</td>";
            echo "<td>" . $membro['cargo'] . "</td>";
            echo "<td>" . $membro['email'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>
