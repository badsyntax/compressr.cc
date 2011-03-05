<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Template {

	public $template = 'master_page';

	public function action_index()
	{
		$this->template->title = __('Home');
		$this->template->content = View::factory( Kohana::$environment === Kohana::PRODUCTION ? 'coming_soon' : 'home')
			->bind('errors', $errors)
			->bind('compressors', $compressors)
			->bind('options_closure_compilation_levels', $options_closure_compilation_levels)
			->bind('options_closure_warning_levels', $options_closure_warning_levels);
		
		$data = Validation::factory($_POST);
		$data->rule('code', 'not_empty');

		$compressors = array(
			'closure' => 'Closure compiler',
			'yui' => 'YUI compressor',
			'packer' => 'PACKER',
			'uglify' => 'Uglify',
			'all' => 'All'
		);

		$options_closure_compilation_levels = array(
			'WHITESPACE_ONLY',
			'SIMPLE_OPTIMIZATIONS',
			'ADVANCED_OPTIMIZATIONS',
		);
		
		$options_closure_warning_levels = array(
			'QUIET',
			'DEFAULT',
			'VERBOSE'
		);

		if ($_POST)
		{
			if ($data->check())
			{
				$config = array();
				foreach($_POST as $key => $value)
				{
					if (strstr($key, 'option-'.$data['compressor']))
					{
						$config[str_replace('option-'.$data['compressor'].'-', '', $key)] = $value;
					}
				}
				
				$data['code'] = Compressor::factory($data['compressor'], $data['code'], $config)->compress();
			}
	
			if ($errors = $data->errors('compress'))
			{
				// Set the error flash message
				// Message::set(Message::ERROR, __('Please correct the errors.'));
			}
		}

		$_POST = $data->as_array();
	}
}
