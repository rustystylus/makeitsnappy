<?php

class Question extends Basemodel {

	public static $rules = array(
		'question'=>'required|min:10|max:255',
		'solved'=>'in:0,1'
	);

	public function user() {
		return $this->belongsTo('User');
	}

	public static function unsolved() {
		return static::where('solved', '=', '0')->orderBy('id','DESC')->paginate(3);
	}

	//protected $table = 'questions';
}