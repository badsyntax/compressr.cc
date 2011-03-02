<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Template {

	public $template = 'master_page';

	public function action_index()
	{
		$this->template->title = __('Home');
		$this->template->content = View::factory('home')
			->bind('errors', $errors);

		$data = Validation::factory($_POST)
			->rule('code', 'trim')
			->rule('code', 'not_empty');

		if ($_POST)
		{
			if ($data->check())
			{
				// compress the code
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
