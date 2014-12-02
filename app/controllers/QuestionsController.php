<?php

class QuestionsController extends BaseController{

	//protected $layout = "layouts.default";
	public $restful = true;

	public function get_index() {

		return View::make('questions.index')
			->with('title', 'Make It Snappy Q&A - Home');
	}
}