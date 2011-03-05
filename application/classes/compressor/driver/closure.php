<?php defined('SYSPATH') or die('No direct access allowed.');

class Compressor_Driver_Closure extends Compressor_Compressor {

        protected $_config_values = array(
                'pretty_print' => '--formatting PRETTY_PRINT',
        );

	protected $_default_config = array(
		'compilation_level' => 'SIMPLE_OPTIMIZATIONS',
		'warning_level' => 'DEFAULT',
		'pretty_print' => FALSE
	);

	public function compress()
	{
		$jar = APPPATH . 'vendor/closure/build/compiler.jar';
		$cmd = sprintf('java -jar %s --compilation_level %s --warning_level %s %s --js %s --js_output_file %s', 
			escapeshellarg($jar), 
			escapeshellarg($this->_config['compilation_level']),
			escapeshellarg($this->_config['warning_level']),
			implode(' ', parent::config_values()),
			escapeshellarg($this->_in_filename),
			escapeshellarg($this->_out_filename)
		);

		$this->_errors = `{$cmd}`;
		$this->_compressed = file_get_contents($this->_out_filename);

		return $this->_compressed;
	}
}
