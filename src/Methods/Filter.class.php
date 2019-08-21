<?php

namespace Massfice\ArrayRefactor\Methods;

class Filter implements ArrayRefactorMethod {
	
	public function refactor(array $array, array $args) : array {
		
		$checker = Massfice\ArrayRefactor\ArrayRefactory::createChecker();
		
		$r_arr = [
			'Correct' => [],
			'Incorrect' => [],
			'Non' => []
		];
		
		foreach($array as $k => $a) {
			
			if(!is_array($a)) $r_arr['Non'][$k] = $a;
			else {
				
				if($checker->check($a,$args)) $r_arr['Correct'][$k] = $a;
				else $r_arr['Incorrect'][$k] = $a;
				
			}
			
		}
		
		return $r_arr;		
		
	}
	
}

?>