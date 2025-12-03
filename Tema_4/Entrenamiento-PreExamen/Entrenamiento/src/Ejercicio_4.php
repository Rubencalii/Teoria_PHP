<?php
    // Parte A: Tratit Auditable
    trait Auditable {
        protected array $registro = [];

        public function registrar (string $accion): void {
            $fecha = date('Y-m-d H:i:s');
            $mensaje = "[{$fecha}] " . $accion;
            $this->registro[] = $mensaje;
        }

        public function getRegistro(): array {
            return $this -> registro;
        }

        public function limpiarRegistro(): void {
            $this->registro = [];
        }
    }

    // Part B: Clase EstadisticasBiblioteca
?>