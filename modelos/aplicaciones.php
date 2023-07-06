<?php
require_once 'Conexion.php';

class aplicaciones extends Conexion{
    public $san_id;
    public $san_nombre;
    public $san_estado;


    public function __construct($args = [] )
    {
        $this->san_id = $args['san_id'] ?? null;
        $this->san_nombre = $args['san_nombre'] ?? '';
        $this->san_estado = $args['san_estado'] ?? 1;
    }

    public function guardar(){
        $sql = "INSERT INTO aplicaciones(san_nombre, san_estado) VALUES ('$this->san_nombre','$this->san_estado')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM aplicaciones WHERE san_estado = 1";

        if($this->san_nombre != ''){
            $sql .= " AND san_nombre LIKE '%$this->san_nombre%'";
        }

        if($this->san_estado != ''){
            $sql .= " AND san_estado = '$this->san_estado'";
        }

        if($this->san_id != null){
            $sql .= " AND san_id = $this->san_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscart(){
        $sql = "SELECT * FROM aplicaciones WHERE san_estado in (1,2,3,4,5)";

        if($this->san_nombre != ''){
            $sql .= " AND san_nombre LIKE '%$this->san_nombre%'";
        }

            if($this->san_id != null){
            $sql .= " AND san_id = $this->san_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarsan(){
        $sql = "SELECT * FROM aplicaciones WHERE san_estado in (1,2,3,4,5) AND san_id = $this->san_id";



        $resultado = self::servir($sql);
        return $resultado;
    }





    public function modificar(){
        $sql = "UPDATE aplicaciones SET san_nombre = '$this->san_nombre', san_estado = '$this->san_estado' WHERE san_id = $this->san_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }



    
    public function modificar2(){
        $sql = "UPDATE aplicaciones SET  san_estado = '$this->san_estado' WHERE san_id = $this->san_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "DELETE FROM aplicaciones WHERE san_id = $this->san_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
