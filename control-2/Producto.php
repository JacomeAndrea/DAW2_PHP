<?php

class Producto
{
    private $PRODUCTO_NO;
    private $DESCRIPCION;
    private $PRECIO_ACTUAL;
    private $STOCK_DISPONIBLE;

    function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    function &__get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
}