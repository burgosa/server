@extends('app')

@section('content')

	<? $select_array = App\Category::where('category_id','<>',1)->where('category_id','<>',0)->lists('name','id') ?>

	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<h4> <% $product->name %></h4>  
				
			</div>
		</div>
		<hr>
		<ol class="breadcrumb">
		  	<li><a href="<% URL::to('catalog/products') %>">Products</a></li>
		  	<li><% $product->name %></li>
		</ol>
		<hr>
		<?php if(isset($product->categories[0]->id)){ $selected_cat = $product->categories[0]->id; }else{ $selected_cat = 0; } ?>

		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">

					<div class="panel-heading"> <% $product->name %> </div>

					<div class="panel-body">

						@if($errors->has())
		      				<script> $('#myModal').modal('show');</script>
							@foreach ($errors->all() as $message) 
								<div class="alert alert-danger"><%$message%></div>
							@endforeach
						@endif

						@if(Session::has('failure'))
							<script> $('#myModal').modal('show');</script>
							<div class="alert alert-danger"><%Session::get('failure')%></div>
						@endif
						
						<form role="form" method="POST" action="/catalog/products/<% $product->id %>" accept-charset="UTF-8">
							
							<input type="hidden" name="_method" value="PATCH">
							<input type="hidden" name="_token" value="<% csrf_token() %>">

							<div>
								
								<div class="form-group">

							    	<label>Parent Category</label>
							    	
							    	{!! Form::select('category_id', [0 => 'Please Select One'] + $select_array , $selected_cat , ['class' => 'form-control']) !!}

							  	</div>
						

							  	<div class="form-group">
							    	<label>Name</label>
							    	<input type="text" class="form-control" name="name" value="<% $product->name %>">
							  	</div>

							  	<div class="form-group">
							    	<label>URL Slug</label>
							    	<input type="text" class="form-control" name="slug" value="<% $product->slug %>">
							  	</div>
							  	
							  	<div class="form-group">
							    	<label>Description</label>
							    	<textarea class="form-control" rows="3" name="description" placeholder="Short Description (255)"><% $product->description %></textarea>
							  	</div>

							  	<div class="form-group">
							    	<label>Price</label>
							    	<input type="text"  class="form-control" name="price" placeholder="Price (0.00)" value="<% $product->price %>">
							  	</div>

							</div>
							<hr>
							<div>

								<div class="checkbox">
							    	<label>
							    		@if($product->is_active == 1)
							      			<input type="checkbox" name="is_active" value="1" checked> Active
							      		@else
							      			<input type="checkbox" name="is_active" value="1"> Active
							      		@endif
							    	</label>
							  	</div>

							</div>
							<hr>
							<button type="submit" class="btn btn-primary">Save</button>

						</form>

						
					</div>
					<div class="panel-footer">	
						Created: <% $product->created_at %>, by <% $product->createdBy->email %><br>
						Last Update: <% $product->updated_at %>, by <% $product->updatedBy->email %>
					<div>
				</div>
			</div>
		</div>

	</div>


	<script>

	</script>
@endsection
