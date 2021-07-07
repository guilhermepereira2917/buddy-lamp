<?php

class Pergunta
{
    public $id;
    public $conteudo;
    public $id_categoria;
    public $id_usuario;

    public function __construct($id, $conteudo, $id_categoria, $id_usuario)
    {
        $this->id = $id;
        $this->conteudo = $conteudo;
        $this->id_categoria = $id_categoria;
        $this->id_usuario = $id_usuario;
    }

    public function to_string()
    {
        return "id: " . $this->id .
            "<br> conteudo: " . $this->conteudo .
            "<br> id_categoria: " . $this->id_categoria .
            "<br> id_usuario: " . $this->id_usuario;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_conteudo()
    {
        return $this->conteudo;
    }

    public function get_id_categoria()
    {
        return $this->id_categoria;
    }

    public function get_id_usuario()
    {
        return $this->id_usuario;
    }
}
