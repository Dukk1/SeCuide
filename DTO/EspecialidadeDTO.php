<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EspecialidadeDTO
 *
 * @author alunoetc
 */
class EspecialidadeDTO {

    //put your code here
    private $idEspecialidade;
    private $especialidade;

    function getIdEspecialidade() {
        return $this->idEspecialidade;
    }

    function getEspecialidade() {
        return $this->especialidade;
    }

    function setIdEspecialidade($idEspecialidade) {
        $this->idEspecialidade = $idEspecialidade;
    }

    function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }

    //fim
}
