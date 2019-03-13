<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Gerenciador de biblioteca pessoal</title>
</head>
<body>
  <?php
    require 'config.php';
    require 'db-connection.php';
    require 'db-query.php';

    /**
     * Testando READ da dados no banco.
     * 
     * $books = select('books');
     * $books = select('books', "WHERE author = 'Lima Barreto'");
     * $books = select('books', "WHERE author = 'Ana Maria Gonçalves'");
     * $books = select('books', "WHERE author = 'Maria Firmina dos Reis'");
     * var_dump($books);
     */

    /**
     * $tableName = "books";
     * $data      = array(
     * 'name' => "Infância",
     * 'author' => "Graciliano Ramos"
     * );
     * 
     * $result = insertInto($tableName, $data);
     * 
     * var_dump($result);
     */ 

    /**
     * $tableName = "books";
     * $bookName  = "Infância";
     * 
     * delete($tableName, "name = 'Infância'");
     * $result    = delete($tableName, "name = 'Infância'");
     * var_dump($result);
     */
    
  ?>
</body>
</html>