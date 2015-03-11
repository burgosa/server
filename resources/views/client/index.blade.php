@extends('app')

@section('content')


	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h4> Clients </h4>
			</div>
			<div class="col-md-6 text-right">
			
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<table class="table-condensed table" style="font-size:0.85em">
					<thead>
						<tr>
							<th>id</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>City</th>
							<th>created_at</th>
							<th>updated_at</th>
						</tr>
					</thead>
					<tbody>
						@foreach($clients as $client)
						<tr>
							<td><% $client->id %></td>
							<td><% $client->first_name %></td>
							<td><% $client->last_name %></td>
							<td><% $client->email %></td>
							<td><% $client->city %></td>
							<td><% $client->created_at %></td>
							<td><% $client->updated_at %></td>
						
						</tr>
						@endforeach
					</tbody>
				</table>
				
			</div>
		</div>

	
	</div>


	<script>

	</script>
@endsection
