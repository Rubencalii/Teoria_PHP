<?php
    class Libro extends Material {
        private bool $prestado = false;
        use Valorable;

        public function prestar(): void {
            $this -> $prestado = true;
        }
        public function devolver(): void {
            $this -> $prestado = false;
        }

        public function mostrarInfo(): void{
            echo "Título: " . $this -> getTitulo() . "\n";
            echo "Autor: " . $this -> getAutor() . "\n";
            echo "Estado: " . ($this -> $prestado ? "Prestado" : "Disponible") . "\n";
        }
    }