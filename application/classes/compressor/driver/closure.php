<?php defined('SYSPATH') or die('No direct access allowed.');

class Compressor_Driver_Closure extends Compressor_Compressor {

	protected $_default_config = array(
		'compilation_level' => 'SIMPLE_OPTIMIZATIONS'
	);

	public function compress()
	{
		$jar = APPPATH . 'vendor/closure/build/compiler.jar';
		$cmd = sprintf('java -jar %s --js=%s', escapeshellarg($jar), escapeshellarg($this->_filename));
		$output = `{$cmd}`;
		die($output);
		return $output;
	}
}
