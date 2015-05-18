<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Eleição DCE</title>
</head>
<body>

<div id="container">
	<h1>Bem vindo a eleição!</h1>
	
	<?php if (isset($error)): ?>
		<?php echo $error; ?>
	<?php endif ?>

	<?php if (!isset($user)): ?>
		
	<form action="<?=base_url()?>login" method="POST">
		<input type="text" name="mat"> Matricula
		<input type="password" name="password"> Senha
		<button type="submit"> Enviar
	</form>	
	
	<?php else: ?>
		<?=$user->getMat();?>

	<?php endif ?>


</div>

</body>
</html>