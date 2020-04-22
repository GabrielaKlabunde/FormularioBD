<?php
use Classes\Usuario;
require './Classes/Usuario.php';

$usu = new Usuario();
$usuarios = $usu->listar();
?>

<html>
    <head>
        <title>Cadastro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">    
        <link href="cssStyle/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div>
            <br><br>
            <h2>Cadastre-se</h2>
            <div class="text-center">
                <a href="adicionar.php"><b>Cadastrar novo usuário</b></a>
            </div>
            <br><br>
            
            <table width="100%" border="1" cellspacing="0" cellpadding="3" id="playlistTable">
                
                <thead>
                    <tr>
                        <td><strong>Código</strong></td>
                        <td><strong>Nome</strong></td>
                        <td><strong>E-mail</strong></td>
                        <td><strong>Login</strong></td>
                        <td><strong>Opções</strong></td>
                    </tr>
                </thead>
                
                <tbody>
                    
                    <?php foreach ($usuarios as $index=>$usuario) { ?>
                    
                    <tr>
                        <td><?php echo $usuario ['codigo']; ?></td>
                        <td><?php echo $usuario ['nome']; ?></td>
                        <td><?php echo $usuario ['email']; ?></td>
                        <td><?php echo $usuario ['login']; ?></td>
                        <td>
                            <a href="editar.php?codigo=<?php echo $usuario ['codigo']; ?>">Editar</a>/
                            <a href="excluir.php?codigo=<?php echo $usuario ['codigo']; ?>">Excluir</a>
                        </td>
                    </tr>
                        
                    <?php } ?>
                    
                </tbody>
                
            </table>
            
        </div>
    </body>
</html>
