<?php

	function arr_unique($arr2D){
		foreach ($arr2D as $v) {
			$v=join(',',$v);
			$temp[]=$v;
		}
		$temp=array_unique($temp);

		foreach ($temp as $k => $v) {
			$temp[$k]=explode(',',$v);

		}
		return $temp;
	}