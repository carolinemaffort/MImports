<?php 

    class InserirModel {
        private $id = ""; 
        private $foto = "";
        private $titulo = "";
        private $preco = "";
        private $descricao = "";
        

        function __construct($id, $foto, $titulo, $preco, $descricao){
            $this->setId($id);
            $this->setFoto($foto);
            $this->setTitulo($titulo);
            $this->setPreco($preco);
            $this->setDescricao($descricao);
            
        }

        public function setId($id){
            $this->id = $id;
        }
    
        public function getId(){
            return $this->id;
        }
        public function setFoto($foto){
            $this->foto = $foto;
        }
    
        public function getFoto(){
            return $this->foto;
        }
        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }
    
        public function getTitulo(){
            return $this->titulo;
        }
        public function setPreco($preco){
            $this->preco = $preco;
        }
    
        public function getPreco(){
            return $this->preco;
        }
        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }
    
        public function getDescricao(){
            return $this->descricao;
        }

       
    
    }

?>