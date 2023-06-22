<?php

require_once '/Conexao/Conexao.php';

class DocumentosDAO {

    public $pdo = null;

    public function Pesquisar() {

        $pdo = Conexao::getInstance();
        $sql = "select * from documentos;";

        $execucao = $pdo->prepare($sql);
        $execucao->execute();
        $pesquisa = $execucao -> fetchALL(PDO::FETCH_ASSOC);
        return $pesquisa;
    }

    public function PesquisarUmRegistro(DocumentosDTO $DocumentosDTO) {

        $pdo = Conexao::getInstance();
        $sql = "select * from documentos where idDocumentos = ?";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $DocumentosDTO->getIdDocumentos());
        $execucao->execute();
        $pesquisa = $execucao->fetch(PDO::FETCH_ASSOC);

        return $pesquisa;
    }

    public function Gravar(DocumentosDTO $DocumentosDTO) {
        $pdo = Conexao::getInstance();
        $sql = "insert into documentos (idConsulta) values (?);";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $DocumentosDTO->getIdConsulta());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Apagar(DocumentosDTO $DocumentosDTO) {
        $pdo = Conexao::getInstance();
        $sql = "delete from documentos where idDocumentos = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $DocumentosDTO->getIdDocumentos());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Alterar(DocumentosDTO $DocumentosDTO) {
        $pdo = Conexao::getInstance();
        $sql = "updade from documentos set idCosulta=? where idDocumentos=?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $DocumentosDTO->getIdConsulta());
        $execucao->bindValue(2, $DocumentosDTO->getIdDocumentos());

        $resultado = $execucao->execute();
        return $resultado;
    }

//fim
}
