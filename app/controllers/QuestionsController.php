<?php

class QuestionsController extends BaseController{

	//protected $layout = "layouts.default";
	public $restful = true;

	public function __construct() {
		$this->beforeFilter( 'auth', array('only'=>'create'));
	}

	public function get_index() {

		return View::make('questions.index')
			->with('title', 'Make It Snappy Q&A - Home')
			->with('questions', Question::unsolved());
	}

	public function post_create() {
		$validation = Question::validate(Input::all());

		if( $validation->passes() ) {
			$question = new Question;
			$question->question = Input::get('question');
			$question->user_id = Auth::user()->id;
			$question->save();
			

			return Redirect::to('home')
				->with('message', 'Your question has been posted');
		} else {
			return Redirect::to('home')->withErrors($validation)->withInput();
		}
	}

	public function get_view( $id = null) {
		return View::make('questions.view')
				->with('title', 'Make it Snappy - View Question')
				->with('question', Question::find($id));
	}
}