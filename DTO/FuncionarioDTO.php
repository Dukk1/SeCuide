<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FuncionarioDTO
 *
 * @author alunoetc
 */
class FuncionarioDTO {

    //put your code here
    private $idFuncionario;
    private $nome;
    private $pai;
    private $mae;
    private $dtnasc;
    private $naturalidade;
    private $nacionalidade;
    private $registro;
    private $endereco;
    private $rg;
    private $cpf;
    private $sexo;
    private $idEspecialidade;
    private $idUsuario;

    function getIdFuncionario() {
        return $this->idFuncionario;
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

    function getDtnasc() {
        return $this->dtnasc;
    }

    function getNaturalidade() {
        return $this->naturalidade;
    }

    function getNacionalidade() {
        return $this->nacionalidade;
    }

    function getRegistro() {
        return $this->registro;
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

    function getIdEspecialidade() {
        return $this->idEspecialidade;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setIdFuncionario($idFuncionario) {
        $this->idFuncionario = $idFuncionario;
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

    function setDtnasc($dtnasc) {
        $this->dtnasc = $dtnasc;
    }

    function setNaturalidade($naturalidade) {
        $this->naturalidade = $naturalidade;
    }

    function setNacionalidade($nacionalidade) {
        $this->nacionalidade = $nacionalidade;
    }

    function setRegistro($registro) {
        $this->registro = $registro;
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

    function setIdEspecialidade($idEspecialidade) {
        $this->idEspecialidade = $idEspecialidade;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    //fim
}
