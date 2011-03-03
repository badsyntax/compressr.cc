<?php defined('SYSPATH') or die('No direct access allowed.');

class Compressor_Driver_Yui extends Compressor_Compressor {

	protected $_default_config = array(
		'type' => 'js'
	);

	public function compress()
	{
		$jar = APPPATH . 'vendor/yuicompressor/build/yuicompressor-2.4.2.jar';
		$cmd = sprintf('cat %s | java -jar %s --type %s', escapeshellarg($this->_filename), escapeshellarg($jar), escapeshellarg($this->_config['type']));
		$output = `{$cmd}`;
		return $output;
	}
}
