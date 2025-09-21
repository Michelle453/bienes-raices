<?php

namespace Model;

class Propiedad extends ActiveRecord{
    protected static $tabla = 'propiedades';
    protected static $columDB = [
        'id',
        'imagen',
        'titulo',
        'precio',
        'descripcion',
        'habitaciones',
        'wc',
        'estacionamiento',
        'creado',
        'vendedores_id'
    ];
   
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
        $this->id = $args['id']??null;
        $this->imagen = $args['imagen']??'';
        $this->titulo = $args['titulo']??'';
        $this->precio = $args['precio']??'';
        $this->descripcion = $args['descripcion']??'';
        $this->habitaciones = $args['habitaciones']??'';
        $this->wc = $args['wc']??'';
        $this->estacionamiento = $args['estacionamiento']??'';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id']??'';
        
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un título";
        }
        if(!$this->precio){
            self::$errores[] = "El precio es obligatorio";
        }
        if(strlen($this->descripcion)<50){
            self::$errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }
        if(!$this->habitaciones){
            self::$errores[] = "Debes ingresar el número de habitaciones";
        }
        if(!$this->wc){
            $errores[] = "Debes ingresar el número de baños";
        }
        if(!$this->estacionamiento){
            self::$errores[] = "Debes ingresar el númeo de estacionamientos";
        }
        if(!$this->vendedores_id){
            self::$errores[] = "Debes seleccionar el vendedor";
        }

        if(!$this->imagen){
            self::$errores[] = 'La imagen es obligatoria';
        }
        
        return self::$errores;
    }
}