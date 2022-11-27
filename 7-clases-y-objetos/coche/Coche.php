<?php
class Coche
{
    // Definir los atributos
    private string $modelo;
    private int $velocidad;
    private int $velocidadMax;
    private int $distanciaTotal;
    private int $distanciaParcial;
    private bool $motor;

// Completar los métodos
    function __construct(string $modelo, int $velocidadMax)
    {
        $this->modelo=$modelo;
        $this->velocidadMax=$velocidadMax;
        $this->velocidad=0;
        $this->distanciaTotal=0;
        $this->distanciaParcial=0;
        $this->motor=false;
    }

    public function arrancar(): bool
    {
        if (!$this->motor) {
            return $this->motor=true;
        } else {
            $this->infoError("No se puede arrancar el coche si ya estaba arrancado inicialmente");
            return false;
        }
    }

    public function parar(): bool
    {
        if (!$this->motor) {
            $this->infoError("Motor ya parado");
            return false;
        } else {
            $this->motor = false;
            $this->distanciaParcial = 0;
            $this->velocidad = 0;
            return true;
        }
    }

    public function acelera(int $cantidad): bool
    {
        if ($this->motor) {
            $this->velocidad+=$cantidad;
            if ($this->velocidad>$this->velocidadMax) {
                $this->velocidad=$this->velocidadMax; //requerimiento-> no se puede superar la velMax
            }
            return true;
        } else {
            $this->infoError("Motor parado. No se puede acelerar");
            return false;
        }
    }

    public function frena(int $cantidad): bool
    {
        if ($this->motor) {
            $this->velocidad-=$cantidad;
            if ($this->velocidad<0) {
                $this->velocidad=0;
            } else if ($this->velocidad===0) {
                $this->parar();
            }
            return true;
        } else {
            $this->infoError("Motor ya parado. No se puede frenar.");
            return false;
        }
    }

    public function recorre(): bool
    {
        if ($this->motor) {
            $this->distanciaParcial+=$this->velocidad;
            $this->distanciaTotal+=$this->velocidad;
            return true;
        } else {
            $this->infoError("Motor parado. No se puede avanzar.");
            return false;
        }
    }

    public function info(): string
    {
        if ($this->motor) {
            $estado="encendido";
        } else {
            $estado="apagado";
        }
        return "Modelo: ".$this->modelo.", velocidad actual: ".$this->velocidad.", estado: ".$estado.", Km parciales: ".$this->distanciaParcial.", Km totales: ".$this->distanciaTotal;
    }

    public function getKilometros(): int
    {
        return $this->distanciaParcial;
    }

    private function infoError(string $mensaje): void
    {
        print ($mensaje."<br>");
    }

    static function compara (Coche $a,Coche $b) {
        if ($a->getKilometros()>$b->getKilometros()) {
            return $a->getKilometros()-$b->getKilometros();
        } else if ($a->getKilometros()<$b->getKilometros()) {
            return $b->getKilometros()-$a->getKilometros();
        } else {
            return 0;
        }
    }
}