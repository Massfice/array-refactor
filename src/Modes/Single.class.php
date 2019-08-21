<?php

namespace Massfice\ArrayRefactor\Modes;

class Single implements ArrayRefactorMode {
	
	private $pattern;
	
	public function __construct() {
		$this->pattern = ['AlwaysTrue' => []];
	}
	
	public function refactor(Massfice\ArrayRefactor\Methods\ArrayRefactorMethod $method, array $array, array $args) : array {
		
		$checker = Massfice\ArrayRefactor\ArrayRefactory::createChecker();
		
		if($checker->check($array,$this->pattern)) return $method->refactor($array,$args);
		else return $array;
	}
	
	public function set(array $pattern) {
		$this->pattern = $pattern;
	}
	
}

?>