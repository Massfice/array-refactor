<?php

namespace Massfice\ArrayRefactor;

class ArrayChecker {
	
	private function _AND(array $array, array $pattern, bool $negative) : bool {
		
		$b = true;
		
		foreach($pattern as $k => $p) {
			
			$b = $b && $this->proccessor($array,$p,$k);
			if(!$b) break;
		}
		
		return ($b && !$negative) || (!$b && $negative);
	}
	
	private function _OR(array $array, array $pattern, bool $negative) : bool {
		
		$b = false;

		foreach($pattern as $k => $p) {
			
			$b = $b || $this->proccessor($array,$p,$k);
			if($b) break;
		}

		return ($b && !$negative) || (!$b && $negative);
	}
	
	private function proccessor(array $array, array $pattern, string $method) : bool {
		
		$method = \explode('#',$method)[0];
		
		switch($method) {
			
			case 'AND':
				return $this->_AND($array,$pattern,false);
			case 'NAND':
				return $this->_AND($array,$pattern,true);
			case 'OR': 
				return $this->_OR($array,$pattern,false);
			case 'NOR':
				return $this->_OR($array,$pattern,true);
			default:
				$method = ArrayRefactory::createCheckerMethod($method);
				$args = (isset($pattern['args']) && is_array($pattern['args'])) ? $pattern['args'] : [];
				$b = $method->check($array,$args);
				$negative = (isset($pattern['negative']) && is_bool($pattern['negative'])) ? $pattern['negative'] : false;
				return ($b && !$negative) || (!$b && $negative);
			
		}
		
	}
	
	public function check($sth, array $pattern) : bool {
		
		if(!is_array($sth)) return false;
		
		return $this->proccessor($sth, $pattern[\array_keys($pattern)[0]], \array_keys($pattern)[0]);
			
	}
	
}

?>