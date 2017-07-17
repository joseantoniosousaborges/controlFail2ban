<?php 



class ListDrop extends Banip {



	function __construct($servico){

		$this->servico = $servico;
	}

	function listRegra($con){

		

		$list = $con->exec("iptables -nvL fail2ban-$this->servico | grep REJECT");




		if($list == NULL){

			echo "Sem regras a exibir";

		}else{

				
			return $list;


		}
	}


}







?>