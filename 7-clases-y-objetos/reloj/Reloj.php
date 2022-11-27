<?php

class Reloj
{
    private $segundos;
    private bool $formato24;

    public function __construct(int $hora, int $minutos, int $segundos)
    {
        $this->segundos = $segundos + $minutos * 60 + $hora * 3600;
        $this->formato24 = true;
    }


    // Mostrar la hora: genera un String con el formado de hora 22:30:23
    // o 10:30:23 pm si el atributos Formato24 es falso
    public function mostrar()
    {
        $hora = intval($this->segundos / 3600);
        $minutos = intval(($this->segundos % 3600) / 60);
        $segundos = intval($this->segundos % 60);
        if (!$this->formato24 && $hora>12) {
            $hora -= 12;
            $meridiano = "pm";
        } else {
            $meridiano = "am";
        }
            return $hora." : ".$minutos." : ".$segundos." ".$meridiano;
    }

    // Cambiar formato24, recibe un valor true si quiero formato de 24 o falso si quiero de 12
    public function cambiarFormato24(bool $formato24)
    {
        $this->formato24 = $formato24;
    }


    // Incrementa en un segundo el valor de reloj
    public function tictac()
    {
        if ($this->segundos>86400) {
            $this->segundos=0;
        } else {
            $this->segundos++;
        }
    }

    // Comparar Hora, recibe como parámetro otro objeto Reloj // y me devuelve el número de segundos que tienen de diferencia

    public function comparar(Reloj $otroreloj)
    {
        if ($this->segundos>$otroreloj->segundos) {
            return $this->segundos - $otroreloj->segundos;
        } else if ($this->segundos<$otroreloj->segundos) {
            return $otroreloj->segundos - $this->segundos;
        } else {
            return 0;
        }
    }
}