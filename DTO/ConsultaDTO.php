<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConsultaDTO
 *
 * @author alunoetc
 */
class ConsultaDTO {

    //put your code here
    private $idConsulta;
    private $idAgenda;
    private $idEspecialidade;
    private $idFuncionario;
    private $idPaciente;

    function getIdConsulta() {
        return $this->idConsulta;
    }

    function getIdAgenda() {
        return $this->idAgenda;
    }

    function getIdEspecialidade() {
        return $this->idEspecialidade;
    }

    function getIdFuncionario() {
        return $this->idFuncionario;
    }

    function getIdPaciente() {
        return $this->idPaciente;
    }

    function setIdConsulta($idConsulta) {
        $this->idConsulta = $idConsulta;
    }

    function setIdAgenda($idAgenda) {
        $this->idAgenda = $idAgenda;
    }

    function setIdEspecialidade($idEspecialidade) {
        $this->idEspecialidade = $idEspecialidade;
    }

    function setIdFuncionario($idFuncionario) {
        $this->idFuncionario = $idFuncionario;
    }

    function setIdPaciente($idPaciente) {
        $this->idPaciente = $idPaciente;
    }

    //fim
}
