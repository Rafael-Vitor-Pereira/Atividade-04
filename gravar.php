<?php

require_once('dao.usuario.php');

$usuario = new Usuario();

$nome = $_POST['nome'];
$telefone = $_POST['tel'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];

$usuario->setNome($nome);
$usuario->setCpf($cpf);
$usuario->setTelefone($telefone);
$usuario->setEmail($email);

$dao = DaoUsuario::getInstance()->Inserir($usuario);

echo "Cadastro realizado com sucesso!";

header('Location: index.php');
