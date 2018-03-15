<?php
for($i = 9; $i >= 1; $i--) {
	for($j = $i; $j >= 1; $j--) {
		echo "{$i}X{$j}=".$i*$j.' ';
	}
	echo '<br />';
}


for($i = 1; $i <= 9; $i++) {
	for($j = 1; $j <=$i; $j++) {
		echo "{$j}X{$i}=".$i*$j.' ';
	}
	echo '<br />';
}

?>
