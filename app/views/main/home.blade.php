@extends('_tpls.main.tpl')

@section('title') Home @stop
@section('meta') @stop

@section('content')
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-6">
					<h3> Popular Topics </h3>
					<hr>
					<ul class="list-unstyled">
						@foreach ($popularTopics as $topic)
							<li> <a href="#"> {{ $topic->name }} </a> </li>
						@endforeach
					</ul>
				</div>

				<div class="col-md-6">
					<h3> Popular Authors </h3>
					<hr>
					<ul class="list-unstyled">
						@foreach ($popularAuthors as $author)
							<li> <a href="#"> {{ $author->name }} </a> </li>
						@endforeach
					</ul>
				</div>
			</div>

			<h3> Picture Quotes </h3>
			<hr>
			<div class="row">
				@foreach($pictureQuotes as $quote)
					<div class="col-md-6">
						<a href="#"> <img src="{{ $quote->photoURL }}" class="img-responsive"> </a>
					</div>
				@endforeach
			</div>

			<div class="row">				
				<div class="col-md-6">
					<h3> Authors to Explore </h3>
					<hr>

					<ul class="list-unstyled">
						@foreach($authorsToExplore as $author)
							<li> <a href="{{ route('authors.show', $author->id) }}"> {{ $author->name }} </a> </li>
						@endforeach
					</ul>
				</div>

				<div class="col-md-6">
					<h3> Topics to Explore </h3>
					<hr>

					<ul class="list-unstyled">
						@foreach($topicsToExplore as $topic)
							<li> <a href="{{ route('topics.show', $topic->id) }}"> {{ $topic->name }} </a> </li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<h3> Quote of the Moment </h3>
			<hr>

			<div class="panel panel-default">
				<div class="panel-body">
					<p> {{ $featuredQuote->content }} </p>

					<h4>
						&mdash;
						<a href="{{ route('authors.show', $featuredQuote->author->id) }}"> {{ $featuredQuote->author->name }} </a>
					</h4>
				</div>
			</div>

			<h3> Today's Birthdays </h3>
			<hr>
			<ul class="list-unstyled">
				@foreach ($recentlyUpdatedAuthors as $author)
					<li> {{ date('Y', $author->birth_date->timestamp) }} - <a href="#"> {{ $author->name }} </a> </li>
				@endforeach
			</ul>


			<h3> In The News </h3>
			<hr>
			<ul class="list-unstyled">
				@foreach($recentlyUpdatedAuthors as $author)
					<li> <a href="#"> {{ $author->name }} </a> </li>
				@endforeach
			</a>
		</div>
	</div>
@stop