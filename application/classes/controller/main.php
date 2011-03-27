<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller_Template {

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
		$this->template->content = View::factory(Kohana::$environment === Kohana::PRODUCTION ? 'coming_soon' : 'home')
			->set('compressors', Kohana::config('compressor.compressors'))
			->set('options_closure_compilation_levels', Kohana::config('compressor.options_closure_compilation_levels'))
			->set('options_closure_warning_levels', Kohana::config('compressor.options_closure_warning_levels'));

		$this->template->content->bind_global('errors', $errors);
		
		$data = Validation::factory($_POST);
		$data->rule('codetext', 'not_empty');

		if (!$_POST) return;

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
			$data['sizes'] = $compressor->get_sizes();

			if (!$data['compressor_errors'] = (array) $compressor->get_errors())
			{
				unset($data['compressor_errors']);
			}
		}

		$errors = $data->errors('compress');

		$_POST = $data->as_array();

		if ($this->request->is_ajax())
		{
			$data = $data->as_array();

			if (!$data['errors'] = (array) $errors)
			{
				unset($data['errors']);
			}

			$this->template->content = json_encode($data);

			$this->response->headers('Content-Type', 'application/json');
		}
	}
}
