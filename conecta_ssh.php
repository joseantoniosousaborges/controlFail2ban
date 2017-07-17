<?php 

include('Net/SSH2.php');


$servidor = "ip do servidor";

$usuario = "usuario do servidor";

$senha = "Senha servidor";




$ssh = new Net_SSH2($servidor);

$ssh->login($usuario, $senha) or die("Login failed");




 ?>