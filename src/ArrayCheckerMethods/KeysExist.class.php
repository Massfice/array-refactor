<?php

namespace Massfice\ArrayRefactor\ArrayCheckerMethods;

class KeysExist implements ArrayCheckerMethod {
	
	public function check(array $array, array $args) : bool {
		
		foreach($args as $a) {
			
			if(!((is_string($a) || is_numeric($a)) && isset($array[$a]))) return false;
			
		}
		
		return true;
		
	}
	
}

?>