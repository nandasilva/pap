<?php

class UsuarioModel {

	public function __construct(){
		return $this;
	}

	public static function verUsuarioID($idUsuario)
	{
		return ORM::for_table('usuarios')->where('IDUsuario', $idUsuario)->find_one();
	}

	public static function verUsuarioNome($nomeUsuario) {
		return ORM::for_table('usuarios')->where('NomeUsuario', $nomeUsuario)->find_one();
	}

	public static function verUsuarioEmailSenha($email, $senha)
	{
		return ORM::for_table('usuarios')->where('EmailUsuario', $email)->where('SenhaUsuario', sha1($senha))->find_one();
	}

	public static function countUsuarioEmailSenha($email, $senha)
	{
		return ORM::for_table('usuarios')->where('EmailUsuario', $email)->where('SenhaUsuario', sha1($senha))->count();
	}

	public static function novoUsuario($usuario) {
		$novoUsuario = ORM::for_table('usuarios')->create();

		$novoUsuario->NomeUsuario = $usuario->nomeUsuario;
		$novoUsuario->EmailUsuario = $usuario->emailUsuario;
		$novoUsuario->SenhaUsuario = $usuario->senhaUsuario;
		$novoUsuario->AvatarUsuario = $usuario->avatarUsuario;
		$novoUsuario->EnderecoUsuario = $usuario->enderecoUsuario;
		$novoUsuario->CepUsuario = $usuario->cepUsuario;
		// Ver como cadastrar a cidade 
	}


}