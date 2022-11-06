<?php 

    class LoginModel {
        private $id = ""; 
        private $email = "";
        private $senha = "";

        function __construct($id, $email, $senha){
            $this->setId($id);
            $this->setEmail($email);
            $this->setSenha($senha);
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
        public function setSenha($senha){
            $this->senha = $senha;
        }
    
        public function getSenha(){
            return $this->senha;
        }
    }

?>