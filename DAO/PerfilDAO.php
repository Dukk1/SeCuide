<?php

require_once '/Conexao/Conexao.php';

class PerfilDAO {

    public $pdo = null;

    public function Pesquisar() {

        $pdo = Conexao::getInstance();
        $sql = "select * from perfil;";

        $execucao = $pdo->prepare($sql);
        $execucao->execute();
        $pesquisa = $execucao -> fetchALL(PDO::FETCH_ASSOC);
        return $pesquisa;
    }

    public function PesquisarUmRegistro(PerfilDTO $PerfilDTO) {

        $pdo = Conexao::getInstance();
        $sql = "select * from perfil where idPerfil = ?";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $PerfilDTO->getIdPerfil());
        $execucao->execute();
        $pesquisa = $execucao->fetch(PDO::FETCH_ASSOC);
    }

    public function Gravar(PerfilDTO $PerfilDTO) {
        $pdo = Conexao::getInstance();
        $sql = "insert into perfil (descricao) values (?);";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $PerfilDTO->getDescricao());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Apagar(PerfilDTO $PerfilDTO) {
        $pdo = Conexao::getInstance();
        $sql = "delete from perfil where idPerfil = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $PerfilDTO->getIdPerfil());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Alterar(PerfilDTO $PerfilDTO) {
        $pdo = Conexao::getInstance();
        $sql = "updade from perfil set idDescricao=? where idPerfil=?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $PerfilDTO->getDescricao());
        $execucao->bindValue(2, $PerfilDTO->getIdPerfil());

        $resultado = $execucao->execute();
        return $resultado;
    }
//fim
}
