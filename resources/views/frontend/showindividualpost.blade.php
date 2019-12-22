@extends('frontend.frontendmaster')

@section('blogcontents')

<div class="row postbackgroung">
	<div class="col-md-12 indimgblock">
		<h2>{{ $post->title }}</h2>
		<h5>created at: {{$post->created_at}}</h5>
		<div class="singlepostimg"><img src="{{ asset('frontend/images/banner1.jpg') }}" class="postimage"></div>
		<p>{{ $post->description}}</p>
	</div>
</div>
@endsection


@section('latestposts')
@foreach($latestposts as $latestpost)
<a href="{{ route('post.show',$latestpost->id) }}"><div class="row indlatestpost">
	<div class="col-md-12">
		<img src="{{ asset('frontend/images/banner1.jpg') }}" class="latestpostimg"><br/>
		{{ $latestpost->title }}
	</div>
</div></a><br>
@endforeach
@endsection