<?php
require_once 'CLASSES/usuarios.php';
$w = new usuario;
?>

<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title>sistema de login</title>
	<link rel="stylesheet" href="/css/stylelogin.css">
</head>

<body>
	<div id="corpo-form">
		<h1>Entrar</h1>
		<form method="POST">
			<input type="email" placeholder="Email" name="email">
			<input type="password" placeholder="senha" name="senha">
			<input type="submit" value="Acessar">
			<a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se</strong>



		</form>
	</div>
	<?php
	if (isset($_POST['email']))
	 {
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);
	
		if (!empty($email) && !empty($senha)) 
{
		
		$w->conectar("projeto_login10", "localhost", "root", "");
		if ($w->msgErro == "") 
		{
			if($w->logar($email,$senha))
			{
				header("location: areaPrivada.php");
			}
			 else 
			{
				?>
				<div class="msg-erro">
				Email e/ou senha estão incorretos!
				</div>
				<?php
			}
		}
		else
		{
			?>
				<div class="msg-erro">
				<?php echo "Erro: ".$u->msgErro; ?>
				</div>
				<?php
		
		}
	} else 
	
	{
		?>
		<div class="msg-erro">
		Preencha todos os campos!
		</div>
		<?php
	}
		
	
}

	?>
</body>

</html>