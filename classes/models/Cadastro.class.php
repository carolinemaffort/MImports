<?php 

    class Cadastro{
        private $id = ""; 
        private $email = "";
        private $nome = "";

        function __construct($id, $email, $nome){
            $this->setId($id) = $id;
            $this->setEmail($email) = $email;
            $this->setNome($nome) = $nome;
        }

        public function setId($id){
            $this->id = $id;
        }
    
        public function getId(){
            return $this->id;
        }
        public function setEmail($email){
            $this->email = $email;
        }
    
        public function getEmail(){
            return $this->email;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
    
        public function getNome(){
            return $this->nome;
        }
    }

?>