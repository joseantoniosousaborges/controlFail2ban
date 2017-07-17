<?php 


class Banip {



	
	protected $servico;
	private $acao;
	private $ip;



	function __construct($servico,$acao,$ip){

		
		$this->servico = $servico;
		$this->acao = $acao;
		$this->ip = $ip;

	}


	function banip($con){


		$out = $con->exec("fail2ban-client set $this->servico $this->acao $this->ip ");


		return $out;

	}

}











?>