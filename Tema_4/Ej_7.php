<?php
    trait TimestampTrait {
        private $fechaCreacion;
        private $fechaModificacion;
    
    public function inicializarTimestamps(): void {
        if ($this->fechaCreacion === null) {
            $this->fechaCreacion = new DateTimeImmutable();
        }
        $this->fechaModificacion = new DateTimeImmutable();
    }

    public function actualizarFechaModificacion(): void {
        $this->fechaModificacion = new DateTimeImmutable();
    }

     public function getFechaCreacion(): ?string {
        return $this->fechaCreacion?->format('Y-m-d H:i:s');
    } 
    public function getFechaModificacion(): ?string {
        return $this->fechaModificacion?->format('Y-m-d H:i:s');
    }
}

    class Articulo {
        use TimestampsTrait;

        private string $titulo;
        private string $contenido;

        public function __construct(string $titulo, string $contenido) {
            $this -> $titulo = $titulo;
            $this -> $contenido = $contenido;
            $this -> inicializarTimestamps();
        }

        public function editar (string $titulo, string $contenido):void {
            $this -> $titulo = $titulo;
            $this -> $contenido = $contenido;
            $this -> actualizarFechaModificacion();
        }

        public function getTitulo(): string {
            return $this -> $titulo;
        }

        public function getContenido(): string{
            return $this -> $contenido;
        }
    }
?>