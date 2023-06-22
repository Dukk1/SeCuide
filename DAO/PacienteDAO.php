<?php

require_once 'Conexao/Conexao.php';

class PacienteDAO {

    public $pdo = null;

    public function ObterPacientes() {

        $pdo = Conexao::getInstance();
        $sql = "SELECT * FROM paciente;";

        $execucao = $pdo->prepare($sql);
        $execucao->execute();
        $pesquisa = $execucao->fetchALL(PDO::FETCH_ASSOC);
        return $pesquisa;
    }

    public function Pesquisar() {

        $pdo = Conexao::getInstance();
        $sql = "select *, date_format(dt_nasc, '%d/%m/%Y') dt_formatada from paciente;";

        $execucao = $pdo->prepare($sql);
        $execucao->execute();
        $pesquisa = $execucao->fetchALL(PDO::FETCH_ASSOC);
        return $pesquisa;
    }

    public function PesquisarUmRegistro(PacienteDTO $PacienteDTO) {

        $pdo = Conexao::getInstance();
        $sql = "select * from paciente where idPaciente = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $PacienteDTO->getIdPaciente());
        $execucao->execute();
        return $execucao->fetch(PDO::FETCH_ASSOC);
    }

    public function PesquisarByID($UserID) {

        $pdo = Conexao::getInstance();
        $sql = "select * from paciente where idUsuario = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $UserID);
        $execucao->execute();
        return $execucao->fetch(PDO::FETCH_ASSOC);
    }

    public function Gravar(PacienteDTO $PacienteDTO) {
        $pdo = Conexao::getInstance();
        $sql = "insert into paciente (nome, pai, mae, dt_nasc, naturalidade, nacionalidade, raca, endereco, rg, cpf, sexo, idUsuario) values(?,?,?,?,?,?,?,?,?,?,?,?);";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $PacienteDTO->getNome());
        $execucao->bindValue(2, $PacienteDTO->getPai());
        $execucao->bindValue(3, $PacienteDTO->getMae());
        $execucao->bindValue(4, $PacienteDTO->getDt_nasc());
        $execucao->bindValue(5, $PacienteDTO->getNaturalidade());
        $execucao->bindValue(6, $PacienteDTO->getNacionalidade());
        $execucao->bindValue(7, $PacienteDTO->getRaca());
        $execucao->bindValue(8, $PacienteDTO->getEndereco());
        $execucao->bindValue(9, $PacienteDTO->getRg());
        $execucao->bindValue(10, $PacienteDTO->getCpf());
        $execucao->bindValue(11, $PacienteDTO->getSexo());
        $execucao->bindValue(12, $PacienteDTO->getIdUsuario());
        
        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Apagar(PacienteDTO $PacienteDTO) {
        $pdo = Conexao::getInstance();
        $sql = "delete from paciente where idPaciente = ?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $PacienteDTO->getIdpaciente());

        $resultado = $execucao->execute();
        return $resultado;
    }

    public function Alterar(PacienteDTO $PacienteDTO) {
        $pdo = Conexao::getInstance();
        $sql = "updade from paciemte set nome=?,pai=?,mae=?,dt_nasc=?,naturalidade=?,nacionalidade=?,raca=?,endereco=?,rg=?,cpf=?,sexo=?,idUsuario=? where idPaciente=?;";
        $execucao = $pdo->prepare($sql);
        $execucao->bindValue(1, $PacienteDTO->getNome());
        $execucao->bindValue(2, $PacienteDTO->getPai());
        $execucao->bindValue(3, $PacienteDTO->getMae());
        $execucao->bindValue(4, $PacienteDTO->getDt_nasc());
        $execucao->bindValue(5, $PacienteDTO->getNaturalidade());
        $execucao->bindValue(6, $PacienteDTO->getNacionalidade());
        $execucao->bindValue(7, $PacienteDTO->getRaca());
        $execucao->bindValue(8, $PacienteDTO->getEndereco());
        $execucao->bindValue(9, $PacienteDTO->getRg());
        $execucao->bindValue(10, $PacienteDTO->getCpf());
        $execucao->bindValue(11, $PacienteDTO->getSexo());
        $execucao->bindValue(12, $PacienteDTO->getIdUsuario());
        $execucao->bindValue(13, $PacienteDTO->getIdPaciente());
        $resultado = $execucao->execute();
        return $resultado;
    }

    //fim
}
