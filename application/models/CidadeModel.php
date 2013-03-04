<?php

class CidadeModel {

	public static function verCidadeNome($nomeCidade) {
		return ORM::for_table('cidades')->where('NomeCidade', $nomeCidade)->find_one();
	}

	public static function novaCidade($cidade){
		
	}

}