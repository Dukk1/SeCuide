<?php

require_once 'Conexao/Conexao.php';

class ProntuarioDAO {

    public $pdo = null;

    public function Pesquisar() {

        $pdo = Conexao::getInstance();
        $sql = "select *, date_format(data, '%d/%m/%Y') dt_formatada from prontuario;";

        $execucao = $pdo->prepare($sql);
        $execucao->execute();
        $pesquisa = $execucao -> fetchALL(PDO::FETCH_ASSOC);
        return $pesquisa;
    }

    public function PesquisarByID($UserID) {

        $pdo = Conexao::getInstance();
        $sql = "select * from prontuario where idPaciente = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $UserID);
        $execucao->execute();
        return $execucao->fetch(PDO::FETCH_ASSOC);
    }

    public function PesquisarUmRegistro(ProntuarioDTO $ProntuarioDTO) {

        $pdo = Conexao::getInstance();
        $sql = "select * from prontuario where idProntuario = ?";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $ProntuarioDTO->getIdProntuario());

        $execucao->execute();
        $pesquisa = $execucao->fetch(PDO::FETCH_ASSOC);
    }

    public function Gravar(ProntuarioDTO $ProntuarioDTO) {
        $pdo = Conexao::getInstance();
        $sql = "insert into prontuario (data,hora,idPaciente,idFuncionario,anamnese) values (?,?,?,?,?);";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $ProntuarioDTO->getData());
        $execucao->bindValue(2, $ProntuarioDTO->getHora());
        $execucao->bindValue(3, $ProntuarioDTO->getIdPaciente());
        $execucao->bindValue(4, $ProntuarioDTO->getIdFuncionario());
        $execucao->bindValue(5, $ProntuarioDTO->getAnamnese());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Apagar(ProntuarioDTO $ProntuarioDTO) {
        $pdo = Conexao::getInstance();
        $sql = "delete from prontuario where idProntuario = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $ProntuarioDTO->getIdProntuario());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Alterar(ProntuarioDTO $ProntuarioDTO) {
        $pdo = Conexao::getInstance();
        $sql = "updade from prontuario set data=?,hora=?,idPaciente=?,idFuncionario=?,anamnese=? where idProntuario=?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $ProntuarioDTO->getData());
        $execucao->bindValue(2, $ProntuarioDTO->getHora());
        $execucao->bindValue(3, $ProntuarioDTO->getIdPaciente());
        $execucao->bindValue(4, $ProntuarioDTO->getIdFuncionario());
        $execucao->bindValue(5, $ProntuarioDTO->getAnamnese());
        $execucao->bindValue(6, $ProntuarioDTO->getIdProntuario());
        $resultado = $execucao->execute();
        return $resultado;
    }
//fim
}
