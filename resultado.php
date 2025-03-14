<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "sistema_votacao";

// Conectar ao banco
$conn = new mysqli($servidor, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Buscar todos os votos
//$sql = "SELECT numero_voto, 
//               quantidade, 
//        FROM   votos 
//        ORDER BY quantidade DESC";
$sql = "SELECT   numero_voto, 
                 count(numero_voto) as quantidade 
        from     votos 
        group by numero_voto;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Resultados da Votação</h2><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>Chapa " . $row["numero_voto"] . ": " . $row["quantidade"] . " votos</li>";
    }
    echo "</ul>";
} else {
    echo "Nenhum voto registrado.";
}

$conn->close();
?>
