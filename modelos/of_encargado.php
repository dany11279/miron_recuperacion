<?php
require_once 'Conexion.php';

class of_encargado extends Conexion {
    public $of_id;
    public $of_correo;
    public $of_grado;
    public $of_nombres;
    public $of_apellidos;
    public $of_sit;

    public function __construct($args = []) {
        $this->of_id = $args['of_id'] ?? null;
        $this->of_correo = $args['of_correo'] ?? '';
        $this->of_grado = $args['of_grado'] ?? '';
        $this->of_nombres = $args['of_nombres'] ?? '';
        $this->of_apellidos = $args['of_apellidos'] ?? '';
        $this->of_sit = $args['of_sit'] ?? 1;
    }

    public function guardar() {
        $sql = "INSERT INTO of_encargado(of_correo, of_grado, of_nombres, of_apellidos, of_sit) 
                VALUES ('$this->of_correo', '$this->of_grado', '$this->of_nombres', '$this->of_apellidos', '$this->of_sit')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar() {
        $sql = "SELECT of_id, of_correo, gra_nombre || ' ' || of_nombres || ' ' || of_apellidos AS of_nombres
        FROM of_encargado INNER JOIN grados on gra_id= of_grado";

        if ($this->of_id != null) {
            $sql .= " AND of_id = $this->of_id";
        }

        if ($this->of_correo != '') {
            $sql .= " AND of_correo LIKE '%$this->of_correo%'";
        }

        if ($this->of_grado != '') {
            $sql .= " AND of_grado LIKE '%$this->of_grado%'";
        }

        if ($this->of_nombres != '') {
            $sql .= " AND of_nombres LIKE '%$this->of_nombres%'";
        }

        if ($this->of_apellidos != '') {
            $sql .= " AND of_apellidos LIKE '%$this->of_apellidos%'";
        }

        if ($this->of_sit != '') {
            $sql .= " AND of_sit = '$this->of_sit'";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar2() {
        $sql = "SELECT *
        FROM of_encargado INNER JOIN grados on gra_id= of_grado";

        if ($this->of_id != null) {
            $sql .= " AND of_id = $this->of_id";
        }

        if ($this->of_correo != '') {
            $sql .= " AND of_correo LIKE '%$this->of_correo%'";
        }

        if ($this->of_grado != '') {
            $sql .= " AND of_grado LIKE '%$this->of_grado%'";
        }

        if ($this->of_nombres != '') {
            $sql .= " AND of_nombres LIKE '%$this->of_nombres%'";
        }

        if ($this->of_apellidos != '') {
            $sql .= " AND of_apellidos LIKE '%$this->of_apellidos%'";
        }

        if ($this->of_sit != '') {
            $sql .= " AND of_sit = '$this->of_sit'";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }


    public function modificar() {
        $sql = "UPDATE of_encargado 
                SET of_correo = '$this->of_correo', of_grado = '$this->of_grado', 
                    of_nombres = '$this->of_nombres', of_apellidos = '$this->of_apellidos', 
                    of_sit = '$this->of_sit' 
                WHERE of_id = $this->of_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar() {
        $sql = "DELETE FROM of_encargado WHERE of_id = $this->of_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
