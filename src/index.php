<!DOCTYPE html>
<html>

<head>
    <title>Exemplo 1 - Acesso ao SGBD MySQL
    </title>
    <meta charset="utf-8">
</head>

<body>
    <h3>Acesso ao SGBD MySQL</h3>
    <br>
    <?php
    $versaoPHP = "7.0";
    $host = "mysql"; // Local da base de dados MySQL
    $user = "root"; // Login do MySQL
    $pass = "123456"; // Senha para conectar com o MySQL
    $db = "cadastro"; // Nome da Database
    echo "Estabelecendo a conexão com o MySQL...";
    echo "<br>";
    echo "Versão do PHP: " . $versaoPHP;
    echo "<br>";
    if ($versaoPHP == "7.0") {
        $con = mysqli_connect($host, $user, $pass, $db) or
            die(mysqli_connect_error());
        $query = "SELECT * FROM clientes";
        $resultado = mysqli_query($con, $query) or die(mysqli_error($con));
        // Caso tenha retornado algo, exibe uma mensagem
        if (mysqli_num_rows($resultado) > 0) {
            echo 'Encontrado';
        } else {
            echo 'Não-Encontrado';
        }
        echo "<br><br>";
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<b>Código:</b> " . $row["codigo"] . " ";
                echo "<b>Nome:</b> " . $row["nome"] . " ";
                echo "<b>Endereco:</b> " . $row["endereco"] . " ";
                echo "<b>RG:</b> " . $row["rg"] . " ";
                echo "<b>Telefone:</b> " . $row["telefone"] . " ";
                echo "<b>E-Mail:</b> " . $row["email"] . " ";
                echo "<br>";
            }
        } else {
            echo "0 results";
        }
        mysqli_close($con); // Fecha a conexão
    } else { // Versões PHP < 5.5
        $con = mysql_connect($host, $user, $pass);
        $banco = mysql_select_db($db, $con);
        $query = "SELECT * FROM clientes";
        $resultado = mysql_query($query);
        echo '<table>';
        echo '<tr>';
        echo '<th>Código</th>';
        echo '<th>Nome</th>';
        echo '<th>Endereço</th>';
        echo '<th>RG</th>';
        echo '<th>Telefone</th>';
        echo '<th>E-mail</th>';
        echo '</tr>';
        // Armazena os dados da consulta em um array associativo
        while ($registro = mysql_fetch_assoc($resultado)) {
            echo '<tr>';
            echo '<td>' . $registro["codigo"] . '</td>';
            echo '<td>' . $registro["nome"] . '</td>';
            echo '<td>' . $registro["endereco"] . '</td>';
            echo '<td>' . $registro["rg"] . '</td>';
            echo '<td>' . $registro["telefone"] . '</td>';
            echo '<td>' . $registro["email"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>
</body>

</html>