@if(Session::has('mensaje'))
	<div>
		<button>X</button>
		{{Session::get('mensaje')}}
	</div>
@endif