<?php
require_once 'conexao.php';
$c = new connection("edicao", "localhost", "root", "");
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
        <h1>Atualizar usuário</h1>
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

        <?php
          $dados = $c->buscarDados();
          if(count($dados) > 0)
          {
            for ($i=0; $i < count($dados) ; $i++) 
            {
              echo "<tr>";
              foreach ($dados[$i] as $key => $value)
              {
                if($key != "id")
                {
                  echo "<td>" . $value . "</td>";
                }
              }
              ?>
              <td>
              <div id="botoes">
              <a class="btn btn-primary" href="edit.php?id_up=<?php echo $dados[$i]['id'];?>" id="edit">Editar</a>
              <a class="btn btn-primary" href="index.php?id=<?php echo $dados[$i]['id'];?>" id="edit">Delete</a>
              </div>
              </td>
              <?php
              echo "</tr>";
            }
          }
          else 
          {
            echo 'Não há pessoas cadastradas';
          }
        ?>
          </tbody>
        </table>
        <a class="btn btn-primary" href="cadastrar.php" id="edit">Cadastrar novo</a>
        
    </main>
    
    <?php
      if(isset($_GET['id']))
      {
        $id_dados = addslashes($_GET['id']);
        $c->excluirDados($id_dados);
        header("location: index.php"); 
      }
    ?>
    
























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>