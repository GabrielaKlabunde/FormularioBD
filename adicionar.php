<?php

use Classes\Usuario;
require './Classes/Usuario.php';
//Precisa ser GET
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($data ['salvar'])) {
    $usu = new Usuario();
    $usu->inserir($data ['nome'], $data ['email'], $data ['login'], $data ['senha']);
    header("Location: index.php"); //redirecionando
}
?>
<html>
    <head>
        <title>Adicionar usuário</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">    
        <link href="cssStyle/style.css" rel="stylesheet" type="text/css">
        
        <?php if (isset($data ['salvar'])) { ?>
            <script>
                alert("Usuário cadastrado com sucesso!");
            </script>
        <?php } ?>

    </head>
    <body>
        <div>          
            <form action="adicionar.php" method="post">
                <br><br>
                
                <h2>Formulário:</h2>
                <div class="text-center">
                <label for="nome">Nome</label>
                <input type="text" required name="nome" id="nome" placeholder="Insira seu nome completo"/>
                <br/><br/>

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="E-mail" />
                <br/><br/>

                <label for="login">Login</label>
                <input type="text" required name="login" id="login" placeholder="Nome de usuário" />
                <br/><br/>

                <label for="senha">Senha</label>
                <input type="password" required name="senha" id="senha" placeholder="Senha" />
                <br/><br/>

                <label for="senha-confirma">Confirme:</label>
                <input type="password" name="senha-confirma" id="senha-confirma" placeholder="Confirmar senha" />
                <br/><br/>

                <button id="salvar" name="salvar" type="submit">Salvar</button>
                <br><br>
            
                </div>
            </form> 
            
        </div>
    </body>
</html>
