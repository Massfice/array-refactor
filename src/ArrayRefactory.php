<?php

namespace Massfice\ArrayRefactor;

class ArrayRefactory {
	
	public static function createRefactor() : ArrayRefactor {
		return new ArrayRefactor();
	}
	
	public static function createChecker() : ArrayChecker {
		return new ArrayChecker();
	}
	
	public static function createMode(string $mode) : \Massfice\ArrayRefactor\Modes\ArrayRefactorMode {
		
		$mode_name = '\\Massfice\\ArrayRefactor\\Modes\\'.$mode;
		
		return new $mode_name();
		
	}
	
	public static function createMethod(string $method) : \Massfice\ArrayRefactor\Methods\ArrayRefactorMethod {
		
		$method_name = '\\Massfice\\ArrayRefactor\\Methods\\'.$method;
		
		return new $method_name();
		
	}
	
	public static function createSelector(string $selector) : \Massfice\ArrayRefactor\Selectors\ArraySelector {
		
		$selector_name = '\\Massfice\\ArrayRefactor\\Selectors\\'.$selector;
		
		return new $selector_name();
		
	}
	
	public static function createCheckerMethod(string $cheker_method) : \Massfice\ArrayRefactor\ArrayCheckerMethods\ArrayCheckerMethod {
		
		$cheker_method_name = '\\Massfice\\ArrayRefactor\\ArrayCheckerMethods\\'.$cheker_method;
		
		return new $cheker_method_name();
		
	}
	
}

?>