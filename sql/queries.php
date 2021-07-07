<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/buddylamp/sql/conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/buddylamp/classes/pergunta.php';

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
