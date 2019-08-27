<?php

	function kode_random($legth) {

		$data = "123456789";
		$string = "PJ-";

		for ($i=0; $i < $legth ; $i++) { 
			$pos = rand(0,strlen($data)-1);
			$string .= $data{$pos};
		}

		return $string;
	}
	
		$kode = kode_random(10);

		
?>