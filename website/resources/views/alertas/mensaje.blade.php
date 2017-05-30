@if(Session::has('mensaje'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{Session::get('mensaje')}}
	</div>
@endif