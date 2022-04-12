<?php
  include 'conexao.php';
  $sql = $pdo->query('SELECT * FROM log');
  $dados = $sql->fetchAll();
  print_r($dados);
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Teste</title>
  </head>
  <body>
    <header>
        <h1>Atualizar uzuário</h1>
    </header>

    <main class="container">
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Rua</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Jonas</td>
      <td>Rua da graça do senhor</td>
      <td><button type="submit" class="btn btn-primary" id="btnedit"><a href="edit.php" id="edit">Editar</a></button>
          <button type="submit" class="btn btn-primary" id="btnedit">Delete</button>
      </td>
    </tr>
  </tbody>
</table>

    </main>

    
























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>