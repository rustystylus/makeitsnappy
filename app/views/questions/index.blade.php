@extends('layouts.default')

@section('content')
<div id="ask">
	<h1>Ask a Question</h1>

	@if(Auth::check())
		@if($errors->has())
			<p>The following errors have occurred:</p>
			<ul id="form-errors">
				{{ $errors->first('question', '<li>:message</li>')}}
			</ul>
		@endif

		{{ Form::open(array('url'=> 'ask')) }}

		{{ Form::token() }}

		<p>
			{{ Form::label('question', 'Question') }}<br />
			{{ Form::text('question', Input::old('question')) }}

			{{ Form::submit('Ask a Question') }}
		</p>

		{{ Form::close() }}
	@else
		<p>Please login to ask or answer questions.</p>		
	@endif
</div><!-- end ask -->
<div id="questions">
	<h2>Unsolved Questions</h2>

	@if(!$questions)
		<p>No questions have been asked.</p>
	@else
		<ul>
			@foreach($questions as $question)
				<li>
					{{ HTML::linkRoute('question', Str::limit($question->question, 35), $question->id) }} 
					by {{ ucfirst($question->user->username) }}
				</li>
			@endforeach

			{{ $questions->links() }}
		</ul>
	@endif
</div><!-- end questions -->
@endsection