<?php

namespace  Massfice\ArrayRefactor\Selectors;

class Blank implements ArraySelector {
	
	protected $selected;
	
	public function __construct() {
		$this->selected = [];
	}
	
	public function select() : array {
		return $this->selected;
	}
	
}

?>