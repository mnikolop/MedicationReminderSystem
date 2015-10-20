<?php

// Text file containing numbers to call

$filepath = 'numbers.txt';

// Save the phone numbers into the text file
// Raise an exception if the file can't be opened

function putNumbers($main, $contacts) {
	global $filepath;
	$f = fopen($filepath, "a");
	$numbers = $main;
	foreach($contacts as $number){
		if($number)
			$numbers .= "," . $number;
	}
	$numbers .= "\n";
	fwrite($f, $numbers);
	fclose($f);
}

// Get the contacts for a given number
// Returns NULL if the number is not found

function getNumbers($main) {
	global $filepath;
	$f = fopen($filepath, "r");
	while($l =  fgets($f)) {
		$numbers = explode(',',$l);
		if($main == array_shift($numbers)){
			return $numbers;
		}
	}
	return array();
}

