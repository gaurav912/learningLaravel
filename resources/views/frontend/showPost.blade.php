@extends('frontend.frontendmaster')


@section('blogcontents')

@foreach($posts as $post)
<div class="card">
	<h2>{{ $post->title }}</h2>
	<h5>created at: {{$post->created_at}}</h5>
	<div class="fakeimg"><img src="{{ asset('frontend/images/banner1.jpg') }}" class="postimage"></div>
	<p>{{ $post->description}}</p>
	<a href="#"><button class="btn btn-info">Read more</button></a>
</div>
@endforeach
@endsection


@section('latestposts')
@foreach($latestposts as $latestpost)
<div class="sidefakeimg">
	{{ $latestpost->title }}
</div><br>
@endforeach
@endsection