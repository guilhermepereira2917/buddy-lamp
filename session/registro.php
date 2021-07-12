<?php

if (!isset($_POST['botao-submit'])) {
    header('Location: ../registro.php');
    exit();
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senhaRepetida = $_POST['senha-repeat'];

if (empty($nome) || empty($email) || empty($senha) || empty($senhaRepetida)) {
    header("Location: ../registro.php?error=emptyfields&nome='{$nome}'&email='{$email}'");
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $password)) {
    header("Location: ../registro.php?error=invalidemailorpassword&nome='{$nome}'&email='{$email}'");
    exit();
}

if ($senha != $senhaRepetida) {
    header("Location: ../registro.php?error=passwordsnotmatch&nome='{$nome}'&email='{$email}'");
    exit();
}

// Instancia um novo usuário com id e reputacao iguais a 0
require_once $_SERVER['DOCUMENT_ROOT'] . '/buddy-lamp/classes/usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/buddy-lamp/sql/queries.php';
$erro = cadastrar_usuario($nome, $email, $senha);

if ($erro == 'sucess') {
    header('Location: ../login.php');
    exit();
} else {
    header("Location: ../registro.php?error='{$erro}'&nome='{$nome}'&email='{$email}'");
    exit();
}