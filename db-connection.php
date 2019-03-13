<?php

/**
 * 
 * @return Object 
 */
function openConnection() {

  // Set hostname, username, password and DB name.
  $Conetion = @mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) 
    or die(mysqli_connect_error());
  
  // Set charset.
  mysqli_set_charset($Conetion, DB_CHARSET) 
    or die(mysqli_error($Conetion));

  return $Conetion;
}

/**
 * 
 * @param Object
 */
function closeConnection($Conetion) {
  mysqli_close($Conetion) 
    or die(mysqli_error($Conetion));
}

/**
 * 
 * @param String||Array
 */
function escapeFromSQLInjection($dados) {
  $Conetion = openConnection();


  if(!is_array($dados)){
    // @param String
    $dados = mysqli_real_escape_string($Conetion, $dados);
    
  } else {
    // @param Array
    $arr = $dados;

    foreach ($arr as $key => $value) {
      $key = mysqli_real_escape_string($Conetion, $key);
      $value = mysqli_real_escape_string($Conetion, $value);

      $dados[$key] = $value;
    }
  }
  

  closeConnection($Conetion);
  return $dados;
}
