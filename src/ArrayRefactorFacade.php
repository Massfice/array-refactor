<?php

namespace ArrayRefactor;

class ArrayRefactorFacade {
	
	public static function singleRefactor(string $method, array $array, array $args = [], array $cond_pattern = ['AlwaysTrue' => []]) : array {
		
		$refactor = ArrayRefactory::createRefactor();
		$mode = ArrayRefactory::createMode('Single');
		$mode->set($cond_pattern);
		$method = ArrayRefactory::createMethod($method);
		
		return $refactor->refactor($mode,$method,$array,$args);
	}
	
	public static function filterRefactor(array $array, array $pattern = ['AlwaysTrue' => []]) : array {
		
		return self::singleRefactor('Filter',$array,$pattern);
		
	}
	
	public static function specifiedRefactor(string $method, array $array, array $specified, array $args = [], bool $reverse = true) : array {
		$refactor = ArrayRefactory::createRefactor();
		$mode = ArrayRefactory::createMode('Multi');
		$selector = ArrayRefactory::createSelector('Specified');
		$selector->set($specified);
		$mode->select($selector);
		$mode->reverse($reverse);
		$method = ArrayRefactory::createMethod($method);
		
		return $refactor->refactor($mode,$method,$array,$args);
	}
	
	public static function condRefactor(string $method, array $array, array $pattern, array $args = [], bool $reverse = true) {
		$refactor = ArrayRefactory::createRefactor();
		$mode = ArrayRefactory::createMode('Multi');
		$selector = ArrayRefactory::createSelector('Cond');
		$selector->set($array,$pattern);
		$mode->select($selector);
		$mode->reverse($reverse);
		$method = ArrayRefactory::createMethod($method);
		
		return $refactor->refactor($mode,$method,$array,$args);
	}
	
	public static function multiRefactor(string $method, array $array, array $args = [], bool $reverse = true) : array {
		$refactor = ArrayRefactory::createRefactor();
		$mode = ArrayRefactory::createMode('Multi');
		$mode->reverse($reverse);
		$method = ArrayRefactory::createMethod($method);
		
		return $refactor->refactor($mode,$method,$array,$args);		
	}
	
}

?>