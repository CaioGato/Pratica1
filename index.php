<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $conn = new mysqli('localhost', 'root', '', 'GerenciamentoChamados');

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO Clientes (Nome, Email, Telefone) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $nome, $email, $telefone);

    if ($stmt->execute()) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }

    $stmt->close();
    $conn->close();
}
?>
