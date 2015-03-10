@if($errors->has())
<script> 
	$( document ).ready(function() {
		$('#myModal').modal('show');
	});
</script>
@foreach ($errors->all() as $message) 
<div class="alert alert-danger"><%$message%></div>
@endforeach
@endif

@if(Session::has('failure'))
<script> 
	$( document ).ready(function() {
		$('#myModal').modal('show');
	});
</script>
<div class="alert alert-danger"><%Session::get('failure')%></div>
@endif