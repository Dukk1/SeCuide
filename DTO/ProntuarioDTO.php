<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProntuarioDTO
 *
 * @author alunoetc
 */
class ProntuarioDTO {

    //put your code here
    private $idProntuario;
    private $data;
    private $hora;
    private $idPaciente;
    private $idFuncionario;
    private $idAgenda;
    private $anamnese;

    function getIdProntuario() {
        return $this->idProntuario;
    }

    function getData() {
        return $this->data;
    }

    function getHora() {
        return $this->hora;
    }

    function getIdPaciente() {
        return $this->idPaciente;
    }

    function getIdFuncionario() {
        return $this->idFuncionario;
    }

    function getIdAgenda() {
        return $this->idAgenda;
    }

    function getAnamnese() {
        return $this->anamnese;
    }

    function setIdProntuario($idProntuario) {
        $this->idProntuario = $idProntuario;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setIdPaciente($idPaciente) {
        $this->idPaciente = $idPaciente;
    }

    function setIdFuncionario($idFuncionario) {
        $this->idFuncionario = $idFuncionario;
    }

    function setIdAgenda($idAgenda) {
        $this->idAgenda = $idAgenda;
    }

    function setAnamnese($anamnese) {
        $this->anamnese = $anamnese;
    }

    //fim
}
