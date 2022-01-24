<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <script src="js/jquery.js"></script>
  <title>Cadastro Usuário</title>
</head>

<body>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php">Voltar para Página Anterior</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <header>
    <center>
      <h3>Cadastro de Usuário</h3>
    </center>
  </header>
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <form action="inserir_usuario.php" method="post" id="ajaxform">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control">
      </div>
      <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" class="form-control" onkeypress="mascara_cpf(this)">
      </div>
      <div class="form-group">
        <label for="tel">Telefone</label>
        <input type="tel" name="tel" id="tel" class="form-control" onkeypress="mascara_tel(this)">
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control">
      </div>
      <div class="col-md-2"></div>
      <div class="col-md-8 form-group">
        <button type="submit" class="btn btn-primary form-control" id="gravar">Gravar</button>
      </div>
      <div class="col-md-2"></div>
      <br>
      <br>
      <div id="loading">
        <img src="img/loading.gif" alt="carregando...">
      </div>
      <div id="mensagem"></div>
    </form>
  </div>
  <div class="col-md-4"></div>
  <script type="text/javascript">
    function mascara_tel(tel) {
      if (tel.value.length == 0)
        tel.value = '(' + tel.value;
      if (tel.value.length == 3)
        tel.value = tel.value + ') ';
      if (tel.value.length == 6)
        tel.value = tel.value + ' ';
      if (tel.value.length == 11)
        tel.value = tel.value + '-';
    }

    function mascara_cpf(cpf) {
      if (cpf.value.length == 3)
        cpf.value = cpf.value + '.';
      if (cpf.value.length == 7)
        cpf.value = cpf.value + '.';
      if (cpf.value.length == 11)
        cpf.value = cpf.value + '-';
    }

    $(function() {
      $("#gravar").click(function() {
        $("#ajaxform").submit(function(e) {
          $("#loading").css("visibility", "visible");

          var postData = $(this).serializeArray();
          var formURL = $(this).attr("action");

          $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function(data, textStatus, jqXHR) {
              $("#loading").css("visibility", "hidden");
              $("#mensagem").html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
              $("#loading").css("visibility", "hidden");
              var error = "Houve um erro na execução da sua requisição: " + textStatus + " - " + errorThrown + " ";
              $("#mensagem").html(error);
            }
          })

          e.preventDefault();
          e.unbind();
        })
      });
    });
  </script>
</body>

</html>