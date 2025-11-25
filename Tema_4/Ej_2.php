<?php 
    class Vehiculo {
        private $marca;
        private $modelo;
        private $año;
        
        public function __construct($marca, $modelo, $año) {
            $this -> marca = $marca;
            $this -> modelo = $modelo;
            $this -> año = $año;
        }

        public function mostrarInfo() {
            return "Marca: " . $this -> marca . ", Modelo: " . $this -> modelo . ", Año: " . $this -> año;
        } 
    }

    class Coche extends Vehiculo {
        private $numPuertas;

        public function __construct($marca, $modelo, $año, $numPuertas) {
            parent::__construct($marca, $modelo, $año);
            $this -> numPuertas = $numPuertas;
        }

        public function mostrarInfo() {
            return parent::mostrarInfo() . ", Número de Puertas: " . $this -> numPuertas;
        }

        public function mostrarInformacion () {
            return parent::mostrarInfo() . ", Número de Puertas: " . $this -> numPuertas;   
            
        }
    }