<?php

class Usuario {

	// Métodos
	public function novoUsuario($usuario)
	{
				$nomeUsuario = $usuario->nomeUsuario;

		if ($this->verUsuarioNome($nomeUsuario)) {
			throw new Exception('Usuário cadastrado');
		} else {
			// pegar o ID da cidade
			return UsuarioModel::novoUsuario($usuario);
		}
	}

	public function excluirUsuario($idUsuario)
	{

	}

	/**
	 * Retorna os dados de um usuário passando o ID do mesmo
	 * @param  int $idUsuario 	ID do usuário
	 * @return object           Retorna o usuário em forma de objeto
	 */
	public function verUsuarioID($idUsuario)
	{
		if ( !is_int($idUsuario) ) {
			throw new Exception('O ID do usuário deverá ser inteiro');
		}

		if ( !$this->verificaUsuarioExisteID($idUsuario) ) {
			throw new Exception('Usuário não existe');
		}

		return UsuarioModel::verUsuarioID((int) $idUsuario);
	}

	public function verUsuarioEmailSenha($email, $senha)
	{
		if ( !$this->verificaUsuarioEmailSenha($email, $senha) ) {
			throw new Exception('Usuário não existe');
		}

		return UsuarioModel::verUsuarioEmailSenha($email, $senha);
	}

	public function verificaUsuarioEmailSenha($email, $senha) {
		return (UsuarioModel::countUsuarioEmailSenha($email, $senha) > 0);
	}

	public function verificaUsuarioID($idUsuario)
	{
		return (count(UsuarioModel::verUsuarioPorID((int) $idUsuario)) > 0);
	}

	public function atualizarUsuario($usuario)
	{

	}

}