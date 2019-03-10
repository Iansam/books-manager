<?php

/**
 * 
 * Altera registros
 * 
 */
function update($tableName, array $data, $where = null) {
  foreach($data as $key => $value) {
    $fields[] = "{$key} = '{$value}'";
  }

  $fields = implode(', ', $fields);

  $tableName  = DB_PREFIX.'_'.$tableName;
  $where      = ($where) ? " WHERE {$where}" : null;

  $query = "UPDATE {$tableName} SET {$fields}{$where}";
  return executeQuery($query);
}

/**
 * 
 * Ler Registros
 * TODO: documentar a API desse método descrevendo o que ele espera como parâmetro e o que ele retorna.
 * @param: $table: nome da tabela.
 * @return: dados lidos da tabela.
 */
function select($tableName, $params = null, $fields = '*') {
  $tableName  = DB_PREFIX.'_'.$tableName;
  $params = ($params) ? " {$params}" : null;

  $query  = "SELECT {$fields} FROM {$tableName}{$params}";
  $result = executeQuery($query);

  if(!mysqli_num_rows($result))
    return false;
  else {
    while($res = mysqli_fetch_assoc($result)) {
      $data[] = $res;
    }

    return $data;
  }
}

/**
 * 
 * Grava registros
 * 
 */
function insertInto($tableName, array $data) {
  $tableName  = DB_PREFIX.'_'.$tableName;
  $data       = escapeFromSQLInjection($data);

  $fields     = implode(', ', array_keys($data));
  $values     = "'".implode("', '", $data)."'";

  $query      = "INSERT INTO {$tableName} ( {$fields} ) VALUES ( {$values} )";

  return executeQuery($query);
}

/**
 * 
 * Executa queries
 * 
 */
function executeQuery($query) {
  $link   = openConnection();
  $result = @mysqli_query($link, $query) or die(mysqli_error($link));

  closeConnection($link);
  return $result;
}