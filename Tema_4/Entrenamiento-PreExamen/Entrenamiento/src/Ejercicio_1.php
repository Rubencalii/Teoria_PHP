<?php 

    // Ejercicio 1: Conexión a la base de datos y consulta de libros

    // Parte A:
    // Crear una conexión a la base de datos MySQL utilizando PDO
    function conectar(): ?PDO 
{
    try {
        $host = 'localhost';
        $puerto = '3307';
        $bd = 'biblioteca';
        $usuario = 'estudiante';
        $password = 'estudiante123';
        
        $dsn = "mysql:host=$host;port=$puerto;dbname=$bd;charset=utf8mb4";
        
        $opciones = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
        
        $pdo = new PDO($dsn, $usuario, $password, $opciones);
        
        return $pdo;
        
    } catch (PDOException $e) {
        error_log("Error de conexión: " . $e->getMessage());
        throw new Exception("No se pudo conectar a la base de datos: " . $e->getMessage());
    }
}
    // Parte B:
    // Realizar una consulta para obtener todos los libros de la tabla "libros"
    require_once 'conexion.php';

    class Libro 
    {
        
        public readonly int $id;
        
        public string $titulo {
            set(string $value) {
                $this->titulo = trim($value);
            }
        }
        
        public int $autorId;
        public int $generoId;
        public string $isbn;
        
        public int $ejemplares {
            set(int $value) {
                if ($value < 0) {
                    throw new InvalidArgumentException("Los ejemplares no pueden ser negativos");
                }
                $this->ejemplares = $value;
            }
        }
        
        public int $disponibles {
            set(int $value) {
                if ($value < 0) {
                    throw new InvalidArgumentException("Los disponibles no pueden ser negativos");
                }
                if ($value > $this->ejemplares) {
                    throw new InvalidArgumentException("Los disponibles no pueden ser mayor que los ejemplares totales");
                }
                $this->disponibles = $value;
            }
        }

        public function __construct(
            ?int $id = null,
            string $titulo = '',
            int $autorId = 0,
            int $generoId = 0,
            string $isbn = '',
            int $ejemplares = 0,
            int $disponibles = 0
        ) {
            if ($id !== null) {
                $this->id = $id;
            }
            $this->titulo = $titulo;
            $this->autorId = $autorId;
            $this->generoId = $generoId;
            $this->isbn = $isbn;
            $this->ejemplares = $ejemplares;
            $this->disponibles = $disponibles;
        }
        

        public function estaDisponible(): bool 
        {
            return $this->disponibles > 0;
        }

        public function prestar(): bool 
        {
            if ($this->disponibles > 0) {
                $this->disponibles--;
                return true;
            }
            return false;
        }

        public function devolver(): bool 
        {
            if ($this->disponibles < $this->ejemplares) {
                $this->disponibles++;
                return true;
            }
            return false;
        }

        public function toArray(): array 
        {
            return [
                'id' => $this->id ?? null,
                'titulo' => $this->titulo,
                'autorId' => $this->autorId,
                'generoId' => $this->generoId,
                'isbn' => $this->isbn,
                'ejemplares' => $this->ejemplares,
                'disponibles' => $this->disponibles
            ];
        }

        public static function buscarPorId(int $id): ?Libro 
        {
            try {
                $pdo = conectar();
                $sql = "SELECT * FROM libros WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                
                $data = $stmt->fetch();
                
                if ($data === false) {
                    return null;
                }
                
                return new Libro(
                    $data['id'],
                    $data['titulo'],
                    $data['autor_id'],
                    $data['genero_id'],
                    $data['isbn'],
                    $data['ejemplares'],
                    $data['disponibles']
                );
                
            } catch (Exception $e) {
                error_log("Error al buscar libro por ID: " . $e->getMessage());
                return null;
            }
        }
        
        public static function buscarTodos(): array 
        {
            try {
                $pdo = conectar();
                $sql = "SELECT * FROM libros ORDER BY titulo";
                $stmt = $pdo->query($sql);
                
                $libros = [];
                while ($data = $stmt->fetch()) {
                    $libros[] = new Libro(
                        $data['id'],
                        $data['titulo'],
                        $data['autor_id'],
                        $data['genero_id'],
                        $data['isbn'],
                        $data['ejemplares'],
                        $data['disponibles']
                    );
                }
                
                return $libros;
                
            } catch (Exception $e) {
                error_log("Error al buscar todos los libros: " . $e->getMessage());
                return [];
            }
        }
    }
?>