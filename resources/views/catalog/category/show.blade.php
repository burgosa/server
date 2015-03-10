@extends('app')

@section('content')
	
	<?php $select_array = App\Category::where('category_id',1)->orderBy('name','ASC')->lists('name','id') ?>

	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<h4> Categories </h4>
				
			</div>
		</div>
		<hr>
		<ol class="breadcrumb">
		  <li><a href="<% URL::to('catalog/categories') %>">Categories</a></li>
		  <li><% $category->name %></li>
		</ol>

		<hr>
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">

					<div class="panel-heading"> <% $category->name %> </div>

					<div class="panel-body">
						
						<form role="form" method="POST" action="/catalog/categories/<% $category->id %>" accept-charset="UTF-8">
							
							<input type="hidden" name="_method" value="PATCH">
							<input type="hidden" name="_token" value="<% csrf_token() %>">

							<div>

								<div class="form-group">

							    	<label>Parent Category</label>
							    	
							    	{!! Form::select('category_id',['1'=>'Store'] + $select_array , $category->category_id, ['class' => 'form-control']) !!}
							    	
							  	</div>

							  	<div class="form-group">
							    	<label>Name</label>
							    	<input type="text" class="form-control" name="name" value="<% $category->name %>">
							  	</div>

							  	<div class="form-group">
							    	<label>URL Slug</label>
							    	<input type="text" class="form-control" name="slug" value="<% $category->slug %>">
							  	</div>
							  	
							  	<div class="form-group">
							    	<label>Description</label>
							    	<textarea class="form-control" rows="3" name="description" placeholder="Short Description (255)"><% $category->description %></textarea>
							  	</div>

							</div>
							<hr>
							<div>

								<div class="checkbox">
							    	<label>
							    		@if($category->is_active == 1)
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
						Created: <% $category->created_at %>, by <% $category->createdBy->email %><br>
						Last Update: <% $category->updated_at %>, by <% $category->updatedBy->email %>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
