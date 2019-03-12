<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Gerenciador de biblioteca pessoal</title>
</head>
<body>
  <p>Teste</p>
  <div>
    
  </div>
  
  <?php

    
    require 'config.php';
    require 'db-connection.php';
    require 'db-query.php';

    /**
     * Testando a leitura da dados no banco.
     * 
     * TODO: documentar a API desse método descrevendo o que ele espera como parâmetro e o que ele retorna.
     * 
     * $books = select('books');
     * $books = select('books', "WHERE author = 'Lima Barreto'");
     * $books = select('books', "WHERE author = 'Ana Maria Gonçalves'");
     * $books = select('books', "WHERE author = 'Maria Firmina dos Reis'");
     * var_dump($books);
     */







    /*
    $book = array(
      'name' => 'Triste Fim de Policarpo Quaresma'
    );
    var_dump(update('books', $book, 'id = 5'));
    */


    
    
    
    //var_dump($books);

    /*
    $book = array(
      'name'  => 'Clara dos Anjos',
      'author' => 'Lima Barreto'
    );
    */

    /*
    $create = DBCreate('books', $book);

    var_dump($create);

    if($create)
      echo 'ok';
    else
      echo ':/';
    */

    //$query = "INSERT INTO livros ( nome, autor ) values ( 'Um Defeito de Cor', 'Ana Maria Gonçalves' )";
    //var_dump(DBExecute($query));

  ?>
</body>
</html>