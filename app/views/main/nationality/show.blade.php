@extends('_tpls.main.tpl')

@section('title') {{ $nationality->name }} authors @stop
@section('meta')
	<meta name="title" content="{{ $nationality->name }} authors">
	<meta name="keywords" content="{{ meta_nationality($nationality) }}">
	<meta property="og:title" content="{{ $nationality->name }} authors" />
@stop

@section('content')
	@if ( $nationality->authors->count() )
		<h3> {{ $nationality->name }} authors </h3>
		<hr>

		<ul class="list-unstyled gp-list">
			@foreach($nationality->authors as $author)
				<li> <a href="{{ route('authors.show', [$author->getIndex(), $author->getSlug()]) }}"> {{ $author->getName() }} </a> </li>
			@endforeach
		</ul>
	@else
		<h3> No {{ $nationality->name }} authors yet! </h3>
		<hr>
	@endif
@stop