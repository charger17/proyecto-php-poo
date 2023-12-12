<?php

class Categoria{
    private $id;
    private $nombre;
    
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
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->db->real_escape_string($this->nombre);
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getAll(){
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");

        return $categorias;
    }

    public function getOne(){
        $categorias = $this->db->query("SELECT * FROM categorias WHERE id = {$this->getId()}");

        return $categorias->fetch_object();
    }

    public function save(){
        $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
        $save = $this->db->query($sql);


        return $save ? true : false;
    }
}