
@extends('admin.admin_template')
@section('pagetitle','Blog')

@section('viewarea')
<style>
	.user-image{
		height:50px;
		width: 50px;
	}
</style>

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
						<th>Thumbnail</th>
						<th>Action</th>
					</tr>
				</thead>
				@foreach($blogs as $blog)
				<tr>
					<td>{!!\Illuminate\Support\Str::limit($blog->title,30,$end='...')!!}</td>
					<td>{!!\Illuminate\Support\Str::limit($blog->description, 80, $end='...') !!}</td>
					<td><img src="/uploads/blog/image/{{$blog->image}}" class="user-image"></td>
					<td>
						<div class="row">
							<div class="col-md-12">
								<button  type="button" class="btn btn-info" data-toggle="modal" data-target="#showpost{{$blog->id}}"><i class="fa fa-eye"></i></button>
								<a href="{{route('admin.blog.edit',$blog->id)}}"><button  class="btn btn-success"><i class="fa fa-pencil-square-o"></i></button></a>
								<button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#deltask{{$blog->id}}"><i class="fa fa-trash-o"></i></button>
							</div>
						</div>
					</td>
				</tr>
				<!-- ------------------------ Modal for Delete Confirmation --------------------- -->
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
				<!-- ------------------------ Modal for Show Post --------------------- -->
				<div class="modal" id="showpost{{$blog->id}}">
				    <div class="modal-dialog">
				    	<div class="modal-content">
					      	<form name="showPost" action="/admin/blog/show/{{$blog->id}}" method="post">
					      		@csrf
					      		<!-- Modal Header -->
						        <div class="modal-header">
						          <h1 class="modal-title">{!!$blog->title!!}</h1>
						          <button type="button" class="close" data-dismiss="modal">×</button>
						        </div>
					      		<!-- Modal body -->
						        <div class="modal-body">
						          {!! $blog->description !!}
						        </div>
						        <!-- Modal footer -->
						        <div class="modal-footer">
						          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
								</div>
					      	</form>
				    	</div>
					</div>
				</div>
				@endforeach
			</table>
			<br/>
			<div>
				{{$blogs->links()}}			
			</div>
		</div>
	</div>
</div>

@endsection
