<?php

require_once('class/dao.usuario.php');

$dao = DaoUsuario::getInstance()->Buscar();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="cadastrar.php">Cadastrar</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <center>
    <header>
      <h3>Lista de Cadastros</h3>
    </header>
  </center>
  <div class="container">
    <table class='table table-bordered table-striped'>
      <tr>
        <th class='cabecalho conteudo'>ID</th>
        <th class='cabecalho conteudo'>Nome</th>
        <th class='cabecalho conteudo'>Telefone</th>
        <th class='cabecalho conteudo'>E-mail</th>
        <th colspan="2" class='cabecalho conteudo'>Ações</th>
      </tr>
      <?php
      foreach ($dao as $registro) {
      ?>
        <tr id="linha<?php echo $registro->getId(); ?>">
          <td><?= $registro->getId(); ?></td>
          <td><?= $registro->getNome(); ?></td>
          <td><?= $registro->getTelefone(); ?></td>
          <td><?= $registro->getEmail(); ?></td>
          <td>
            <center><a href='editar.php?id=<?= $registro->getId(); ?>' class='badge badge-primary'>Editar</a></center>
          </td>
          <td>
            <center><a href='javascript:excluir(<?= $registro->getId(); ?>)' class='badge badge-danger'>Deletar</a></center>
          </td>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>

  <script>
    function excluir(idreg) {
      resp = confirm('Deseja realmente excluir esse registro?');
      if (resp) {

        var ID = idreg;

        $.post(
          "excluir.php", {
            id: ID
          },
          function(data, status) {
            var panel = "#linha" + ID;
            $(panel).remove();
            //alert("Data: " + data + "\nStatus: " + status);
          });

      } else {
        return false;
      }
    }
  </script>
</body>

</html>