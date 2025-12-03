<?php

require_once 'Prestable.php'; 

class GestorPrestamos implements Prestable {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function registrarPrestamo(int $socioId, int $libroId): int {
        try {
            // 1. Verificar disponibilidad (SELECT + comprobación PHP)
            $sqlCheck = "SELECT disponibles FROM libros WHERE id = :id";
            $stmtCheck = $this->pdo->prepare($sqlCheck);
            $stmtCheck->execute([':id' => $libroId]);
            $libro = $stmtCheck->fetch(PDO::FETCH_ASSOC);

            // Si no existe el libro o disponible es 0 (o menor)
            if (!$libro || $libro['disponibles'] < 1) {
                throw new Exception("El libro no está disponible para préstamo.");
            }

            // 2. Inicio de Transacción
            $this->pdo->beginTransaction();

            // A. INSERT en tabla prestamos
            $sqlInsert = "INSERT INTO prestamos (socio_id, libro_id, fecha_prestamo, devuelto) 
                          VALUES (:socio_id, :libro_id, NOW(), 0)";
            $stmtInsert = $this->pdo->prepare($sqlInsert);
            $stmtInsert->execute([
                ':socio_id' => $socioId, 
                ':libro_id' => $libroId
            ]);
            
            $prestamoId = (int) $this->pdo->lastInsertId();

            // B. UPDATE en tabla libros (reducir disponibles)
            $sqlUpdate = "UPDATE libros SET disponibles = disponibles - 1 WHERE id = :id";
            $stmtUpdate = $this->pdo->prepare($sqlUpdate);
            $stmtUpdate->execute([':id' => $libroId]);

            $this->pdo->commit();

            return $prestamoId;

        } catch (Exception $e) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            throw new Exception("Error al registrar el préstamo: " . $e->getMessage());
        }
    }

    public function registrarDevolucion(int $prestamoId): bool {
        try {
            // 1. Buscar el prestamo para obtener el ID del libro
            $sqlGet = "SELECT libro_id, devuelto FROM prestamos WHERE id = :id";
            $stmtGet = $this->pdo->prepare($sqlGet);
            $stmtGet->execute([':id' => $prestamoId]);
            $prestamo = $stmtGet->fetch(PDO::FETCH_ASSOC);

            if (!$prestamo) {
                throw new Exception("El préstamo con ID $prestamoId no existe.");
            }

            if ($prestamo['devuelto'] == 1) {
                throw new Exception("Este préstamo ya figura como devuelto.");
            }

            $libroId = $prestamo['libro_id'];

            // 2. Transaccion
            $this->pdo->beginTransaction();

            // A. UPDATE prestamos (marcar devuelto y fecha actual)
            $sqlUpdatePrestamo = "UPDATE prestamos 
                                  SET devuelto = 1, fecha_devolucion = NOW() 
                                  WHERE id = :id";
            $stmtPrestamo = $this->pdo->prepare($sqlUpdatePrestamo);
            $stmtPrestamo->execute([':id' => $prestamoId]);

            $sqlUpdateLibro = "UPDATE libros SET disponibles = disponibles + 1 WHERE id = :id";
            $stmtLibro = $this->pdo->prepare($sqlUpdateLibro);
            $stmtLibro->execute([':id' => $libroId]);
            $this->pdo->commit();

            return true;

        } catch (Exception $e) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            throw new Exception("Fallo en la devolución: " . $e->getMessage());
        }
    }
    public function getPrestamosActivos(int $socioId): array {
        // devuelto = 0 implica FALSE
        $sql = "SELECT * FROM prestamos WHERE socio_id = :socio_id AND devuelto = 0";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':socio_id' => $socioId]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHistorial(int $socioId): array {
        $sql = "SELECT * FROM prestamos WHERE socio_id = :socio_id ORDER BY fecha_prestamo DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':socio_id' => $socioId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>