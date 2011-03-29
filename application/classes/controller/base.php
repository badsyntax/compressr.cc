<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base extends Controller_Template {

	public $template = 'master_page';

	public function after()
	{
		if ($this->request->is_ajax())
		{
			$this->response->body($this->template->content);
		} 
		else 
		{
			parent::after();
		}
	}
}
