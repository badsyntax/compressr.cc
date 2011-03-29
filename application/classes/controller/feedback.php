<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Feedback extends Controller_Base {

	public function action_index()
	{
		$this->template->title = __('feedback');
		$this->template->errors = NULL;
		$this->template->content = View::factory('feedback');
	}
}
