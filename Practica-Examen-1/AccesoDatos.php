<?php
//Acceso a las clases
include_once "Cliente.php";
include_once "Pedido.php";

class AccesoDatos {

    private static $modelo = null;
    private $dbh = null;
    private $stmt1;
    private $stmt2;
    private $stmt3;

    public static function getModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }

    //Conexión a la BD
    private function __construct(){
        try {
            $dsn = "mysql:host=localhost;dbname=etienda;charset=utf8";
            $this->dbh = new PDO($dsn,"root","root");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }

        $this->stmt1 = $this->dbh->prepare("SELECT * FROM clientes WHERE nombre =? AND clave =?");
        $this->stmt2 = $this->dbh->prepare("SELECT * FROM pedidos WHERE cod_cliente =?");
        $this->stmt3 = $this->dbh->prepare("UPDATE clientes SET veces = ? WHERE cod_cliente = ?");
    }

    public function chequearUsuario(String $nombre, String $clave){
        $this->stmt1->bindValue(1,$nombre); //asigna variable $nombre a =? (en stmt1 [1])
        $this->stmt1->bindValue(2,$clave); //asigna variable $clave a =? (en stmt1 [2])
        $this->stmt1->setFetchMode(PDO::FETCH_CLASS,'Cliente');
        $this->stmt1->execute();
        $usuario = $this->stmt1->fetch();


        return $usuario;
    }

    public function obtenerListaPedidos($cod_cliente):array{
        $listapedidos=[];
        $this->stmt2->bindValue(1,$cod_cliente); //asigna variable $cod_cliente a =? (en stmt2 [1])
        $this->stmt2->setFetchMode(PDO::FETCH_CLASS,'Pedido');
        $this->stmt2->execute();
        while ($pedido = $this->stmt2->fetch()){
            $listapedidos[] = $pedido;
        }

        return $listapedidos;
    }

    function contadorVeces ($cod_cliente, $veces) {
        $veces++;
        $this->stmt3->bindValue(1,$veces);
        $this->stmt3->bindValue(2,$cod_cliente);
        $this->stmt3->execute();

    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            // Cierro la base de datos
            $obj->dbh = null;
            self::$modelo = null; // Borro el objeto.
        }
    }

    // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    {
        trigger_error('La clonación no permitida', E_USER_ERROR);
    }


}
