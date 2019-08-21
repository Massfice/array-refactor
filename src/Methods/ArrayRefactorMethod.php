<?php

namespace Massfice\ArrayRefactor\Methods;

interface ArrayRefactorMethod {
	
	public function refactor(array $array, array $args) : array;
	
}

?>