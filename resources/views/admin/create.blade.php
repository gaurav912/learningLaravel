@extends('admin.admin_template')

@section('pagetitle','Blog / Create')

@section('viewarea')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="/admin/blog/store" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" placeholder="Title" name="blogtitle">
				</div>
				<div class="form-group">
					<label for="desc">Description</label>
					<textarea name="blogdesc" id="desc" class="form-control my-editor"></textarea>

				</div> 
				<div class="form-group">
					<label for="image">Image</label>
					<input type="file" class="form-control" id="image"  name="postimage">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>


		</div>
	</div>
</div>

@endsection