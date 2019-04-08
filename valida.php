<?php
	// Incluindo a conexão com banco de dados
	include 'assets/includes/conexao.php';
	
	$Usuario = trim(addslashes($_POST["usuario"]));
	$Senha = trim(addslashes($_POST["senha"]));
	
	// Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
	$resultado = "SELECT * FROM tbl_cadastro WHERE (Usuario='$Usuario') AND (Senha='$Senha') LIMIT 1";
	$resultado = mysqli_query($ligacao, $resultado);
	$resultado = mysqli_fetch_assoc($resultado);

	if($resultado==true){

		// CRIANDO SESSÃO PARA USAR EM OUTRAS PÁGINAS COMO O NOME NA LEFT COLUNM
		$_SESSION['auth'] = true;
		$_SESSION['senhaId'] = $resultado['Senha'];
		$_SESSION['usuarioId'] = $resultado['CodiUsuario'];
		$_SESSION['usuarioNome'] = $resultado['Usuario'];
		// $_SESSION['foto'] = $resultado['Foto'];
		
		// Retirar após reorganização do código
		$_SESSION['id'] = $resultado['CodiUsuario'];
		
		// Auditoria do Sistema, cadastrar acessos no sistema  
		$ip = getenv("REMOTE_ADDR");
		$id = $_SESSION['usuarioId'];

		require_once 'blog.php';
		die();
	
	}else{ //O campo usuário e Senha não preenchido entra no else e redireciona o usuário para a página de login
		
		$_SESSION['loginErro'] = "Usuário ou Senha inválido";
		require_once 'login.php';
	
	}   
?>