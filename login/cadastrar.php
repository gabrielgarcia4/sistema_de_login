<?php
require_once 'CLASSES/usuarios.php';
$u = new usuario;
?>

<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title>sistema de login</title>
	<link rel="stylesheet" href="/css/stylelogin.css">
</head>

<body>
	<div id="corpo-form">
		<h1>Cadastrar</h1>
		<form method="POST">
			<input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
			<input type="tel" pattern="[0-9]{2}[0-9]{9}" name="telefone" placeholder="Telefone" maxlength="11">
			<input type="email" name="email" placeholder="Email" maxlength="40">
			<input type="password" name="senha" placeholder="Senha" maxlength="15">
			<input type="password" name="confsenha" placeholder="Confirmar Senha" maxlength="15">
			<input type="submit" value="Cadastrar">
		</form>
	</div>

	<?php
	/*verificar se a clicou no botão*/
	if (isset($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$telefone = addslashes($_POST['telefone']);
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);
		$confirmarsenha = addslashes($_POST['confsenha']);
		/*verificar se esta tudo preenchido*/
		if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarsenha)) {
			$u->conectar("projeto_login10", "localhost", "root", "");
			if ($u->msgErro == "")/*tudo certo*/ {
				if ($senha == $confirmarsenha) {
					if ($u->cadastrar($nome, $telefone, $email, $senha)) {
						?>
						<div id="msg-sucesso">
						Cadastrado com sucesso. Acesse para entrar
						</div>
						<?php
					} else {
						?>
						<div class="msg-erro">
							Email ja cadastrado!
							</div>
						<?php
					}
				} else {
					?>
						<div class="msg-erro">
							Senha e confirmar senha não correspondem!
						</div>
						<?php
				}
			} else {
				?>
				<div class="msg-erro">
				<?php echo "ERRO: ". $u->$msgErro;?>
					 </div>
					 <?php
			}
		} else {
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