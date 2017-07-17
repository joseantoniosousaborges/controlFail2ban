<?php 

require 'conecta_ssh.php';
require 'Banip.php';
require 'Bantime.php';
require 'ListDrop.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Fail2BAN</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/icons.css">
</head>
<body>
	
	<div class="container">
		<span class="glyphicon glyphicon-cog" aria-hidden="true"> FAIL2BAN</span><br/>
		<p>BLOQUEAR & LIBERA HOSTS:</p>
		<form class="form-inline" action="" method="post">
			<div class="col-md-2">
				<select class="form-control" name="opt1">
					<option selected>Selecione o Serviço</option>
					<option value="asterisk">Asterisk</option>
					<option value="ssh">SSH</option>
				</select>
			</div>
			<div class="col-md-2">
				<input type="text" class="form-control" placeholder="IP " name="ip">
			</div>
			<div class="col-md-2">
				<select class="form-control" name="opt2">
					<option selected>AÇÃO</option>
					<option value="banip">BAN</option>
					<option value="unbanip">UNBAN</option>
					<option value="addignoreip">IGNORE</option>
				</select>
			</div>

			<button type="submit" class="btn btn-primary" name="submit1">START</button>

		</form>
		
	</div>
	<br/>
	
	<?php

	$opt1 = $_POST['opt1'];
	$opt2 = $_POST['opt2'];
	$ip = $_POST['ip'];

	if(isset($_POST['submit1']) != NULL)
	{

		$ban = new Banip($opt1,$opt2,$ip);

		switch ($opt2){

			case 'banip': 
			?>

			<center><p class="alert-danger"><?php echo "IP :".$ban->banip($ssh)."Bloqueado !!!";?></p></center>

			<?php
			break;

			case 'unbanip':

			if(substr($ban->banip($ssh),0,5) == "ERROR"){

				?>


				<center><p class="alert-danger"><?php echo $ban->banip($ssh);?></p></center>

				<?php

			}else{

				?>

				<center><p class="alert-success"><?php echo $ban->banip($ssh)."Desbloqueado";?></p></center>

				<?php

			}

			break;
			case 'addignoreip':

			?>


			<center><p class="alert-success"><?php echo "IP :".$ban->banip($ssh)."Ignorado !!!";?></p></center>

			<?php

			break;

			default:

			exit;
		}
		

	}

	?>

	<div class="container">
		<p>ALTERAR TEMPO DE BLOQUEIO:</p>
		<form class="form-inline" action="" method="post">
			<div class="col-md-2">
				<select class="form-control" name="opt3">
					<option selected>Selecione o Serviço</option>
					<option value="asterisk">Asterisk</option>
					<option value="ssh">SSH</option>
				</select>
			</div>
			<div class="col-md-2">
				<input type="number" class="form-control" placeholder="Seconds " name="s">
			</div>


			<button type="submit" class="btn btn-primary" name="submit2">START</button>
		</form>

		<br/>
		<?php

		$service = $_POST['opt3'];
		$segundos = $_POST['s'];

		if(isset($_POST['submit2']) != NULL)

		{

			$time = new Bantime($service,$segundos);
			?>

			<center><p class="alert-success"><?php echo "Horario de Bloqueio atualizado para ".$time->defTime($ssh)."s";?></p></center>

			<?php

		}		

		?>
		<br/>
		<p>Listar Regras</p>
		<form class="form-inline" action="" method="post">
			<div class="col-md-2">
				<select class="form-control" name="opt4">
					<option selected>Selecione o Serviço</option>
					<option value="asterisk">Asterisk</option>
					<option value="ssh">SSH</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary" name="submit3">Listar</button>
		</form>

	</div>
	<br/>
	<?php

	$service1 = $_POST['opt4'];

	if(isset($_POST['submit3']) != NULL)

	{

		$list = new ListDrop($service1);

		?>

		<center><p class="alert-success"><?php

			echo '<pre>';

			echo $list->listRegra($ssh);


			echo '<pre>';

			?></p></center>

			<?php

		}


		?>

	</body>
	</html>


