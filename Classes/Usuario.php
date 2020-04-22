<?php

namespace Classes;

require 'Conexao.php';
use Classes\Conexao;

class Usuario {
    
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }
    
    //Listando...
    public function listar() {        
        $sql = "select * from usuario;";       
        $q = $this->conexao->prepare($sql);
        $q->execute();
        return $q;
        
    }
    //INSERIR
    public function inserir($nome, $email, $login, $senha) {
        //Add comando BD: INSERT
        $sql = "insert into usuario (nome, email, login, senha) values (?, ?, ?, ?);";
        $q = $this->conexao->prepare($sql);
        
        $q->bindParam(1, $nome);
        $q->bindParam(2, $email);
        $q->bindParam(3, $login);
        $q->bindParam(4, md5($senha));      
        $q->execute();
        
        return $q;
        
    }
    //EDITAR
    public function editar($codigo, $nome, $email, $login ) {
        //Comando banco de dados: UPDATE
        $sql = "update usuario set nome = ?, email = ?, login = ? where codigo = :codigo;";
        $q = $this->conexao->prepare($sql);

        $q->bindParam(1, $nome);
        $q->bindParam(2, $email);   
        $q->bindParam(3, $login);
        $q->bindParam(4, $codigo);
        
        $q->execute();
        
        return $q;
        
    }
    public function listaEdicao($codigo){
        $sql = " select * from usuario where codigo = :codigo;";
        $q = $this->conexao->prepare($sql);     
        $q->bindParam(1, $codigo);      
        $q->execute();
        return $q;
    }
    //EXCLUIR
    public function excluir($codigo) {
        //Comando banco de dados: DROP/DELETE
        $sql = "delete from usuario where codigo = :codigo;";
        $q = $this->conexao->prepare($sql);
        
        $q->bindParam(1, $codigo);
        $q->execute();

    }
}

?>