<?php

class Compressor {

	public static function factory($type, $code=NULL, $config=array()){
		$compressor = 'Compressor_Driver_'.$type;
		return new $compressor($config, $code);
	}
}
