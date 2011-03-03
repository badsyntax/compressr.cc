<?php defined('SYSPATH') or die('No direct access allowed.');

abstract class Compressor_Compressor {

	protected $_config = array();

	protected $_default_config = array();

	protected $_code;

	protected $_filename;

	public function __construct($config=array(), $code=NULL)
	{
		$this->_config = array_merge($this->_default_config, $config);
		do
		{
			$this->_filename = '/tmp/' . Text::random();
		}
		while (file_exists($this->_filename));

		file_put_contents($this->_filename, $code);
	}

	public function __destruct()
	{
		try
		{
			unlink($this->_filename);
		}
		catch (Exception $e) {}
	}

	abstract public function compress();

	public function set_config($key, $value)
	{
		$this->_config[$key] = $value;
		return $this;
	}
}
