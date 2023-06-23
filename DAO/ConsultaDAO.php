<?php

require_once 'Conexao/Conexao.php';

class ConsultaDAO {

    public $pdo = null;

    public function Pesquisar() {

        $pdo = Conexao::getInstance();
        $sql = "select * from consulta;";

        $execucao = $pdo->prepare($sql);
        $execucao->execute();
        $pesquisa = $execucao->fetchALL(PDO::FETCH_ASSOC);
        return $pesquisa;
    }

    public function PesquisarUmRegistro(ConsultaDTO $ConsultaDTO) {

        $pdo = Conexao::getInstance();
        $sql = "select * from consulta where idConsulta = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $ConsultaDTO->getIdConsulta());
        $execucao->execute();
        $pesquisa = $execucao->fetch(PDO::FETCH_ASSOC);
        return $pesquisa;
    }

    public function Gravar(ConsultaDTO $ConsultaDTO) {
        $pdo = Conexao::getInstance();
        $sql = "insert into consulta (idAgenda,idEspecialidade,idFuncionario,idPaciente) values(?,?,?,?);";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $ConsultaDTO->getIdAgenda());
        $execucao->bindValue(2, $ConsultaDTO->getIdEspecialidade());
        $execucao->bindValue(3, $ConsultaDTO->getIdFuncionario());
        $execucao->bindValue(4, $ConsultaDTO->getIdPaciente());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Apagar(ConsultaDTO $ConsultaDTO) {
        $pdo = Conexao::getInstance();
        $sql = "delete from consulta where idConsulta = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $ConsultaDTO->getIdConsulta());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Alterar(ConsultaDTO $ConsultaDTO) {
        $pdo = Conexao::getInstance();
        $sql = "updade from consulta set idAgenda=?,idEspecialidade=?,idFuncionario=?,idPaciente=? where idConsulta=?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $ConsultaDTO->getIdAgenda());
        $execucao->bindValue(2, $ConsultaDTO->getIdEspecialidade());
        $execucao->bindValue(3, $ConsultaDTO->getIdFuncionario());
        $execucao->bindValue(4, $ConsultaDTO->getIdPaciente());
        $execucao->bindValue(5, $ConsultaDTO->getIdConsulta());

        $resultado = $execucao->execute();
        return $resultado;
    }

//fim
}
