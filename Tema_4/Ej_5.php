<?php
    class Calculable {
        public function calcularArea(): float {
            return 0.0;
        }

        public function calcularPerimetro(): float {
            return 0.0;
        }
    }

    class Rectangulo extends Calculable {
        public function __construct(
            private float $ancho,
            private float $alto
        ){}
        
        public function calcularArea(): float {
            return $this->ancho * $this->alto;
        }
        
        public function calcularPerimetro(): float {
            return 2 * ($this->ancho + $this->alto);
        }
    }

    class Circulo extends Calculabre {
        public function __construct(
            private float $radio
        ){}
        
        public function calcularArea(): float {
            return pi() * pow($this->radio, 2);
        }
        
        public function calcularPerimetro(): float {
            return 2 * pi() * $this->radio;
        }
    }
?>