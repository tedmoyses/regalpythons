
@extends('layout')

@section('title', 'index page')

@section('content')

<?php
$client = new \Contentful\Delivery\Client($contentfulApiKey, $contentfulSpaceId, $contentfulEnvironment);

$query = new \Contentful\Delivery\Query();
$query->setContentType('homepage');

$content = $client->getEntries($query);

?>

<div id="carouselHero" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		@foreach($content[0]->getCarousel() as $index => $image)
		<li data-target="carouselHero" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : ''}}" ></li>
		@endforeach
  </ol>
	<div class="carousel-inner">
		@foreach($content[0]->getCarousel() as $index => $image)
    <div class="carousel-item {{$index === 0 ? 'active' : ''}}">
      <img src="{{ $image->getFile()->getUrl() }}" alt="first slide" class="d-block w-100" />
    </div>
		@endforeach
    <div class="text-center text-white hero-text font-weight-bold" >
			<div class="col-md-9 mx-auto py-5">
        <h2>What we do</h2>
        <p>
					Regal Pythons is a Ball Python breeder combining recessive genes to produce bright, high contrast combinations that retain their brilliance through life <br>
          <a href="/available.html" class="orange-text">See availability @include('arrow')</a>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
 <div class="row">
    <div class="col-md-7 pl-0">
      <img src="{{ $content[0]->getAvailable()->getFile()->getUrl() }}" alt="" class="img-fluid" />
    </div>
    <div class="col-md-5 d-flex">
      <div class="mx-auto justify-content-center align-self-center text-center">
        <h2 class="orange-text">New In!</h2>
        <p>We have new animals available, click to browse<br>
          <a href="/available.html" class="orange-text">Available @include('arrow')</a>
        </p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5 d-flex">
      <div class="mx-auto justify-content-center align-self-center text-center">
        <h2 class="orange-text">World Firsts</h2>
        <p>Take a look at our stunning world<br>
          firsts produced here at Regal Pythons<br>
					<a href="/gallery.html" class="orange-text">Gallery @include('arrow')</a>
        </p>
      </div>
    </div>
    <div class="col-md-7 pr-0" />
      <img src="{{ $content[0]->getWorldfirsts()->getFile()->getUrl() }}" class="img-fluid" />    
   </div>
  </div>
</div>
@endsection
