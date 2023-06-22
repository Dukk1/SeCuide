<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Prontuario_FuncionarioDTO
 *
 * @author alunoetc
 */
class Prontuario_FuncionarioDTO {

    //put your code here
    private $idProntuario_Funcionario;
    private $idProntuario;
    private $idFuncionario;

    function getIdProntuario_Funcionario() {
        return $this->idProntuario_Funcionario;
    }

    function getIdProntuario() {
        return $this->idProntuario;
    }

    function getIdFuncionario() {
        return $this->idFuncionario;
    }

    function setIdProntuario_Funcionario($idProntuario_Funcionario) {
        $this->idProntuario_Funcionario = $idProntuario_Funcionario;
    }

    function setIdProntuario($idProntuario) {
        $this->idProntuario = $idProntuario;
    }

    function setIdFuncionario($idFuncionario) {
        $this->idFuncionario = $idFuncionario;
    }

    //fim
}
