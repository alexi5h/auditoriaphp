<?php

class Conexion {
    /* Variables de Conexion */

    private $baseDatos;
    private $servidor;
    private $usuario;
    private $clave;
    private $conexionID = 0;
    private $consultaID = 0;

    /* Numero de error y texto de error */
    public $Errno = 0;
    public $Error = '';


    function __construct() {
        $this->baseDatos = 'evaluacion';
        $this->servidor = 'localhost';
        $this->usuario = 'root';
        $this->clave = '';
        $this->conectar();
    }

    /* Conexion a la base de datos */

    private function conectar() {
        //Conectamos al servidor
        $this->conexionID = mysql_connect($this->servidor,
                        $this->usuario, $this->clave);
        if (!$this->conexionID) {
            $this->Error = 'Ha fallado la conexion';
            return 0;
        }
        //Seleccionamos la base de datos
        if (!mysql_select_db($this->baseDatos,
                        $this->conexionID)) {
            $this->Error = 'Imposible abrir la base de datos';
            return 0;
        }
        /* Si hemos tenido Ã©xito conectando
          devuelve el identificador de la conexiÃ³n */
        return $this->conexionID;
    }

    /* Ejecuta una consulta */

    public function consultar($sql = '') {        
        if ($sql == '') {
            $this->Error = 'No ha especificado la consulta SQL';
            return 0;
        }
        //Ejecutamos la consulta
        $this->consultaID = mysql_query($sql, $this->conexionID);
        if (!$this->consultaID) {
            $this->Errno = 0; //mysql_errono();
            $this->Error = 'Hay un error'; //mysql_error();
            return 0;
        }
        $this->Errno = 1;
        return $this->consultaID;
    }

    /* Numero de campos de una consulta */

    public function numCampos() {
        return mysql_num_fields($this->consultaID);
    }

    /* NÃºmero de registros de una consulta */

    public function numRegistros() {
        return mysql_num_rows($this->consultaID);
    }

    /* Numero de un campo de una consulta */

    public function nombreCampo($numCampo) {
        return mysql_field_name($this->consultaID, $numCampo);
    }

    public function obtenerFilaArray() {
        $row = mysql_fetch_row($this->consultaID);        
        return $row;
    }

    public function obtenerFila() {
        $row = mysql_fetch_array($this->consultaID);        
        return $row;
    }
}

//class
?>
