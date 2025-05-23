<?php
// Dados do banco de dados
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "checkout_db";

// Conecta ao banco
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Captura os dados do formulário
$numero_cartao = $_POST['numero_cartao'];
$nome_titular = $_POST['nome_titular'];
$validade = $_POST['validade'];
$cvv = $_POST['cvv'];
$tipo_cartao = $_POST['tipo_cartao'];
$cupom = $_POST['cupom'] ?? '';

// Prepara e executa a inserção no banco
$stmt = $conn->prepare("INSERT INTO pagamentos (numero_cartao, nome_titular, validade, cvv, tipo_cartao, cupom) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $numero_cartao, $nome_titular, $validade, $cvv, $tipo_cartao, $cupom);

if ($stmt->execute()) {
    echo "Pagamento salvo com sucesso!";
} else {
    echo "Erro ao salvar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>