<?php

// Classe para modelar os dados de feedback
class FeedbackModel {
    // Id da mensagem
    private $id = "";
    // Mensagem de feedback
    private $message = "";

    // Constutor para gerar os valores iniciais do modelo
    function __construct($id, $message) {
        $this->setId($id);
        $this->setMessage($message);
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
    
    public function setMessage($message) {
        $this->message = $message;
    }

    public function getMessage() {
        return $this->message;
    }
}

?>