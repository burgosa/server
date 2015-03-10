@extends('app')

@section('content')

	<?php $select_array = App\Category::where('category_id','<>',1)->where('category_id','<>',0)->lists('name','id') ?>

	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<h4> <% $brand->name %></h4>  
				
			</div>
		</div>
		
		<hr>
		
		<ol class="breadcrumb">
		  	<li><a href="<% URL::to('catalog/brands') %>">Brands</a></li>
		  	<li><% $brand->name %></li>
		</ol>
		
		<hr>

		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">

					<div class="panel-heading"> 
						<% $brand->name %> 
						<div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    Actions
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                   <!--  <li><a href="#"></a></li>

                                    <li class="divider"></li> -->
                                    {!! Form::open(array('url' => 'catalog/products/' . $brand->id, 'style' => '  padding: 3px 10px;')) !!}
                    					{!! Form::hidden('_method', 'DELETE') !!}
                    					{!! Form::submit('Delete', array('class' => 'btn btn-link btn-sm')) !!}
                					{!! Form::close() !!}
                					
                                </ul>
                            </div>
                        </div>

					</div>

					<div class="panel-body">

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
						
						<form role="form" method="POST" action="/catalog/brands/<% $brand->id %>" accept-charset="UTF-8">
							
							<input type="hidden" name="_method" value="PATCH">
							<input type="hidden" name="_token" value="<% csrf_token() %>">

							<div>
								
							  	<div class="form-group">
							    	<label>Name</label>
							    	<input type="text" class="form-control" name="name" value="<% $brand->name %>">
							  	</div>

							  	<div class="form-group">
							    	<label>URL Slug</label>
							    	<input type="text" class="form-control" name="slug" value="<% $brand->slug %>">
							  	</div>
							  	
							  	<div class="form-group">
							    	<label>Description</label>
							    	<textarea class="form-control" rows="3" name="description" placeholder="Short Description (255)"><% $brand->description %></textarea>
							  	</div>


							</div>
							<hr>
							<div>

								<div class="checkbox">
							    	<label>
							    		@if($brand->is_active == 1)
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
						Created: <% $brand->created_at %>, by <% $brand->createdBy->email %><br>
						Last Update: <% $brand->updated_at %>, by <% $brand->updatedBy->email %>
						
					<div>
				</div>
			</div>
		</div>

	</div>


	<script>

	</script>
@endsection
