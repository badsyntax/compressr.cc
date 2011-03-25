<?php defined('SYSPATH') or die('No direct access allowed.');

abstract class Compressor_Compressor {

	protected $_config = array();

	protected $_default_config = array();

	protected $_in_filename;

	protected $_out_filename;

	protected $_compressed;

	protected $_errors = array();
	
	abstract public function compress();

	public function __construct($config=array(), $code=NULL)
	{
		$this->_config = array_merge($this->_default_config, $config);
		$this->_in_filename = $this->unique_tmp_filename();
		$this->_out_filename = $this->unique_tmp_filename();

		// Save the code in a tmp file
		file_put_contents($this->_in_filename, $code);
	}

	public function __destruct()
	{
		try
		{
			//unlink($this->_in_filename);
			//unlink($this->_out_filename);
		}
		catch (Exception $e) {}
	}
	
	private function unique_tmp_filename()
	{
		do
		{
			$filename = '/tmp/' . Text::random();
		}
		while (file_exists($filename));
	
		return $filename;
	}

	public function errors()
	{
		return $this->_errors;
	}

	public function config_values()
	{
		$config = array();
		foreach($this->_config as $key => $val)
		{
			if ($val !== FALSE AND $val !== NULL AND isset($this->_config_values[$key]))
			{
				$config[] = $this->_config_values[$key];
			}
		}
		return $config;
	}
}
