<?php
    class CuentaBancaria {
        private $saldo;

        public function _constructor($saldoInicial = 0) {
            if ($saldoInicial >= 0) {
                $this -> saldo = $saldoInicial;
            } else {
                $this -> saldo = 0;
                echo "El saldo inicial no puede ser negativo";
            }
        }

        public function depositar($cantidad) {
            if ($cantidad > 0){
                $this -> saldo += $cantidad;
                echo "NUmero depositado: " . $cantidad . ". Saldo actual: " . $this -> saldo;
            } else {
                echo "La cantidad tiene que ser positiva";
            }
        }

        public function retirar ($retirar) {
            if ($retirar > 0 && $retirar <= $this -> saldo) {
                $this -> saldo -= $retirar;
                echo "Numero que quieres retirar: " . $retirar . " y saldo actual: " . $this -> saldo;
            }
        }

        public function consultarSaldo() {
            return $this -> saldo;
            echo "Saldo actual: " . $this -> saldo;
        }

        
    }