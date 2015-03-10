@extends('app')

@section('content')


	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<h4> Cities </h4>
				
			</div>
		</div>
		<hr>
		<ol class="breadcrumb">
		  <li><a href="<% URL::to('/cities') %>">Cities</a></li>
		  <li><% $city->name %></li>
		</ol>

		<hr>
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">

					<div class="panel-heading"> <% $city->name %> </div>

					<div class="panel-body">
						
						<form role="form" method="POST" action="/cities/<% $city->id %>" accept-charset="UTF-8">
							
							<input type="hidden" name="_method" value="PATCH">
							<input type="hidden" name="_token" value="<% csrf_token() %>">

							<div>

							  	<div class="form-group">
							    	<label>Name</label>
							    	<input type="text" class="form-control" name="name" value="<% $city->name %>">
							  	</div>

							  	<div class="form-group">
							    	<label>URL Slug</label>
							    	<input type="text" class="form-control" name="slug" value="<% $city->slug %>">
							  	</div>


							  	<div class="form-group">
							    	<label>Timezone</label>
							    	<input type="text" class="form-control" name="timezone" value="<% $city->timezone %>">
							  	</div>

							  	<div class="form-group">
							    	<label>Locale</label>
							    	<input type="text" class="form-control" name="locale" value="<% $city->locale %>">
							  	</div>

							</div>
							<hr>
							<div>

								<div class="checkbox">
							    	<label>
							    		@if($city->is_active == 1)
							      			<input type="checkbox" name="is_active" value="1" checked> Active
							      		@else
							      			<input type="checkbox" name="is_active" value="1"> Active
							      		@endif
							    	</label>
							  	</div>

							</div>
							<hr>
							<button type="submit" class="btn btn-default">Save</button>

						</form>
						
					</div>
					<div class="panel-footer">
						Created: <% $city->created_at %>, by <% $city->createdBy->email %><br>
						Last Update: <% $city->updated_at %>, by <% $city->updatedBy->email %>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
