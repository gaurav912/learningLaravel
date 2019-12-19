@extends('admin.admin_template')
@section('pagetitle','Blog')

@section('viewarea')

<div class="container">
	<div class="row">
		<div class="col-md-12 ">
			<a href="/admin/blog/create"><button class="btn btn-info float-right">+Add Blog</button></a>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th>Title</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				@foreach($blogs as $blog)
				<tr>
					<td>{{$blog->title}}</td>
					<td>{{ \Illuminate\Support\Str::limit($blog->description, 90, $end='...') }}</td>
					<td>
						<div class="row">
							<div class="col-md-12">
								<a href="{{route('admin.blog.edit',$blog->id)}}"><button  class="btn btn-success"><i class="fa fa-pencil-square-o"></i></button></a>
								<button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#deltask{{$blog->id}}"><i class="fa fa-trash-o"></i></button>
							</div>
						</div>
					</td>
				</tr>
				<div class="modal" id="deltask{{$blog->id}}">
				    <div class="modal-dialog">
				    	<div class="modal-content">
					      	<form name="deleteTask" action="/admin/blog/delete/{{$blog->id}}" method="post">
					      		@csrf
					      		<!-- Modal body -->
						        <div class="modal-body">
						          Are you sure you want to delete?
						        </div>
						        <!-- Modal footer -->
						        <div class="modal-footer">
						          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
						          <button  class="btn btn-danger" >
						          	Yes, Delete
						          </button>
								</div>
					      	</form>
				    	</div>
					</div>
				</div>
				@endforeach
			</table>			
		</div>
	</div>
</div>

@endsection
