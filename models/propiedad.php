<?php 

namespace Model;

class Propiedad extends ActiveRecord {
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedores_id'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }

    public function validar() {
        if (!$this->titulo) {
            self::$errores[] = "Añadir titulo";
        }

        if (!$this->precio) {
            self::$errores[] = "Añadir precio";
        }

        if (!$this->imagen) {
            self::$errores[] = "Añadir Imagen";
        }

        if (strlen( $this->descripcion ) < 50 ) {
            self::$errores[] = "Añadir descripción obligatorio y más de 50 caracteres";
        }

        if (!$this->habitaciones) {
            self::$errores[] = "Añadir cantidades de habitaciones";
        }

        if (!$this->wc) {
            self::$errores[] = "Añadir cantidades de baños";
        }

        if (!$this->estacionamiento) {
            self::$errores[] = "Añadir cantidades de estacionamientos";
        }

        if (!$this->vendedores_id) {
            self::$errores[] = "Elige un vendedor";
        }

        return self::$errores;
    }
}