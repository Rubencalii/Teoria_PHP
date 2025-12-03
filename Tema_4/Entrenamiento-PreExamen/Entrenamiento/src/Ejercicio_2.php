<?php

    // Ejercicio 2: Jerarquia de Persona
    //Parte A: Clase abstracta Persona
    abstract class Persona {
        protected int $id;
        protected string $nombre;
        protected string $email;

        public function __construct(int $id, string $nombre, string $email) {
            $this -> id = $id;
            $this -> nombre = $nombre;
            $this -> email = $email;
        }

        abstract public function getRol(): string;

        public function getInfoCompleta(): string {
            return "ID: {$this -> id}, Nombre: {$this -> nombre}, Email: {$this -> email}, Rol: {$this -> getRol()}";   
        }
    }

    //Parte B: Clase Socio

    class Socio extends Persona {
        public function getRol(): string {
            return "Socio";
        }

        protected DateTime $fechaAlta;
        protected bool $activo;

        public function __construct(int $id, string $nombre, string $email, DateTime $fechaAlta, bool $activo) {
            parent::__construct($id, $nombre, $email);
            $this -> fechaAlta = $fechaAlta;
            $this -> activo = $activo;
        }

        public function antiguedad(): int {
            $hoy = new DateTime();
            $intervalo = $this -> fechaAlta -> diff($hoy);
            return $intervalo -> y;
        }

        public function estaActivo(): bool {
            return $this -> activo;
        }

        public function darDebaja(): void {
            $this -> activo = false;
        }

        public function guardarTablaSocio(): string {
            $activoInt = $this -> activo ? 1:0;
            return "INSERT INTO socios (id, nombre, email, fecha_alta, activo) VALUES ({$this -> id}, '{$this -> nombre}', '{$this -> email}', '{$this -> fechaAlta->format('Y-m-d')}', {$activoInt})"; 
        }

        public static function buscarPorEmail(array $socios, string $email): ?Socios {
            foreach ($socios as $socio) {
                if ($socio -> email === $email) {
                    return $socio;
                }
            }
            return null;
        }
    }

    //Parte C: Clase SocioPremium

    class SSocioPremium extends Socio {
        private int $limiteLibros = 0 ;

        public function __construct(int $id, string $nombre, string $email, DateTime $fechaAlta, bool $activo, int $limiteLibros) {
            parent::__construct($id, $nombre, $email, $fechaAlta, $activo);
            $this -> limiteLibros = $limiteLibros;
        }

        public function getRol(): string {
            return "Socio Premium";
        }

        public function puedePrestar (int $librosActuales): bool {
            return $librosActuales < $this -> limiteLibros;
        }
    }

    //Parte D: Clase Bibliotecario

    class Bibliotecario extends Persona {
        private string $seccion ;

        public function __construct(int $id, string $nombre, string $email, string $seccion) {
            parent::__construct($id, $nombre, $email);
            $this -> seccion = $seccion;
        }
        
        public function getRol(): string {
            return "Bibliotecario - " . $this->seccion;
        }

        public function guardar(): bool {
            return true;
        }
    }