<?php

class CuentaBancaria
{
    //atributos
    private $saldo;
    private $numMovimientos;
    private static $numCuentas = 0;

    //constructor: sin parámetros y con 1 parámetro (saldo)
    public function __construct(){//llama al contructor dependiendo del nº de parámetros
        $params = func_get_args();
        $num_params = func_num_args();
        $funcion_constructor = '__construct'.$num_params;
        if (method_exists($this,$funcion_constructor)){
            call_user_func_array(array($this,$funcion_constructor),$params);
        }
    }
    public function __construct0() {
        $this->saldo=0;
        self::$numCuentas++;
    }

    public function __construct1($saldo) {
        if ($saldo>=0) {
            $this->saldo=$saldo;
            self::$numCuentas++;
        } else {
            echo "No se puede crear una cuenta con saldo negativo";
        }
    }

        //Funciones requeridas
    public function __get($saldo) //devuelve el saldo
    {
        if (property_exists($this,$saldo)) {
            return $this->saldo;
        } //solo es posible si la instancia de la clase new CuentaBancaria cuenta con el parametro $saldo, sino en c1 (sin parámetros saldrá el else)
        /*else{
        trigger_error("Atributo no definido ", E_USER_NOTICE);
        }*/
        return null;
    }

    public function getNumMovimientos(): int
    {
        return $this->numMovimientos;
    }

    public function ingreso($cantidadAIngresar) {
        if ($cantidadAIngresar>0) {
            $this->saldo+=$cantidadAIngresar;
            $this->numMovimientos++;
        } else {
            echo "No puedes hacer un ingreso negativo";
        }
    }
    public function abono($cantidadARetirar) {
        if ($cantidadARetirar > 0) {
            $this->saldo -= $cantidadARetirar;
            $this->numMovimientos++;
        } else {
            echo "Error";
        }
    }

    //Anotar gastos decrementa el saldo en 20 euros si el saldo de la cuenta es menor 1000
    public function anotarGastos() {
        if ($this->saldo <1000) {
            $this->saldo-=20;
            $this->numMovimientos++;
        }
    }

    //Anotar Intereses incrementa la cuenta según valor de interés indicado como parámetro en tanto por ciento.
    public function anotarintereses ($interes) {
        $decimal=($interes/100);
        $cantidadSumar=$this->saldo*$decimal;
        $this->saldo+=$cantidadSumar;
        $this->numMovimientos++;
    }

    //Realizar transferencia a cuenta, decrementa el saldo en la cantidad indicada como parámetro, realizando un ingreso en la cuenta destin
    public function transferencia ($transferencia, CuentaBancaria $cuentaDestino) {
        if ($transferencia>0) {
            $this->abono($transferencia);
            $cuentaDestino->ingreso($transferencia);
            $this->numMovimientos++;
        }
    }

    //Consultar estado de la cuenta, mostrá el saldo actual y el número de operaciones realizadas
    public function consultarEstado () {
        return "Saldo: ".$this->__get($this->saldo). "<br><br>Número de movimientos: ".$this->getNumMovimientos();
    }
}

