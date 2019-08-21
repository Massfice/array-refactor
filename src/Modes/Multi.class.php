<?php

namespace Massfice\ArrayRefactor\Modes;

class Multi implements ArrayRefactorMode {
	
	protected $selected;
	protected $reverse;
	
	public function __construct() {
		$selector = ArrayRefactor\ArrayRefactory::createSelector('Blank');
		$this->select($selector);
		$this->reverse(true);
	}
	
	public function refactor(ArrayRefactor\Methods\ArrayRefactorMethod $method, array $array, array $args) : array {
		
		$cmethod = Massfice\ArrayRefactor\ArrayRefactory::createCheckerMethod('ValuesExist');
		
		foreach($array as $key => $item) {
			$b = $cmethod->check($this->selected,[$key]);
			if(($b && !$this->reverse) || (!$b && $this->reverse)) {
				$refactor = new Single();
				$r_array[$key] = $refactor->refactor($method,$item,$args);
			}
			else
				$r_array[$key] = $item;
		}
		
		return $r_array;
	}
	
	public function select(Massfice\ArrayRefactor\Selectors\ArraySelector $selector) {
		$this->selected = $selector->select();
	}
	
	public function reverse(bool $reverse) {
		$this->reverse = $reverse;
	}
	
}

?>