<?php
require_once "core/init.php"; 

function regroupRecognizedWords($map_word){
	$array_rec = array(
		'Early bird' => 'early-bird',
		
	);
	foreach($array_rec As $recognized_key => $recognized_value)
		if(strpos($map_word, $recognized_key) !== false)
			$map_word = str_replace($recognized_key, $recognized_value, ($map_word));
	
	return $map_word;
}

echo regroupRecognizedWords('Early bird discounted rate Valid till 31st December 2021.
$450 from 1st January 2021 - 5th March 2022.');