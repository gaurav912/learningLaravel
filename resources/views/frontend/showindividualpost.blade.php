@extends('frontend.frontendmaster')

@section('blogcontents')

<div class="row postbackgroung">
	<div class="col-md-12 indimgblock">
		<div class="singlepostimg"><img src="/uploads/blog/image/{{$post->image}}" class="postimage"></div>
		<h2>{!! ucfirst($post->title) !!}</h2>
		<h5><b>{!! date('F d, Y',strtotime($post->created_at)) !!}</b></h5>
		<p>{!! $post->description !!}</p>
	</div>
</div>
@endsection


@section('latestposts')
@foreach($latestposts->slice(0,4) as $latestpost)
<a href="{{ route('post.show',$latestpost->id) }}"><div class="row indlatestpost">
	<div class="col-md-12">
		<img src="/uploads/blog/image/{{$latestpost->image}}" class="latestpostimg"><br/>
		{!! ucfirst($latestpost->title) !!}
	</div>
</div></a><br>
@endforeach
@endsection