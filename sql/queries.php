<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/buddy-lamp/sql/conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/buddy-lamp/classes/pergunta.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/buddy-lamp/classes/usuario.php';

// Pesquisa de pergunta pelo conteudo, que retorna array de perguntas
function get_perguntas($q)
{
    require 'conexao.php';
    if (empty($q)) {
        return null;
    }

    $query = "SELECT * FROM pergunta WHERE conteudo LIKE '%{$q}%'";
    $result = $connection->query($query);

    if ($result->num_rows < 1) {
        return null;
    }

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $conteudo = $row['conteudo'];
        $id_categoria = $row['id_categoria'];
        $id_usuario = $row['id_usuario'];

        $perguntas[$id] = new Pergunta($id, $conteudo, $id_categoria, $id_usuario);
    }

    return $perguntas;
}

// Funçao que cadastra um novo usuário no banco de dados
function cadastrar_usuario($nome, $email, $senha)
{
    require 'conexao.php';
    $DEFAULT_REPUTACAO = 0;

    // Verifica se o email já foi utilizado
    $query = "SELECT email FROM usuario WHERE email = ?";
    $statement = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($statement, $query)) {
        return 'sqlerror';
    }

    mysqli_stmt_bind_param($statement, "s", $email);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    $resultCheck = mysqli_stmt_num_rows($statement);

    if ($resultCheck > 0) {
        return 'emailtaken';
    }

    // Insere o usuário
    $query = "INSERT INTO usuario (nome, email, reputacao, senha) VALUES(?, ?, ?, ?)";
    $statement = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($statement, $query)) {
        return 'sqlerror';
    }

    // Criptografa a senha do usuário
    $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($statement, "ssss", $nome, $email, $DEFAULT_REPUTACAO, $hashedPassword);

    mysqli_stmt_execute($statement);
    return 'sucess';
}
