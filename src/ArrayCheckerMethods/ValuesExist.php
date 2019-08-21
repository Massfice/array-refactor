<?php

namespace Massfice\ArrayRefactor\ArrayCheckerMethods;

class ValuesExist implements ArrayCheckerMethod {
	
	public function check(array $array, array $args) : bool {
		
		foreach($args as $value) {
			
			$b = false;
			
			foreach($array as $a) {
				$b = $b || ($value === $a);
				if($b) break;
			}
			
			if(!$b) return false;
		}
		
		return true;
		
	}
	
}

?>