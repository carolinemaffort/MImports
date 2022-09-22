<?php

    
class DBConnection{
    
    private $host = "";
    private $user = "";
    private $pass = "";
    private $schema = "";
    
    private $conn = null;

    public function __construct(){
        
        $this->setHost("localhost");
        $this->setUser("root");
        $this->setPass("");
        $this->setSchema("mimports");
        $this->setConn(new \mysqli($this->getHost(),$this->getUser(),$this->getPass(),$this->getSchema()));
             
        // Checar conexao
        if ( $this->conn -> connect_errno) {
            die("Failed to connect to MySQL: " .  $this->conn -> connect_error);
           
        }
        else {
            echo "Conectado! <br>";
        }
    }
    
    function query($sqlCommand){
        
        return ($this->getConn()->query($sqlCommand));
    }

    public function getHost(){
        return $this->host;
    }

    public function setHost($host){
        $this->host = $host;
        return $this;
    }

    public function getUser(){
        return $this->user;
    }

    public function setUser($user){
        $this->user = $user;
        return $this;
    }

    public function getPass(){
        return $this->pass;
    }

    public function setPass($pass){
        $this->pass = $pass;
        return $this;
    }

    public function getSchema(){
        return $this->schema;
    }

    public function setSchema($schema){
        $this->schema = $schema;
        return $this;
    }

    public function getConn(){
        return $this->conn;
    }

    public function setConn($conn){
        $this->conn = $conn;
        return $this;
    }

}


?>