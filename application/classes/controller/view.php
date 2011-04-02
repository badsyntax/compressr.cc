<?php defined('SYSPATH') or die('No direct script access.');

class Controller_View extends Controller {
	
	protected $view;

	public function after()
	{
		$this->response->body($this->view);
	}

	public function action_messages()
	{
		$this->view = View::factory('messages')
			->set('info', array());
	}
}
