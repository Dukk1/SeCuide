<?php

require_once "Conexao/Conexao.php";

class UsuarioDAO {

    public $pdo = null;

    public function Pesquisar() {
        $pdo = Conexao::getInstance();
        $sql = "select * from usuario;";

        $execucao = $pdo->prepare($sql);
        $execucao->execute();
        $pesquisa = $execucao ->fetchALL(PDO::FETCH_ASSOC);
        return $pesquisa;
    }

    public function PesquisarUmRegistro(UsuarioDTO $UsuarioDTO) {

        $pdo = Conexao::getInstance();
        $sql = "select * from usuario where idUsuario = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $UsuarioDTO->getIdUsuario());
        $execucao->execute();
        $pesquisa = $execucao->fetch(PDO::FETCH_ASSOC);
        return $pesquisa;
    }

    public function FazerLogin(UsuarioDTO $UsuarioDTO) {

        $pdo = Conexao::getInstance();
        $sql = "select * from usuario where login = :log AND senha = :pwd;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(':log', $UsuarioDTO->getLogin());
        $execucao->bindValue(':pwd', $UsuarioDTO->getSenha());
        $execucao->execute();
        $fetchUser = $execucao->fetch(PDO::FETCH_ASSOC);

        return $fetchUser;
    }
    
    
    public function Gravar(UsuarioDTO $UsuarioDTO) {
        $pdo = Conexao::getInstance();
        $sql = "insert into usuario (nome,email,login,senha,idPerfil) values(?,?,?,?,?);";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $UsuarioDTO->getNome());
        $execucao->bindValue(2, $UsuarioDTO->getEmail());
        $execucao->bindValue(3, $UsuarioDTO->getLogin());
        $execucao->bindValue(4, $UsuarioDTO->getSenha());
        $execucao->bindValue(5, $UsuarioDTO->getIdPerfil());

        $resultado = $execucao->execute();
        return $resultado;
    }
    
    public function Apagar(UsuarioDTO $UsuarioDTO) {
        $pdo = Conexao::getInstance();
        $sql = "delete from usuario where idUsuario = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $UsuarioDTO->getIdPerfil());

        $resultado = $execucao->execute();
        return $resultado;
    }
    
    public function Alterar(UsuarioDTO $UsuarioDTO) {
        $pdo = Conexao::getInstance();
        $sql = "updade from usuario set nome=?,email=?,login=?,senha=?,idPerfil=? where idUsuario=?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $UsuarioDTO->getNome());
        $execucao->bindValue(2, $UsuarioDTO->getEmail());
        $execucao->bindValue(3, $UsuarioDTO->getLogin());
        $execucao->bindValue(4, $UsuarioDTO->getSenha());
        $execucao->bindValue(5, $UsuarioDTO->getIdPerfil());
        $execucao->bindValue(6, $UsuarioDTO->getIdPerfil());

        $resultado = $execucao->execute();
        return $resultado;
    }
    //fim
}
