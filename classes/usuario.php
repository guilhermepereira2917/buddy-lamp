<?php

class Usuario
{
    public $id;
    public $nome;
    public $email;
    public $reputacao;

    public function __construct($id, $nome, $email, $reputacao)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->reputacao = $reputacao;
    }

    public function to_string()
    {
        return "id: " . $this->id .
            "<br> nome: " . $this->nome .
            "<br> email: " . $this->email .
            "<br> reputação: " . $this->reputacao;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_nome()
    {
        return $this->nome;
    }

    public function get_email()
    {
        return $this->email;
    }

    public function get_reputacao()
    {
        return $this->reputacao;
    }

}
