<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once "functions/functions.php";

    include_once "../database/config.php";

    $conn = new Database($hostname, $username, $password, $database);

    $nome = $_POST['nome'];
    $tag = $_POST['tag'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($nome) || empty($tag) || empty($email) || empty($senha)) {
        echo json_encode(['success' => false, 'message' => 'formInvalido']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'formEmail']);
        exit;
    }

    if (strlen($senha) < 8) {
        echo json_encode(['success' => false, 'message' => 'formSenha']);
        exit;
    }

    $senha = password_hash($senha, PASSWORD_BCRYPT);

    $criarUsuario = $conn->create($nome, $tag, $email, $senha);

    if ($criarUsuario) {
        echo json_encode(['success' => true, 'message' => 'formSucesso']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao realizar o cadastro.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Requisição indesejada.']);
}
