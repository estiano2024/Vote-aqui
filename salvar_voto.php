<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "sistema_votacao";

// Conectar ao banco de dados
$conn = new mysqli($servidor, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Receber os dados do voto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = intval($_POST['numero']);

    // Inserir no banco de dados
    $sql = "INSERT INTO votos (numero_voto) VALUES ($numero)";
    if ($conn->query($sql) === TRUE) {
        echo "Voto registrado com sucesso!";
    } else {
        echo "Erro ao registrar o voto: " . $conn->error;
    }
}

$conn->close();
?>
