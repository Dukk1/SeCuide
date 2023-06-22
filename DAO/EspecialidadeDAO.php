<?php

require_once '/Conexao/Conexao.php';

class EspecialidadeDAO {

    public $pdo = null;

    public function Pesquisar() {

        $pdo = Conexao::getInstance();
        $sql = "select * from especialidade;";

        $execucao = $pdo->prepare($sql);
        $execucao->execute();
        $pesquisa = $execucao -> fetchALL(PDO::FETCH_ASSOC);
        return $pesquisa;
    }

    public function PesquisarUmRegistro(EspecialidadeDTO $EspecialidadeDTO) {

        $pdo = Conexao::getInstance();
        $sql = "select * from especialidade where idEspecialidade = ?";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $EspecialidadeDTO->getIdEspecialidade());
        $execucao->execute();
        $pesquisa = $execucao->fetch(PDO::FETCH_ASSOC);
    }

    public function Gravar(EspecialidadeDTO $EspecialidadeDTO) {
        $pdo = Conexao::getInstance();
        $sql = "insert into especialidade (especialidade) values(?);";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $EspecialidadeDTO->getEspecialidade());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Apagar(EspecialidadeDTO $EspecialidadeDTO) {
        $pdo = Conexao::getInstance();
        $sql = "delete from especialidade where idEspecialidade = ?";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $EspecialidadeDTO->getIdEspecialidade());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Alterar(EspecialidadeDTO $EspecialidadeDTO) {
        $pdo = Conexao::getInstance();
        $sql = "updade from especialidade set especialidade=? where idEspecialidade=?";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $EspecialidadeDTO->getEspecialidade());
        $execucao->bindValue(2, $EspecialidadeDTO->getIdEspecialidade());

        $resultado = $execucao->execute();
        return $resultado;
    }

//fim
}
