<?php

namespace Massfice\ArrayRefactor;

class ArrayRefactor {
	
	public function refactor(
		\Massfice\ArrayRefactor\Modes\ArrayRefactorMode $mode,
		\Massfice\ArrayRefactor\Methods\ArrayRefactorMethod $method,
		array $array,
		array $args = []
	) : array {
		
		return $mode->refactor($method, $array, $args);
		
	}

}

?>