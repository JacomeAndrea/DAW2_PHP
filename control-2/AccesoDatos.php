<?php
include 'Producto.php';
class AccesoDatos
{
    private static $modelo;
    private $dbh;

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
            $this->dbh = new PDO('mysql:host=localhost;dbname=empresa', 'root', 'root');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error ".$e->getMessage();
            die();
        }
    }

    public function closeModelo() {
        if (self::$modelo != null) {
            $this->dbh = null;
        }
    }

    public function getProductosSinPedidos () {
        $stmt = $this->dbh->prepare('SELECT * FROM PRODUCTOS WHERE PRODUCTO_NO NOT IN (SELECT PRODUCTO_NO FROM PEDIDOS)');
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function modificarPrecio ($numerosproducto) {
            foreach ($numerosproducto as $numero) {
                //bajamos un 10% el precio de los productos seleccionados
                $stmt = $this->dbh->prepare('UPDATE PRODUCTOS SET PRECIO_ACTUAL = PRECIO_ACTUAL * 0.9 WHERE PRODUCTO_NO = :no_producto');
                $stmt->bindParam(':no_producto', $numero);
                $stmt->execute();
            }
    }

    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}
