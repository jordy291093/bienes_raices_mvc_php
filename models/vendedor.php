<?php 

namespace Model;

class Vendedor extends ActiveRecord {
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id','nombre','apellido','telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar() {
        if (!$this->nombre) {
            self::$errores[] = "Añadir Nombre";
        }

        if (!$this->apellido) {
            self::$errores[] = "Añadir Apellido";
        }

        if (!$this->telefono) {
            self::$errores[] = "Añadir Teléfono";
        }
        // Expresion regular para validar formatos
        if (!preg_match('/[0-9]{10}/', $this->telefono)) {
            self::$errores[] = "El formato del teléfono no es válido";
        }

        return self::$errores;
    }
}