<?php

function order($arr){
	$length = count($arr);
	for($j = 0; $j < $length; $j++) {
		for($i = 0; $i < $length-$j-1; $i++) {
			if($arr[$i] > $arr[$i+1]) {
				$temp = $arr[$i];
				$arr[$i] = $arr[$i+1];
				$arr[$i+1] = $temp;
			}
		}
	}
	return $arr;
}

$arr = [1,5,8,9,3,88,44,22,99,7,4,1];
$ord = order($arr);
print_r($ord);

?>