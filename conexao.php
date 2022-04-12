<?php
    $host = 'mysql:host=localhost;dbname=edicao';
    $user = 'root';
    $senha = '';

    try 
    {
        //conexão em uma variável
        $pdo = new PDO($host, $user, $senha);
        echo 'deu certo';
    } catch (PDOException $ex)
    {
        //mensagem de erro caso a conexão não dê certo
        die('DEU ERRADO!! ' . $ex->getMessage());
    }

