<?php

class UnidadeModel {

	public function verUnidades() {
		return ORM::for_table('unidades')->find_many();
	}

}