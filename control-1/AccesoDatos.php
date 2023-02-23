<?php

include 'Cliente.php';
include 'Pedido.php';

class AccesoDatos {
    private static $modelo;
    private $dbh;
    private $stmt1;
    private $stmt2;

    public static function getModelo()
    {
        if (!isset(self::$modelo)) {
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }

    private function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=etienda', 'root', 'root');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error ".$e->getMessage();
            die();
        }

        //objetos PDOStatement para las consultas
        $this->stmt1 = $this->dbh->prepare('SELECT * FROM clientes WHERE nombre = :nombre AND clave = :clave');
        $this->stmt2 = $this->dbh->prepare('SELECT * FROM pedidos WHERE cod_cliente = :cod_cliente');
    }

    public function closeModelo() {
        if (self::$modelo != null) {
            $this->dbh = null;
            $this->stmt1 = null;
            $this->stmt2 = null;
        }
    }

    public function getCliente ($nombre, $clave) {
        $this->stmt1->bindParam(':nombre', $nombre);
        $this->stmt1->bindParam(':clave', $clave);
        $this->stmt1->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        $this->stmt1->execute();

        if ($obj = $this->stmt1->fetch()) {
            return $obj;
        }

        return null;
    }

    public function getPedidos($codCliente) {
        $pedidos = [];

        $this->stmt2->bindParam(':cod_cliente', $codCliente);
        $this->stmt2->setFetchMode(PDO::FETCH_CLASS, 'Pedido');
        if ($this->stmt2->execute()) {
            while ($obj = $this->stmt2->fetch()) {
                $pedidos[] = $obj;
            }
        }
        return $pedidos;
    }

    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }

    public function updateVecesCliente($codCliente) {
        //modificamos el número de veces que ha entrado el cliente
        $stmt = $this->dbh->prepare('UPDATE clientes SET veces = veces + 1 WHERE cod_cliente = :cod_cliente');
        $stmt->bindParam(':cod_cliente', $codCliente);
        $stmt->execute();
    }
}