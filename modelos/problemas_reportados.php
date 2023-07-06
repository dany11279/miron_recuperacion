<?php
require_once 'Conexion.php';

class problemas_reportados extends Conexion {
    public $pro_id;
    public $pro_san;
    public $pro_descripcion;
    public $pro_fecha;
    public $pro_estado;

    public function __construct($args = []) {
        $this->pro_id = $args['pro_id'] ?? null;
        $this->pro_san = $args['pro_san'] ?? '';
        $this->pro_descripcion = $args['pro_descripcion'] ?? '';
        $this->pro_fecha = $args['pro_fecha'] ?? '';
        $this->pro_estado = $args['pro_estado'] ?? 1;
    }

    public function guardar() {
        $sql = "INSERT INTO problemas_reportados(pro_san, pro_descripcion, pro_fecha, pro_estado) 
                VALUES ('$this->pro_san', '$this->pro_descripcion', '$this->pro_fecha', '$this->pro_estado')";
        $resultado = self::ejecupro($sql);
        return $resultado;
    }

    public function buscar() {
        $sql = "select pro_id, san_nombre, pro_descripcion, pro_fecha from problemas_reportados inner join aplicacioneses on pro_san = san_id ";

        if ($this->pro_id != null) {
            $sql .= " AND pro_id = $this->pro_id";
        }

        if ($this->pro_san != '') {
            $sql .= " AND pro_san LIKE '%$this->pro_san%'";
        }

        if ($this->pro_descripcion != '') {
            $sql .= " AND pro_descripcion LIKE '%$this->pro_descripcion%'";
        }

        if ($this->pro_fecha != '') {
            $sql .= " AND pro_fecha = '$this->pro_fecha'";
        }

        if ($this->pro_estado != '') {
            $sql .= " AND pro_estado = '$this->pro_estado'";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }


    
    public function buscarpro() {
        // return "hola";
        // exit;
        $sql = "select * from problemas_reportados  WHERE pro_san = $this->pro_san ";

      
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarpro_id() {
        // return "hola";
        // exit;
        $sql = "select * from problemas_reportados  WHERE pro_id = $this->pro_id ";

  
        $resultado = self::servir($sql);
        return $resultado;
    }


    public function modificar() {
        $sql = "UPDATE problemas_reportados 
                SET pro_san = '$this->pro_san', pro_descripcion = '$this->pro_descripcion', 
                    pro_fecha = '$this->pro_fecha', pro_estado = '$this->pro_estado' 
                WHERE pro_id = $this->pro_id";
        
        $resultado = self::ejecupro($sql);
        return $resultado;
    }

    
    public function cambio() {
        $sql = "UPDATE problemas_reportados 
                SET  pro_estado = '$this->pro_estado' 
                WHERE pro_id = $this->pro_id";
        
        $resultado = self::ejecupro($sql);
        return $resultado;
    }

    public function eliminar() {
        $sql = "DELETE FROM problemas_reportados WHERE pro_id = $this->pro_id";
        
        $resultado = self::ejecupro($sql);
        return $resultado;
    }
}
