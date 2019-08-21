<?php

namespace Massfice\ArrayRefactor\Modes;

interface ArrayRefactorMode {
	
	public function refactor(\Massfice\ArrayRefactor\Methods\ArrayRefactorMethod $method, array $array, array $args) : array;
	
}

?>