<?php 

class Bantime extends Banip {

	private $time;


	function __construct($servico,$time){

		$this->servico = $servico;
		$this->time = $time;
	}


	function defTime($con){

		$out = $con->exec("fail2ban-client set $this->servico bantime $this->time ");


		return $out;



	}


}




?>