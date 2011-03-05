<?php defined('SYSPATH') or die('No direct access allowed.');

class Compressor_Driver_Uglify extends Compressor_Compressor {

	protected $_config_values = array(
		'beautify' => '--beautify',
		'nomangle' => '--no-mangle',
		'nocopyright' => '--no-copyright' 
	);

	protected $_default_config = array(
		'beautify' => FALSE,
		'nomangle' => FALSE,
		'nocopyright' => FALSE
	);

	public function compress()
	{
		$path = '/home/richard/local/node/lib/node/uglify-js/bin/uglifyjs';

		$cmd = sprintf('%s --output %s %s %s',
			$path,
			escapeshellarg($this->_out_filename),
			implode(' ', parent::config_values()),
			escapeshellarg($this->_in_filename)
		);

		$this->_errors = `{$cmd}`;

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
