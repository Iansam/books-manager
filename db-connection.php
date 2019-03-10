<?php

/**
 * 
 * Abre conexão com o banco de dados.
 * 
 */
function openConnection() {

  // Carrega as configurações do banco de dados que está no arquivo de configuração 'db-config' e abra a coneção.
  $link = @mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die(mysqli_connect_error());
  
  // Configura o charset do banco de dados.
  mysqli_set_charset($link, DB_CHARSET) or die(mysqli_error($link));
  
  return $link;
}

/**
 * 
 * Fecha conexão com o banco de dados.
 * 
 */
function closeConnection($link) {
  mysqli_close($link) or die(mysqli_error($link));
}

/**
 * 
 * Proteje o banco de dados contra SQL Injection.
 * 
 */
function escapeFromSQLInjection($dados) {
  
  // Abre conexão com o banco de dados
  $link = openConnection();

  if(!is_array($dados)){
    // Se os dados não forem um array eles são tratados aqui dentro desse desse if.
    $dados = mysqli_real_escape_string($link, $dados);
    
  } else {
  
    // Se os dados vieram em um array eles dever ser tratados de forma diferente pela função.
    $arr = $dados;

    foreach ($arr as $key => $value) {
      $key = mysqli_real_escape_string($link, $key);
      $value = mysqli_real_escape_string($link, $value);

      $dados[$key] = $value;
    }
  }
  // Fecha conexão com o banco de dados
  closeConnection($link);
  return $dados;
}
