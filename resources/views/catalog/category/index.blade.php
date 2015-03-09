@extends('app')

@section('content')

	<div class="container-fluid">

		<div class="row">
			<div class="col-md-6">
				<h4> Categories </h4>
			</div>
			<div class="col-md-6 text-right">
				<a class="btn btn-default" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-circle"></i> Category</a>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">Categories Tree</div>
					<div class="panel-body">
						<p>
							<ul class="list-unstyled">
		  						<li>Store</li>
		  						<? $subcats = App\Category::where('category_id',1)->get(array('id', 'name'))?>
		  						<ul>
		  							@foreach($subcats as $subcat)

		  								<li> <a href="<% URL::to('/catalog/categories/'.$subcat->id) %>"><% $subcat->name %></a></li>
		  								<? $subcats2 = App\Category::where('category_id',$subcat->id)->get(array('id', 'name'))?>
		  								<ul>
		  									@foreach($subcats2 as $subcat2)
		  									<li> <a href="<% URL::to('/catalog/categories/'.$subcat2->id) %>"><% $subcat2->name %></a></li>
		  									@endforeach
		  								</ul>
		  							@endforeach
		  						</ul>
							</ul>
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        		<h4 class="modal-title">Create New Category</h4>
		      		</div>
		      		<div class="modal-body">

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
		        	
		      			<form  role="form" method="POST" action="/catalog/categories">

							<input type="hidden" name="_token" value="<% csrf_token() %>">

							<div class="form-group">
						    	<input type="text" class="form-control" name="name" placeholder="Category Name">
						  	</div>

						  	<div class="form-group">
						    	<label for="exampleInputPassword1">Parent Category</label>
						    	
						    	<select name="category_id" class="form-control">
								  	
								  	<? $categories = App\Category::where('category_id',1)->get(array('name','id'))?>
								  	<option value="1">Store</option>
								  	@foreach($categories as $category)
								  		<option value="<% $category->id %>"><% $category->name %></option>
								  	@endforeach
								  	
								</select>
						  	
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
