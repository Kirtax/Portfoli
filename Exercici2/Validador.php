<?php

    function validarLlargada5($input){
        if (strlen($input) <= 4) {
            return true;
        }
    }

    function validarLlargada3($input){
        if (strlen($input) <= 2) {
            return true;
        }
    }

    function validarNoNumeric($input){
        if (preg_match('/[0-9]/', $input)) {
            return true;
        }
    }

    function validarNoBuit($input){
        if (strlen($input) == 0) {
            return true;
        }
    }

    function validarEmail($email){
        if (!str_contains($email, '@')){
            return true;
        }
    }

    function validarInformacio($informacio) {
        if ((4 < strlen($informacio)) && (strlen($informacio) < 256)){
            return true;
        }
    }


