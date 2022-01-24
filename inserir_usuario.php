<?php

require_once('class/dao.usuario.php');

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

echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Fechar'><span aria-hidden='true'>&times;</span></button>Usuário cadastrado com sucesso!</div>";

?>

<script>
  $(function() {
    $("#ajaxform")[0].reset
  });
</script>