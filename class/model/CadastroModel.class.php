<?php 

    class CadastroModel {
        private $id = ""; 
        private $email = "";
        private $nome = "";
        private $message = "";

        function __construct($id, $email, $nome, $message){
            $this->setId($id);
            $this->setEmail($email);
            $this->setNome($nome);
            $this->setMessage($message);
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
        public function setMessage($message) {
            $this->message = $message;
        }
        
        public function getMessage() {
            return $this->message;
        }
    }

?>