<?php 
use Classes\Usuario;
require './Classes/Usuario.php';
//Precisa ser GET
$data = filter_input_array(INPUT_GET, FILTER_DEFAULT);

 if (isset($data['codigo'])){
     $usu = new Usuario();
     $codigo = $data['codigo'];
     $usu->excluir($codigo); //excluindo usuário
     header("Location: index.php"); //redirecionando
 }
 ?>