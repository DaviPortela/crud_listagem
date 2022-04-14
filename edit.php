<?php
require_once 'conexao.php';
$c = new connection("edicao", "localhost", "root", "");

if (isset($_GET['id_up']))
{
  $id_update = addslashes($_GET['id_up']);
  $res = $c->buscarDadosEspecificos($id_update);
}

if(isset($_POST['nome']))
{
  if(isset($_GET['id_up']) && !empty($_GET['id_up']))
  {
    $id_update = addslashes($_GET['id_up']);
    $nome = addslashes($_POST['nome']);
    $rua = addslashes($_POST['rua']);
    if(!empty($nome) && !empty($rua))
    {
      $c->atualizarDados($id_update, $nome, $rua);
      header("location: index.php");
    }
  }
}


?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Editar dados</title>
  </head>
  <body>
    <header>
        <h1>Editar dados</h1>      
    </header>
    <main class="container">
        <form method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Editar nome</label>
        <input type="text" class="form-control" name="nome" value="<?php if(isset($res)){echo $res['nome'];} ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Editar rua</label>
        <input type="text" class="form-control" name="rua"
        value="<?php if(isset($res)){echo $res['rua'];} ?>">
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>