<?php

$app->get('/produto/novo', function() use($app) {

		$categorias = new Categoria();
		$unidades = new Unidade();

		$app->render('/produto/NovoProduto.php', array(
			'template' => array(
				'titulo' => 'Cadastrar Novo Produto'
			),
			'content' => array(
				'title' => 'Novo Produto'
			),
			'categorias' => $categorias->verCategorias(),
			'unidades' => $unidades->verUnidades()
		));
});

// Novo Produto
$app->get('/produto/:id_produto', function($idProduto) use ($app, $db) {

	$produto = new Produto();


	try {
		$produto = $produto->verProduto( (int) $idProduto );
	}
	catch ( Exception $e ) {
		$app->flash('error', $e->getMessage());
	}

	$app->render('/produto/VerProduto.php', array(
		'produto' => $produto,
		'template' => array(
			'titulo' => 'teste'
		),
		'content' => array(
			'title' => 'Editar Produto'
		)
	));
})->conditions(array('id_produto' => '[0-9]{1,}'));

$app->post('/produto', function() use($app) {

	$params = (object)$app->request()->post();

	$produto = new Produto();

	if ( $produto->verificaProdutoCodigoBarras($params->CodigoBarrasProduto) ) {
		echo 'existe';
	}
	else {
		$produto->NovoProduto($params);
	}
});
