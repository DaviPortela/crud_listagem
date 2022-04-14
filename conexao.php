<?php
class connection
{
    private $pdo;

    //conexão com o banco de dados orientada a objetos
    public function __construct($dbname, $host, $user, $pass)
    {
        try 
        {
            $this->pdo = new PDO('mysql:dbname=' . $dbname . ';host=' . $host,$user,$pass);
        }
        catch(PDOException $e)
        {
            echo 'Erro com banco de dados: ' . $e->getMessage();
            exit();
        }
        catch(Exception $e)
        {
            echo 'Erro genérico: ' . $e->getMessage();
            exit();
        }
    }

    //função que busca os dados no banco de dados
    public function buscarDados()
    {
        $res = array();
        $cmd = $this->pdo->query('SELECT * FROM log ORDER BY nome');
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    //função que exclui os dados no banco de dados
    public function excluirDados($id)
    {
        $cmd = $this->pdo->prepare("DELETE FROM log WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
    }

    //buscar dados de uma pessoa
    public function buscarDadosEspecificos($id)
    {
        $res = array();
        $cmd = $this->pdo->prepare("SELECT * FROM log WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function atualizarDados($id, $nome, $rua)
    {
        $cmd = $this->pdo->prepare("UPDATE log SET nome = :n, rua = :r WHERE id = :id");
        $cmd->bindValue(':n', $nome);
        $cmd->bindValue(':r', $rua);
        $cmd->bindValue(':id', $id);
        $cmd->execute();
    }

    public function cadastrarDados($nome, $rua)
    {
        //verificação de usuário ja cadastrado
        $cmd = $this->pdo->prepare("SELECT id FROM log WHERE nome = :n");
        $cmd->bindValue(":n", $nome );
        $cmd->execute();
        if($cmd->rowCount() > 0)
        {
            //se já existe nome igual no banco:
            return false;
        }
        else
        {
            $cmd = $this->pdo->prepare("INSERT INTO log (nome, rua) VALUES (:n, :r)");
            $cmd->bindValue(':n', $nome);
            $cmd->bindValue(':r', $rua);
            $cmd->execute();
            return true;
        }
    }

}
