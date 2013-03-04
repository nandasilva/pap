<?php

/**
 * Index
 */
$app->get('/', function() use ($app) {

	// Verifica se sessão existe,
	// se existe o usuário será redirecionado
	if ( isset($_SESSION['IDUsuario']) && isset($_SESSION['NomeUsuario']) ) {
		$app->redirect('/painel');
	}

	// Chama a página
	$app->render('index/Login.php', array(
		'template' => array(
			'titulo' => 'WebSystems - Login',
			'files' => array(
				'js' => array(
					'plugins/forms/jquery.uniform.js',
					'files/login.js'
				)
			)
		)
	));
});