@extends('app')

@section('content')

	<?php
		$select_array = App\Category::orderBy('name','ASC')->lists('name','id');
		$status[0] = '<span class="label label-default">Innactive</span>';
		$status[1] = '<span class="label label-success">Active</span>';
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h4> Products </h4>
			</div>
			<div class="col-md-6 text-right">
				<a class="btn btn-default" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-circle"></i> Product</a>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<table class="table-condensed table" style="font-size:0.85em">
					<thead>
						<tr>
							<th>id</th>
							<th>Name</th>
							<th>Category</th>
							<th>Brand</th>
							<th>Price</th>
							<th>Status</th>
							<th>created_at</th>
							<th>updated_at</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr>
							<td><% $product->id %></td>
							<td><a href="<% URL::to('catalog/products/'.$product->id) %>"><% $product->name %></a></td>
							<td>
								@foreach($product->categories as $category)
									<% $category->name %></a>
								@endforeach
							</td>
							<td>
								@foreach($product->brand as $brand)
									<% $brand->name %></a>
								@endforeach
								
							</td>
							<td><% $product->price %></td>
							<td>{!! $status[$product->is_active] !!}</td>
							<td><% $product->created_at %></td>
							<td><% $product->updated_at %></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
			</div>
		</div>

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        		<h4 class="modal-title">Create New Product</h4>
		      		</div>
		      		<div class="modal-body">

		      			@include('partial.error')
		        	
		      			<form  role="form" method="POST" action="/catalog/products">

							<input type="hidden" name="_token" value="<% csrf_token() %>">

							<div class="form-group">
						    	<input type="text" class="form-control" name="name" value="<% old('name') %>" placeholder="Product Name">
						  	</div>

						  	<div class="form-group">

						    	<label for="exampleInputPassword1">Parent Category</label>
						    	
						    	{!! Form::select('category_id', ['1'=>'Store'] + $select_array , null, ['class' => 'form-control']) !!}
						  	
						  	</div>
						  
		      				<button class="btn btn-default">Create</button>

		      			</form>

		      		</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		      		</div>
		    	</div><!-- /.modal-content -->
		  	</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->


	</div>


	<script>

	</script>
@endsection
