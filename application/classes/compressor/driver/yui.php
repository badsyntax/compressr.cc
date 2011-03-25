<?php defined('SYSPATH') or die('No direct access allowed.');

class Compressor_Driver_Yui extends Compressor_Compressor {

	protected $_default_config = array(
		'type' => 'js'
	);

	public function compress()
	{
		$jar = APPPATH . 'vendor/yuicompressor/build/yuicompressor-2.4.2.jar';

		// stderr will be redirected to stdout
		$cmd = sprintf('java -jar %s %s --type %s -o %s 2>&1',
			escapeshellarg($jar), 
			escapeshellarg($this->_in_filename), 
			escapeshellarg($this->_config['type']),
			escapeshellarg($this->_out_filename)
		);

		exec($cmd, $this->_errors);

		try
		{
			$this->_compressed = file_get_contents($this->_out_filename);

		}
		catch(ErrorException $exception)
		{
			$this->_compressed = '';
		}

		return $this->_compressed;
	}
}
