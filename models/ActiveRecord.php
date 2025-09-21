<?php 

namespace Model;

class ActiveRecord{
     //DB
    protected static $db;
    protected static $columDB = [];
    protected static $tabla = '';

    // errores o validacion
    protected static $errores = [];

    // definir la conexion a la DB
    public static function setDB($database){
        self::$db = $database;
    }

    public function atributos(){
        $atributos = [];
        foreach(static::$columDB as $column){
            if($column === 'id') continue;
            $atributos[$column] = $this->$column;
        }
        
        return $atributos;
    }

    public function sanitizarDatos(){
        $atributos = $this->atributos();
        
        $sanitizado = [];

       foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
       }
       return $sanitizado;
    }

    public static function getErrores(){
        
        return static::$errores;
    }

    public function guardar(){
       
        if(!is_null($this->id)){
           
            $this->actualizar();
        }else{
            $this->crear();
        }
    }


    public function crear(){
        // sanitizar datos
        $atributos = $this->sanitizarDatos();
        //insertar en DB
        $query = "INSERT INTO " . static::$tabla ." ( ";
        $query.= join(', ', array_keys($atributos));
        $query.= " ) VALUES ('";
        $query.= join("', '", array_values($atributos));
        $query.= " ') ";
        
        $resultado = self::$db->query($query);
      
        if($resultado){
            //Redireccionar al usuario
            header('location:/admin?resultado=1');
        }
    }

    public function actualizar(){
        // sanitizar datos
        $atributos = $this->sanitizarDatos();
        $valores = [];
        foreach($atributos as $key=>$value){
            $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE " .static::$tabla. " SET ";
        $query.= join(', ', $valores);
        $query.= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query.= " LIMIT 1";
        
        $resultado = self::$db->query($query);
         if($resultado){
  
            header('location:/admin?resultado=2');
        }
        
    }

    public function eliminar(){
        
        $query = "DELETE FROM ". static::$tabla. " WHERE id = ".self::$db->escape_string($this->id). " LIMIT 1";
        
        $resultado = self::$db->query($query);
        
        if($resultado){
            $this->borrarImagen();
            header('location: /admin?resultado=3');
        }
    }

    public function validar(){
        static::$errores = [];
        return static::$errores;
    }

    public function setImagen($imagen){
        // eliminar imagen previa
        if(!is_null($this->id)){
            $this->borrarImagen();
        }
        if($imagen){
            $this->imagen = $imagen;
        }
    }
    
    // eliminar archivo
    public function borrarImagen(){
       
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        
        if($existeArchivo){
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    // lista todos los registros
    public static function all(){
        $query = "SELECT * FROM ". static::$tabla;
        
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // obtiene determinado numero de registros
    public static function get($cantidad){
        $query = "SELECT * FROM ". static::$tabla . " LIMIT " . $cantidad;
      
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // buscar registro por id
    public static function find($id){
        $query = "SELECT * FROM ". static::$tabla ." WHERE id = {$id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        // consultar DB
        $resultado = self::$db->query($query);
        // Iterar resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }
        
        // liberar memoria
        $resultado->free();
        // retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;
        foreach($registro as $key=>$value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    public function sincronizar($args = []){
        foreach($args as $key=>$value){
            if(property_exists($this,$key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}