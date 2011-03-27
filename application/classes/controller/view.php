<?php defined('SYSPATH') or die('No direct script access.');

class Controller_View extends Controller {
	
	protected $view;

	public function after()
	{
		$this->response->body($this->view);
	}

	public function action_error()
	{
		$this->view = View::factory('errors')
			->set('errors', array());
	}

	public function action_info()
	{
		$this->view = View::factory('info')
			->set('info', array());
	}
}
