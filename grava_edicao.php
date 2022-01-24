<?php

require_once('class/dao.usuario.php');

$usuario = new Usuario();

$id = $_POST['id'];
$usuario->setId($id);

if (!empty($_POST['nome'])) :
  $nome = $_POST['nome'];
else :
  $nome = $_POST['nome_antigo'];
endif;

if (!empty($_POST['cpf'])) :
  $cpf = $_POST['cpf'];
else :
  $cpf = $_POST['cpf_antigo'];
endif;

if (!empty($_POST['tel'])) :
  $telefone = $_POST['tel'];
else :
  $telefone = $_POST['tel_antigo'];
endif;

if (!empty($_POST['email'])) :
  $email = $_POST['email'];
else :
  $email = $_POST['email_antigo'];
endif;

$usuario->setNome($nome);
$usuario->setEmail($email);
$usuario->setCpf($cpf);
$usuario->setTelefone($telefone);

$dao = DaoUsuario::getInstance()->Editar($usuario);

echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Fechar'><span aria-hidden='true'>&times;</span></button>Edição realizada com sucesso!</div>";
