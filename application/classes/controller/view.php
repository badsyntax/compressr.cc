<?php defined('SYSPATH') or die('No direct script access.');

class Controller_View extends Controller {

	public function action_error()
	{
		$errors_view = View::factory('errors')
			->bind('errors', $errors);

		$errors = array();

		$this->response->body($errors_view);
	}
}
