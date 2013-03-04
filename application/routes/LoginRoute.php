<?php

/**
 * Faz a autenticação do usuário
 * Recebe valores de email e senha via post
 * A @var $status serve para enviar informações para o AJAX
 */
$app->post('/login/autenticar', function() use($app) {

	// Recebe os parametros via post
	$email = $app->request()->post('email');
	$senha = $app->request()->post('senha');
	$status = array();

	// Filtra o email
	if ( filter_var($email, FILTER_VALIDATE_EMAIL) ) {
		// Verifica o tamanho da senha
		if ( strlen($senha) >= 6 && strlen($senha) <= 20 ) {
			// Instancia novo usuário
			$usuario = new Usuario();

			// Verifica se usuario existe
			if ( $usuario->verificaUsuarioEmailSenha($email, $senha) ) {
				// Faz autenticação do usuário
				$usuarioAutenticado = $usuario->verUsuarioEmailSenha($email, $senha);

				$status['code'] = 200;
				$status['message'] = 'Bem-vindo ' . $usuarioAutenticado->NomeUsuario . '. Você será redirecionado';
				$status['avatar'] = $usuarioAutenticado->AvatarUsuario;

				$_SESSION['NomeUsuario'] = $usuarioAutenticado->NomeUsuario;
				$_SESSION['AvatarUsuario'] = $usuarioAutenticado->AvatarUsuario;
				$_SESSION['EmailUsuario'] = $usuarioAutenticado->EmailUsuario;
				$_SESSION['IDUsuario'] = $usuarioAutenticado->IDUsuario;

				$usuarioAutenticado = null;
			}
			else {
				$status['code'] = 300;
				$status['message'] = 'Nenhum usuário foi encontrado. Verifique se digitou corretamente seus dados';
			}
		}
		else {
			$status['code'] = 300;
			$status['message'] = 'Sua senha deve ser maior que 6 e menor que 20 caracteres';
		}
	}
	else {
		$status['code'] = 300;
		$status['message'] = 'Por favor, insira um email válido';
	}

	// Envia para o AJAX o status via JSON
	echo json_encode($status);
});


/**
 * Deslogar, sair do sistema
 * Faz o desligamento do usuário
 */
$app->get('/login/deslogar', function() use($app) {
	// Destrói todas as sessões
	unset($_SESSION['IDUsuario']);
	unset($_SESSION['NomeUsuario']);
	unset($_SESSION['EmailUsuario']);
	unset($_SESSION['AvatarUsuario']);

	$app->redirect('/');
});