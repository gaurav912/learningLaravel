@extends('frontend.frontendmaster')


@section('blogcontents')

@foreach($posts as $post)
<div class="row indivpost">
	<div class="col-md-4 imgblock">
		<img src="{{ asset('frontend/images/banner1.jpg') }}" class="postimage">
	</div>
	<div class="col-md-8 descblock">
		<h2>{{ ucfirst($post->title) }}</h2>
		<h6><b>{{ date('F d, Y',strtotime($post->created_at)) }}</b></h6>
		<p><?php echo substr($post->description,0,210); ?>...</p>
		<a href="{{ route('post.show',$post->id) }}"><button class="btn btn-info">Read more</button></a>
	</div>
</div>
@endforeach
@endsection


@section('latestposts')
@foreach($latestposts as $latestpost)
<a href="{{ route('post.show',$latestpost->id) }}"><div class="row indlatestpost">
	<div class="col-md-12">
		<img src="{{ asset('frontend/images/banner1.jpg') }}" class="latestpostimg"><br/>
		{{ ucfirst($latestpost->title) }}
	</div>
</div></a><br>
@endforeach
@endsection