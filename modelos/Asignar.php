<?php
require_once 'Conexion.php';

class Asignar extends Conexion {
    public $asig_id;
    public $asig_of_encargado;
    public $asig_san;
    public $asig_sit;

    public function __construct($args = []) {
        $this->asig_id = $args['asig_id'] ?? null;
        $this->asig_of_encargado = $args['asig_of_encargado'] ?? '';
        $this->asig_san = $args['asig_san'] ?? '';
        $this->asig_sit = $args['asig_sit'] ?? 1;
    }

    public function guardar() {
        $sql = "INSERT INTO asig_of_encargado(asig_of_encargado, asig_san, asig_sit) 
                VALUES ('$this->asig_of_encargado', '$this->asig_san', '$this->asig_sit')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
    

    public function buscarnom() {
        $sql = "select gra_nombre || ' ' || of_nombres || ' ' || of_apellidos AS nombre from asig_of_encargado
        inner join of_encargadoes on asig_of_encargado = of_id 
        inner join grados on gra_id = of_grado
        where asig_san = $this->asig_san";

        if ($this->asig_id != null) {
            $sql .= " WHERE asig_id = $this->asig_id";
        }

        

        $resultado = self::servir($sql);
        return $resultado;
    }




    public function buscar() {
        $sql = "SELECT asig_id, asig_of_encargado, asig_san, asig_sit FROM asig_of_encargado";

        if ($this->asig_id != null) {
            $sql .= " WHERE asig_id = $this->asig_id";
        }

        if ($this->asig_of_encargado != '') {
            $sql .= " AND asig_of_encargado LIKE '%$this->asig_of_encargado%'";
        }

        if ($this->asig_san != '') {
            $sql .= " AND asig_san LIKE '%$this->asig_san%'";
        }

        if ($this->asig_sit != '') {
            $sql .= " AND asig_sit = '$this->asig_sit'";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar() {
        $sql = "UPDATE asig_of_encargado
                SET asig_of_encargado= '$this->asig_of_encargado', asig_app = '$this->asig_app', 
                    asig_sit = '$this->asig_sit' 
                WHERE asig_id = $this->asig_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar() {
        $sql = "DELETE FROM asig_of_encargadoWHERE asig_id = $this->asig_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
