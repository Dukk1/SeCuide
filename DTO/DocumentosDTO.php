<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DocumentosDTO
 *
 * @author alunoetc
 */
class DocumentosDTO {

    //put your code here
    private $idDocumentos;
    private $idConsulta;

    function getIdDocumentos() {
        return $this->idDocumentos;
    }

    function getIdConsulta() {
        return $this->idConsulta;
    }

    function setIdDocumentos($idDocumentos) {
        $this->idDocumentos = $idDocumentos;
    }

    function setIdConsulta($idConsulta) {
        $this->idConsulta = $idConsulta;
    }

    //fim
}
