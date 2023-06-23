<?php

require_once 'conexao/Conexao.php';

class FuncionarioDAO {

    public $pdo = null;

    public function Pesquisar() {

        $pdo = Conexao::getInstance();
        $sql = "select * from funcionario;";

        $execucao = $pdo->prepare($sql);
        $execucao->execute();
        $pesquisa = $execucao -> fetchALL(PDO::FETCH_ASSOC);
        return $pesquisa;
    }

    public function PesquisarByIDFuncionario($FuncionarioID) {

        $pdo = Conexao::getInstance();
        $sql = "select * from funcionario where idFuncionario = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $FuncionarioID);
        $execucao->execute();
        return $execucao->fetch(PDO::FETCH_ASSOC);
    }

    public function PesquisarByID($UserID) {

        $pdo = Conexao::getInstance();
        $sql = "select * from funcionario where idUsuario = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $UserID);
        $execucao->execute();
        return $execucao->fetch(PDO::FETCH_ASSOC);
    }

    public function PesquisarUmRegistro(FuncionarioDTO $FuncionarioDTO) {

        $pdo = Conexao::getInstance();
        $sql = "select * from funcionario where idFucionario = ?";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $FuncionarioDTO->getIdFuncionario());

        $execucao->execute();
        $pesquisa = $execucao->fetch(PDO::FETCH_ASSOC);
    }

    public function Gravar(FuncionarioDTO $FuncionarioDTO) {
        $pdo = Conexao::getInstance();
        $sql = "insert into funcionario (nome, pai, mae, dt_nasc, naturalidade, nacionalidade, registro, endereco, rg, cpf, sexo, idEspecialidade, idUsuario) values(?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $FuncionarioDTO->getNome());
        $execucao->bindValue(2, $FuncionarioDTO->getPai());
        $execucao->bindValue(3, $FuncionarioDTO->getMae());
        $execucao->bindValue(4, $FuncionarioDTO->getDtnasc());
        $execucao->bindValue(5, $FuncionarioDTO->getNaturalidade());
        $execucao->bindValue(6, $FuncionarioDTO->getNacionalidade());
        $execucao->bindValue(7, $FuncionarioDTO->getRegistro());
        $execucao->bindValue(8, $FuncionarioDTO->getEndereco());
        $execucao->bindValue(9, $FuncionarioDTO->getRg());
        $execucao->bindValue(10, $FuncionarioDTO->getCpf());
        $execucao->bindValue(11, $FuncionarioDTO->getSexo());
        $execucao->bindValue(12, $FuncionarioDTO->getIdEspecialidade());
        $execucao->bindValue(13, $FuncionarioDTO->getidUsuario());
        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Apagar(FuncionarioDTO $FuncionarioDTO) {
        $pdo = Conexao::getInstance();
        $sql = "delete from funcionario where idFuncionario = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $FuncionarioDTO->getIdFuncionario());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Alterar(FuncionarioDTO $FuncionarioDTO) {
        $pdo = Conexao::getInstance();
        $sql = "UPDATE funcionario SET nome=?,pai=?,mae=?,dt_nasc=?,naturalidade=?,nacionalidade=?,registro=?,endereco=?,rg=?,cpf=?,sexo=?,idEspecialidade=? where idUsuario=?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $FuncionarioDTO->getNome());
        $execucao->bindValue(2, $FuncionarioDTO->getPai());
        $execucao->bindValue(3, $FuncionarioDTO->getMae());
        $execucao->bindValue(4, $FuncionarioDTO->getDtnasc());
        $execucao->bindValue(5, $FuncionarioDTO->getNaturalidade());
        $execucao->bindValue(6, $FuncionarioDTO->getNacionalidade());
        $execucao->bindValue(7, $FuncionarioDTO->getRegistro());
        $execucao->bindValue(8, $FuncionarioDTO->getEndereco());
        $execucao->bindValue(9, $FuncionarioDTO->getRg());
        $execucao->bindValue(10, $FuncionarioDTO->getCpf());
        $execucao->bindValue(11, $FuncionarioDTO->getSexo());
        $execucao->bindValue(12, $FuncionarioDTO->getIdEspecialidade());
        $execucao->bindValue(13, $FuncionarioDTO->getidUsuario());
        $resultado = $execucao->execute();
        return $resultado;
    }

    //fim
}
