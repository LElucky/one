<?php
function order($arr) {
	$length = count($arr);
	for($i = 0; $i < $length; $i++) {
		for($j = 0; $j < $length-$i-1; $j++) {
			if($arr[$j] > $arr[$j+1]) {
				$temp = $arr[$j];
				$arr[$j] = $arr[$j+1];
				$arr[$j+1] = $temp;
			}
		}
	}
	return $arr;
}
$arr = [1,2,3,5,8,8,4,5,6,3,2,4,5,88,22,11,33,99,7];
$order = order($arr);
print_r($order);

?>