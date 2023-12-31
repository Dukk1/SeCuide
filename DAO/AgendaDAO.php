<?php

require_once 'Conexao/Conexao.php';

class AgendaDAO {

    public $pdo = null;

    public function Pesquisar() {

        $pdo = Conexao::getInstance();
        $sql = "select *, date_format(data, '%d/%m/%Y') dt_formatada from agenda;";

        $execucao = $pdo->prepare($sql);
        $execucao->execute();
        $pesquisa = $execucao->fetchALL(PDO::FETCH_ASSOC);
        return $pesquisa;
    }

    public function PesquisarByIDFuncionario($idFuncionario) {

        $pdo = Conexao::getInstance();
        $sql = "SELECT *, DATE_FORMAT(data, '%d/%m/%Y') AS dt_formatada FROM agenda WHERE idFuncionario = :idFuncionario";

        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(':idFuncionario', $idFuncionario, PDO::PARAM_INT);
        $execucao->execute();
        return $execucao->fetchAll(PDO::FETCH_ASSOC);
    }

    public function PesquisarByID($idPaciente) {

        $pdo = Conexao::getInstance();
        $sql = "SELECT *, DATE_FORMAT(data, '%d/%m/%Y') AS dt_formatada FROM agenda WHERE idPaciente = :idPaciente";
    
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(':idPaciente', $idPaciente, PDO::PARAM_INT);
        $execucao->execute();
        return $execucao->fetchAll(PDO::FETCH_ASSOC);
    }

    public function PesquisarByDataHora($data, $hora) {

        $pdo = Conexao::getInstance();
        $sql = "SELECT * FROM agenda WHERE data = :data AND hora = :hora";
    
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(':data', $data);
        $execucao->bindValue(':hora', $hora);
        $execucao->execute();
        return $execucao->fetchAll(PDO::FETCH_ASSOC);
    }

    public function PesquisarUmRegistro(AgendaDTO $AgendaDTO) {

        $pdo = Conexao::getInstance();
        $sql = "select * from agenda where idAgenda = ?";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $AgendaDTO->getIdAgenda());
        $execucao->execute();
        $pesquisa = $execucao->fetch(PDO::FETCH_ASSOC);
    }

    public function Gravar(AgendaDTO $AgendaDTO) {
        $pdo = Conexao::getInstance();
        $sql = "insert into agenda (data, hora, idEspecialidade, idFuncionario, idPaciente) values(?,?,?,?,?);";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $AgendaDTO->getData());
        $execucao->bindValue(2, $AgendaDTO->getHora());
        $execucao->bindValue(3, $AgendaDTO->getIdEspecialidade());
        $execucao->bindValue(4, $AgendaDTO->getIdFuncionario());
        $execucao->bindValue(5, $AgendaDTO->getIdPaciente());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Apagar(AgendaDTO $AgendaDTO) {
        $pdo = Conexao::getInstance();
        $sql = "delete from agenda where idAgenda = ?";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $AgendaDTO->getIdAgenda());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Alterar(AgendaDTO $AgendaDTO) {
        $pdo = Conexao::getInstance();
        $sql = "updade from agenda set data=?,hora=?,idEspecialidade=?,idFuncionario=?,idPaciente=? where idAgenda=?";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $AgendaDTO->getData());
        $execucao->bindValue(2, $AgendaDTO->getHora());
        $execucao->bindValue(3, $AgendaDTO->getIdEspecialidade());
        $execucao->bindValue(4, $AgendaDTO->getIdFuncionario());
        $execucao->bindValue(5, $AgendaDTO->getIdPaciente());
        $execucao->bindValue(6, $AgendaDTO->getIdAgenda());

        $resultado = $execucao->execute();
        return $resultado;
    }

//fim
}
