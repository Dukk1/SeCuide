<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PerfilDTO
 *
 * @author alunoetc
 */
class PerfilDTO {

    //put your code here
    private $idPerfil;
    private $descricao;

    function getIdPerfil() {
        return $this->idPerfil;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    //fim
}
