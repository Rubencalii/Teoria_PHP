<?php

    abstract class Figura {
        protected string $color;
        public function __construct(string $color) {
            $this->color = $color;
        }
        abstract public function calcularArea(): float;

        public function obtenerColor(): string {
            return $this->color;
        }

        private float $base;
        private float $altura;


    }
    class Triangulo extends Figura {
        public function __construct(string $color, float $base, float $altura) {
            parent::__construct($color);
            $this->base = $base;
            $this->altura = $altura;
        }

        public function calcularArea(): float {
            return ($this->base * $this->altura) / 2;
        }
    }

    class Cuadrado extends Figura  {
        public function __construct(string $color, float $base, float $altura){
            parent::__construct($color);
            $this->base = $base;
            $this->altura = $altura;
        }

        public function calcularArea(): float {
            return $this->base * $this->altura;
        }

    }
?>