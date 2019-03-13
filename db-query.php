<?php

/**
 * 
 * Executa query
 * @param String
 * @return Object
 */
function executeQuery($query) {
  $link   = openConnection();
  

  $result = @mysqli_query($link, $query) 
    or die(mysqli_error($link));


  closeConnection($link);
  return $result;
}

/**
 * UPDATE
 * @param String
 * @param Array
 * @param String
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
 * READ
 * @param String
 * @return Array
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
 * CREATE
 * @param String
 * @param Array
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
 * DELETE
 * @param String
 * @param String
 */
function delete($tableName, $where = null) {
  // Prefixo da tabela.
  $tableName  = DB_PREFIX.'_'.$tableName;

  $where      = ($where) ? " WHERE {$where}" : null;

  $query      = "DELETE FROM {$tableName}{$where}";

  var_dump($query);
  return executeQuery($query);
}
