<?php

require_once '/Conexao/Conexao.php';

class Prontuario_FuncionarioDAO {

    public $pdo = null;

    public function Pesquisar() {

        $pdo = Conexao::getInstance();
        $sql = "select * from prontuario_funcionario;";

        $execucao = $pdo->prepare($sql);
        $execucao->execute();
        $pesquisa = $execucao -> fetchALL(PDO::FETCH_ASSOC);
        return $pesquisa;
    }

    public function PesquisarUmRegistro(Prontuario_FuncionarioDTO $Prontuario_FuncionarioDTO) {

        $pdo = Conexao::getInstance();
        $sql = "select * from prontuario_funcionario where idProntuario_Funcionario = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $Prontuario_FuncionarioDTO->getIdProntuario_Funcionario());
        $execucao->execute();
        $pesquisa = $execucao->fetch(PDO::FETCH_ASSOC);
    }

    public function Gravar(Prontuario_FuncionarioDTO $Prontuario_FuncionarioDTO) {
        $pdo = Conexao::getInstance();
        $sql = "insert into prontuario_funcionario (idProntuario,idFuncionario) values (?,?);";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $Prontuario_FuncionarioDTO->getIdProntuario());
        $execucao->bindValue(2, $Prontuario_FuncionarioDTO->getIdFuncionario());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Apagar(Prontuario_FuncionarioDTO $Prontuario_FuncionarioDTO) {
        $pdo = Conexao::getInstance();
        $sql = "delete from prontuario_funcionario where idProntuario_Funcionario = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $Prontuario_FuncionarioDTO->getIdProntuario_Funcionario());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Alterar(Prontuario_FuncionarioDTO $Prontuario_FuncionarioDTO) {
        $pdo = Conexao::getInstance();
        $sql = "updade from prontuario_funcionario set idProntuario=?,idFuncionario=? where idProntuario_Funcionario=?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $Prontuario_FuncionarioDTO->getIdProntuario());
        $execucao->bindValue(2, $Prontuario_FuncionarioDTO->getIdFuncionario());
        $execucao->bindValue(3, $Prontuario_FuncionarioDTO->getIdProntuario_Funcionario());

        $resultado = $execucao->execute();
        return $resultado;
    }

//fim
}
