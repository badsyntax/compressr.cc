<?php defined('SYSPATH') or die('No direct access allowed.');

abstract class Compressor_Compressor {

	protected $_config = array();

	protected $_default_config = array();

	protected $_in_filename;

	protected $_out_filename;

	protected $_compressed;

	public function __construct($config=array(), $code=NULL)
	{
		$this->_config = array_merge($this->_default_config, $config);

		do
		{
			$this->_in_filename = '/tmp/' . Text::random();
		}
		while (file_exists($this->_in_filename));

		do
		{
			$this->_out_filename = '/tmp/' . Text::random();
		}
		while (file_exists($this->_out_filename));

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

	abstract public function compress();

	public function config_values()
	{
		$options = array();
		foreach($this->_config as $key => $val)
		{
			if ($val !== FALSE AND $val !== NULL AND isset($this->_config_values[$key]))
			{
				$options[] = $this->_config_values[$key];
			}
		}
		return $options;
	}
}
