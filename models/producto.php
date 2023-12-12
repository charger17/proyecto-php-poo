<?php

class producto {
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    
    //Conexion base de datos
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $this->db->real_escape_string($id);

        return $this;
    }

    /**
     * Get the value of categoria_id
     */ 
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */ 
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $this->db->real_escape_string($categoria_id);

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);

        return $this;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);

        return $this;
    }

    /**
     * Get the value of oferta
     */ 
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Set the value of oferta
     *
     * @return  self
     */ 
    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");

        return $productos;
    }

    public function getAllCategories(){
        $sql = "SELECT p.*, c.NOMBRE AS 'catnombre' from productos p INNER JOIN categorias c ON c.id = p.categoria_id WHERE p.categoria_id = {$this->getCategoria_id()}";
        $productos = $this->db->query($sql);

        return $productos;
    }

    public function getRandom($limit){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT {$limit}");

        return $productos;
    }

    public function save(){
        $sql = "INSERT INTO productos (categoria_id, nombre, descripcion, precio, stock, oferta, fecha, imagen) VALUES({$this->getCategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, NULL, CURDATE(), '{$this->getImagen()}');";
        $save = $this->db->query($sql);
        echo $this->db->error;


        return $save ? true : false;
    }

    public function delete(){
        $sql = "DELETE FROM productos WHERE id = {$this->getId()};";
        $delete = $this->db->query($sql);

        return $delete ? true : false;
    }

    public function getOne(){
        $productos = $this->db->query("SELECT * FROM productos WHERE id= {$this->getId()}");

        return $productos->fetch_object();
    }

    public function edit(){
        $sql = "UPDATE productos SET categoria_id ={$this->getCategoria_id()}, 
        nombre = '{$this->getNombre()}', 
        descripcion ='{$this->getDescripcion()}', 
        precio = {$this->getPrecio()}, 
        stock = {$this->getStock()}";
        
        if($this->getImagen() != null){
            $sql .= "imagen= '{$this->getImagen()}'";
        }
        
        
        $sql .= " WHERE id = {$this->getId()};";

        $save = $this->db->query($sql);


        return $save ? true : false;
    }
}