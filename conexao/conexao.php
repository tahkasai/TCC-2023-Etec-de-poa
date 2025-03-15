<?php
class BancodeDados {

    private $host = "localhost:3306";
    private $user = "root"; 	
    private $senha = ""; 	
    private $banco = "bd_synesis"; 		
    public $con;

	function conecta(){
        $this->con = mysqli_connect($this->host,$this->user,$this->senha, $this->banco);
        if(!$this->con){
			die ("Problemas na conexão");
        }
    }
	function fechar(){
		mysqli_close($this->con);
		return;
	}
}