<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/buddy-lamp/sql/queries.php';

$perguntas = get_perguntas($_GET['q']);
if (!$perguntas == null) {
    foreach ($perguntas as $pergunta) {
        echo $pergunta->to_string();
    }
}
