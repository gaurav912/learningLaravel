@extends('frontend.frontendmaster')
@section('blogcontents')

@foreach($posts as $post)
<div class="row indivpost">
	<div class="col-md-4 imgblock">
		<img src="/uploads/blog/image/{{$post->image}}" class="postimage">
	</div>
	<div class="col-md-8 descblock">
		<h2>{!! ucfirst($post->title) !!}</h2>
		<h6><b>{!! date('F d, Y',strtotime($post->created_at)) !!}</b></h6>
		<p><?php echo substr($post->description,0,210); ?>...</p>
		<a href="{{ route('post.show',$post->id) }}"><button class="btn btn-info">Read more</button></a>
	</div>
</div>
@endforeach
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

@section('ads')
<div class="row">
	<div class="col-md-12">
			
	</div>
</div>
@endsection

@endsection