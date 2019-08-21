<?php

namespace Massfice\ArrayRefactor\Methods;

class RenameKeys implements ArrayRefactorMethod {
	
	public function refactor(array $array, array $args) : array {
		
		foreach($array as $key => $item) {
			if(isset($args[$key]) && $args[$key] != null && is_string($args[$key]) && $args[$key] != '')
				$r_arr[$args[$key]] = $item;
			else $r_arr[$key] = $item;
		}
		
		return $r_arr;		
		
	}
	
}

?>