<?php

// Ver Produto
$app->get('/produto/:id_produto', function($idProduto) use ($app) {
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
			'titulo' => 'Produto - ' . $produto->NomeProduto
		)
	));
});


/**
 * Adicionar Produto
 */
$app->post('/produto', function() use ($app) {

});