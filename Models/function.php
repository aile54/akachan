<?php
	function getArrayRandomNoRepeat($arrRand, $number) {
		$result = array();
		for($i=0;$i<$number;$i++) {
			$index = rand(0, count($arrRand) - 1 );
			$result[] = $arrRand[$index];
			unset($arrRand[$index]);
			sort($arrRand);
		}				
		return $result;
	}
?>