<html>

<head>
    <title>Exemplo 2 - Acesso ao SGBD MySQL
    </title>
    <meta charset="utf-8">
</head>

<body>
    <h2>Acesso ao SGBD MySQL</h2>
    <h3>Exibição dos dados em Tabela</h3>
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
        echo "<br><br>";
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table>";
            echo
            "<tr><th>Código</th><th>Nome</th><th>Endereço</th><th>RG</th><th>Telefone</
th><th>E-Mail</th></tr>";
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>";
                echo $row["codigo"];
                echo "</td>";
                echo "<td>";
                echo $row["nome"];
                echo "</td>";
                echo "<td>";
                echo $row["endereco"];
                echo "</td>";
                echo "<td>";
                echo $row["rg"];
                echo "</td>";
                echo "<td>";
                echo $row["telefone"];
                echo "</td>";
                echo "<td>";
                echo $row["email"];
                echo "</td>";
                echo "</tr>";
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