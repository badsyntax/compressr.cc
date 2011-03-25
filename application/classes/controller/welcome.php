<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Template {

	public $template = 'master_page';


	public function after()
	{
		if ($this->request->is_ajax())
		{
			// Use the template content as the response
			$this->response->body($this->template->content);
		} 
		else 
		{
			parent::after();
		}
	}


	public function action_index()
	{
		$this->template->title = __('home');
		$this->template->content = View::factory( Kohana::$environment === Kohana::PRODUCTION ? 'coming_soon' : 'home')
			->bind('errors', $errors)
			->bind('compressors', $compressors)
			->bind('options_closure_compilation_levels', $options_closure_compilation_levels)
			->bind('options_closure_warning_levels', $options_closure_warning_levels);
		
		$data = Validation::factory($_POST);
		$data->rule('codetext', 'not_empty');

		$compressors = array(
			'closure' => 'Closure compiler',
			'yui' => 'YUI compressor',
			'uglify' => 'Uglify',
			//'packer' => 'PACKER',
			//'all' => 'All'
		);

		$options_closure_compilation_levels = array(
			'WHITESPACE_ONLY' => 'WHITESPACE_ONLY',
			'SIMPLE_OPTIMIZATIONS' => 'SIMPLE_OPTIMIZATIONS',
			'ADVANCED_OPTIMIZATIONS' => 'ADVANCED_OPTIMIZATIONS',
		);
		
		$options_closure_warning_levels = array(
			'QUIET' => 'QUIET',
			'DEFAULT' => 'DEFAULT',
			'VERBOSE' => 'VERBOSE'
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
				
				$compressor = Compressor::factory($data['compressor'], $data['codetext'], $config);
				
				$data['codetext'] = $compressor->compress();
				//$data['errors'] = $compressor->errors();
			}
	
			if ($errors = $data->errors('compress'))
			{
				// Set the error flash message
				// Message::set(Message::ERROR, __('Please correct the errors.'));
			}

			$_POST = $data->as_array();

			if ( $this->request->is_ajax() )
			{
				$data = $data->as_array();
				$data['errors'] = $errors;
				$this->template->content = json_encode($data);

				$this->response->headers('Content-Type', 'application/json');
			}
		}
	}
}
