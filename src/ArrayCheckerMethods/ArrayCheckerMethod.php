<?php

namespace Massfice\ArrayRefactor\ArrayCheckerMethods;;

interface ArrayCheckerMethod {
	
	public function check(array $array, array $args) : bool;
	
}

?>