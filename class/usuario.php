<?php

class Usuario
{

    private $id;
    private $nome;
    private $cpf;
    private $telefone;
    private $email;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($value)
    {
        $this->nome = strtoupper($value);
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($value)
    {
        $this->cpf = $value;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($value)
    {
        $this->telefone = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value)
    {
        $this->email = strtolower($value);
    }
}
