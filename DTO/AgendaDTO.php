<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AgendaDTO
 *
 * @author alunoetc
 */
class AgendaDTO {

    //put your code here
    private $idAgenda;
    private $data;
    private $hora;
    private $idEspecialidade;
    private $idFuncionario;
    private $idPaciente;

    function getIdAgenda() {
        return $this->idAgenda;
    }

    function getData() {
        return $this->data;
    }

    function getHora() {
        return $this->hora;
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

    function setIdAgenda($idAgenda) {
        $this->idAgenda = $idAgenda;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setHora($hora) {
        $this->hora = $hora;
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
