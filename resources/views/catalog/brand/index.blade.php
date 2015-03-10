@extends('app')

@section('content')

	<?php
		$status[0] = '<span class="label label-default">Innactive</span>';
		$status[1] = '<span class="label label-success">Active</span>';
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h4> Brands </h4>
			</div>
			<div class="col-md-6 text-right">
				<a class="btn btn-default" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-circle"></i> Brand</a>
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
							<th>Products</th>
							<th>Status</th>
							<th>created_at</th>
							<th>updated_at</th>
						</tr>
					</thead>
					<tbody>
						@foreach($brands as $brand)
						<tr>
							<td><% $brand->id %></td>
							<td><a href="<% URL::to('/catalog/brands/'.$brand->id) %>"><% $brand->name %></a></td>
							<td><% $brand->products->count() %></td>
							<td>{!! $status[$brand->is_active] !!}</td>
							<td><% $brand->created_at %></td>
							<td><% $brand->updated_at %></td>
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
		        		<h4 class="modal-title">Create New Brand</h4>
		      		</div>
		      		<div class="modal-body">

		      			@include('partial.error')
		        	
		      			<form  role="form" method="POST" action="/catalog/brands">

							<input type="hidden" name="_token" value="<% csrf_token() %>">

							<div class="form-group">
						    	<input type="text" class="form-control" name="name" placeholder="Brand Name">
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

@endsection
