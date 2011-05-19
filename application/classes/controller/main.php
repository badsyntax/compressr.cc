<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller_Base {

	public function action_index()
	{
		$this->template->title = __('home');
		$this->template->content = View::factory('home')
			->set('compressors', Kohana::config('compressor.compressors'))
			->set('options_closure_compilation_levels', Kohana::config('compressor.options_closure_compilation_levels'))
			->set('options_closure_warning_levels', Kohana::config('compressor.options_closure_warning_levels'));

		$this->template->bind_global('errors', $errors);
		
		$data = Validation::factory($_POST);
		$data->rule('code', 'not_empty');

		if (!$_POST)
		{
			return;
		}

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
		
			$compressor = Compressor::factory($data['compressor'], $data['code'], $config);
			
			$data['code'] = $compressor->compress();
			$data['sizes'] = $compressor->get_sizes();
			$data['compressor_errors'] = $compressor->get_errors();
		}

		$errors = $data->errors('compress');

		$_POST = $data->as_array();

		if ($this->request->is_ajax())
		{
			$data = $data->as_array();

			$data['errors'] = $errors;

			$this->template->content = json_encode($data);

			$this->response->headers('Content-Type', 'application/json');
		}
	}
}
