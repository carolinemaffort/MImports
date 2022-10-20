<?php 

    class CadastroModel {
        private $id = ""; 
        private $email = "";
        private $nome = "";

        function __construct($id, $email, $nome){
            $this->setId($id);
            $this->setEmail($email);
            $this->setNome($nome);
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