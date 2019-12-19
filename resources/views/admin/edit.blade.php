@extends('admin.admin_template')

@section('pagetitle','Blog / Edit')

@section('viewarea')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="/admin/blog/update" method="post">
				@csrf
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" placeholder="Title" name="blogtitle" value="{{ $post->title }}">
				</div>
				<input type="hidden" name="id" value="{{$post->id}}"/>
				<div class="form-group">
					<label for="desc">Description</label>
					<textarea class="form-control" rows="5" id="desc" name="blogdesc">{{ $post->description }} </textarea>
				</div> 
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>

@endsection