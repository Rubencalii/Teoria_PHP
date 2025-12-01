<?php
    abstract class Material {
        private $titulo;
        private $autor;

        public function __construct($titulo, $autor) {
            $this -> $titulo = $titulo;
            $this -> $autor = $autor;
        }

        abstract public function mostrarInfo(): void;

        public function getTitulo() {
            return $this -> $titulo;
        }

        public function getAutor() {
            return $this -> $autor;
        }
    }
?>