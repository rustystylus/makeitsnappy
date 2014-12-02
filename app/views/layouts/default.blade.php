<!DOCTYPE html>
<html>
<head>
		<title>{{ $title }}</title>
		{{ HTML::style('/css/main.css') }}
</head>

<body>
	<div id="container">
		<div id="header">
			{{ HTML::link('/', 'Make it snappy Qanda') }}			
		</div> <!--header-->

		<div id="nav">
			<ul>
				<li>{{ HTML::linkRoute('home', 'Home')}}</li>
				<li>{{ HTML::linkRoute('register', 'Register')}}</li>
				<li>{{ HTML::link('/', 'Login')}}</li>
			</ul>
		</div><!-- end nav -->

		<div id="content">
			@if(Session::has('message'))
				<p id="message">{{ Session::get('message') }}</p>
			@endif
			
			@yield('content')
		</div> <!-- end content -->

		<div id="footer">
			&copy; Make It Snappy Q&A {{ date('Y') }}
		</div><!-- end footer -->
	</div><!-- end container -->

</body>
</html>