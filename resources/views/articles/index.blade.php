@extends('layout')

@section('content')


<div id="wrapper">
	@forelse($articles as $article)
	<div id="page" class="container">
		<div id="content">
			<div class="title">
			
			{{-- <a href="/articles/{{$article->id}}"><h2> {{$article->title}} </h2></a> --}}
			<a href="{{ route('articles.show',$article) }}"><h2> {{$article->title}} </h2></a>
			
			<span class="byline"></span> {{$article->excerpt}}</div>
			
			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			
			<p>{{$article->body}}</p>
			<p>{{$article->body}}</p>
			<p>{{$article->body}}</p>
			
		</div>
		
	</div>

	@empty
		<p>Sorry....No relevant articles ....</p>
</div>
@endforelse

@endsection