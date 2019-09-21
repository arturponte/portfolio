<?php

  $server = "localhost"; //servidor
  $bdschema = "mydb_artur"; //nome da base de dados
  $user = "root"; //
  $password = ""; //

  //fazer ligação
  $connection = mysqli_connect($server, $user, $password, $bdschema);

  //se existe algum erro, ele dá mensagem
  if(mysqli_connect_error()){
    echo "Error connecting to database...";
    exit;
  }

  //print_r($connection);







?>