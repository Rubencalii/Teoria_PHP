<?php

    function validarEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? 'Email válido' : 'Email no válido';
    }
    function validarNombre($nombre) {
        return preg_match("/^[a-zA-ZÀ-ÿ\s]{1,40}$/", $nombre) ? 'Nombre válido' : 'Nombre no válido';
    }
    function validarTelefono($telefono) {
        return preg_match("/^\+?[0-9]{7,15}$/", $telefono) ? 'Teléfono válido' : 'Teléfono no válido';
    }
    function validarClave($clave) {
        return preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $clave) ? 'Clave válida' : 'Clave no válida';
    }

    class validador {
        public static function validarEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL) ? 'Email válido' : 'Email no válido';
        }
        public static function validarNombre($nombre) {
            return preg_match("/^[a-zA-ZÀ-ÿ\s]{1,40}$/", $nombre) ? 'Nombre válido' : 'Nombre no válido';
        }
        public static function validarTelefono($telefono) {
            return preg_match("/^\+?[0-9]{7,15}$/", $telefono) ? 'Teléfono válido' : 'Teléfono no válido';
        }
        public static function validarClave($clave) {
            return preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $clave) ? 'Clave válida' : 'Clave no válida';
        }
    }
    // Ejemplos de uso de funciones
    echo validarEmail("example@example.com") . "\n";    
    echo validarNombre("Juan") . "\n";
    echo validarTelefono("+34612345678") . "\n";
    echo validarClave("Aa1@abcd") . "\n";
?>