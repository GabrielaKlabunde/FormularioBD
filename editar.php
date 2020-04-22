<?php

use Classes\Usuario;
require './Classes/Usuario.php';
//Post e get
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$parametro = filter_input_array(INPUT_GET, FILTER_DEFAULT);

$usu = new Usuario();
$usuarioAtual = $usu->listaEdicao($parametro['codigo']);

if (isset($parametro['codigo'])) {
    $usu->editar($parametro['codigo'], $data['nome'], $data['email'], $data['login']);
}

if (isset($data['salvar'])) {
    header("Location: index.php"); //redirecionando
}
?>
<html>
    <head>
        <title>Editar usuário</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">    
        <link href="cssStyle/style.css" rel="stylesheet" type="text/css">
              
    </head>
    <body>
        <div class="container">
            <br><br>
            <h2>Alterando dados:</h2>      
            <form action="editar.php?codigo=<?php echo $parametro['codigo']; ?>" method="post">

                <?php foreach ($usuarioAtual as $index => $usu) { ?>

                    <div class="text-center"> 
                        <label for="nome">Nome</label>
                        <input value="<?php echo $usu['nome'] ?>" type="text" required name="nome" id="nome" />      
                        <br/><br/>

                        <label for="email">E-mail</label>
                        <input value="<?php echo $usu['email']; ?>" type="email" required name="email" id="email"/>
                        <br/><br/>

                        <label for="login">Login</label>
                        <input value="<?php echo $usu['login']; ?>"type="text" required name="login" id="login" />
                        <br/><br/>

                        <button id="salvar" name="salvar" type="submit">Salvar alterações</button>
                        <br><br>
                    </div>
                <?php } ?>
            </form> 
        </div>      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" text="text/javascript"></script>
        <script src="js/bootstrap.bundle.js" text="text/javascript"></script>
    </body>
</html>

