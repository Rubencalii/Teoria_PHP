<?php
class Empleado {
    private string $nombre = '';
    private float $salarioMensual = 0.0;
    private string $puesto = '';

    public function __construct(string $nombre = '', float $salarioMensual = 0.0, string $puesto = '') {
        $this->nombre = $nombre;
        $this->setSalarioMensual($salarioMensual);
        $this->puesto = $puesto;
    }

    public function __get(string $prop)
    {
        switch ($prop) {
            case 'nombre':
                return strtoupper($this->nombre);
            case 'salarioMensual':
                return $this->salarioMensual;
            case 'salarioAnual':
                return $this->salarioMensual * 12;
            case 'puesto':
                return $this->puesto;
            default:
                throw new Exception("Propiedades desconocida: $prop");
        }
    }

    public function __set(string $prop, $value): void
    {
        switch ($prop) {
            case 'nombre':
                $this->nombre = (string) $value;
                break;
            case 'salarioMensual':
                $this->setSalarioMensual((float) $value);
                break;
            case 'puesto':
                $this->puesto = (string) $value;
                break;
            default:
                throw new Exception("Propiedades desconocida: $prop");
        }
    }
}
