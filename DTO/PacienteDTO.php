<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PacienteDTO
 *
 * @author alunoetc
 */
class PacienteDTO {
    //put your code here
    private $idPaciente;
    private $nome;
    private $pai;
    private $mae;
    private $dt_nasc;
    private $naturalidade;
    private $nacionalidade;
    private $raca;
    private $endereco;
    private $rg;
    private $cpf;
    private $sexo;
    private $idUsuario;
    
    function getIdPaciente() {
        return $this->idPaciente;
    }

    function getNome() {
        return $this->nome;
    }

    function getPai() {
        return $this->pai;
    }

    function getMae() {
        return $this->mae;
    }

    function getDt_nasc() {
        return $this->dt_nasc;
    }

    function getNaturalidade() {
        return $this->naturalidade;
    }

    function getNacionalidade() {
        return $this->nacionalidade;
    }

    function getRaca() {
        return $this->raca;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getRg() {
        return $this->rg;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setIdPaciente($idPaciente) {
        $this->idPaciente = $idPaciente;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setPai($pai) {
        $this->pai = $pai;
    }

    function setMae($mae) {
        $this->mae = $mae;
    }

    function setDt_nasc($dt_nasc) {
        $this->dt_nasc = $dt_nasc;
    }

    function setNaturalidade($naturalidade) {
        $this->naturalidade = $naturalidade;
    }

    function setNacionalidade($nacionalidade) {
        $this->nacionalidade = $nacionalidade;
    }

    function setRaca($raca) {
        $this->raca = $raca;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

        //fim
}
