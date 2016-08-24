<?php
/**
* @author Dwi Hujianto <dwi.hujianto@gmail.com>
*/

function parseCSV2JSON($filename)
{
	$data = [];
	
	$handle = fopen($filename, 'r');

	while (! feof($handle)) {
		$data[] = fgetcsv($handle);	
	}

	$maps = [];

	unset($data[0]);

	foreach ($data as $key => $value) {
		$maps[$value[0]] = [
			'Name' 		=> $value[1],
			'Address' 	=> [$value[2],$value[3]]
		];
	}

	return json_encode($maps);

	fclose($handle);
}


$json = parseCSV2JSON('manusia.csv');

echo $json;