<?php 
    class Vehiculo {
        private $marca;
        private $modelo;
        private $año;
        
        public function _constructor($marca, $modelo, $año) {
            $this -> marca = $marca;
            $this -> modelo = $modelo;
            $this -> año = $año;
        }

        public function mostrarInfo() {
            return "Marca: " . $this -> marca . ", Modelo: " . $this -> modelo . ", Año: " . $this -> año;
        } 
    }