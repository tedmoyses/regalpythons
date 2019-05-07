
@extends('layout')

@section('title', 'Animals available right now')

@section('content')

<?php 

$client = new \Contentful\Delivery\Client($contentfulApiKey, $contentfulSpaceId, $contentfulEnvironment);

$query = new \Contentful\Delivery\Query();
$query->setContentType('available')
    ->orderBy('sys.createdAt');

$animals = $client->getEntries($query);

?>
<div class="container-fluid bg-light p-5">
  <div class="row">
			<h1 class="col-12">Available animals</h1>
			<p class="col-12">As a hobbyist breeder working on very specific projects, from time to time we have exceptional surplus animals for sale.</p>
			<p class="col-12">We really wish we could keep them all, but take great pleasure in our customers joy when their acquisitions arrive, and go on to produce offspring of their own</p>
			<p class="col-12">Let us know if you have any questions and we hope we can help with your next step in the hobby</p>
      @forelse ($animals as $animal)
				<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 snake-card p-md-2 p-3" >
				<div class="inner bg-white p-md-2 p-3">  
						<img src="{{ $animal->getImage()->getFile()->getUrl() }}" alt="{{ $animal->getMorphtitle() }}" class="img-fluid pb-4" data-toggle="modal" data-target="#imageModal" data-image="{{ $animal->getImage()->getFile()->getUrl() }}" style="cursor:pointer"/>
						<b class="d-inline-block pb-4">{{ $animal->getMorphtitle() }}</b>
						<table class="table table-sm">
							<tr><td class="orange-text ">Weight:</td>     <td class="" >{{ $animal->getWeight() }}</td></tr>
							<tr><td class="orange-text ">MorphId:</td>     <td class="" >{{ $animal->getMorphid() }}</td></tr>
							<tr><td class="orange-text ">Hatch date:</td> <td class="" >{{ date( 'Y-m-d', strtotime($animal->getHatchdate())) }}</td></tr>
						</table>			
					</div>
					<p class="footer d-flex justify-content-between">
						<a href="mailto:regal@regalpythons.com?subject={{ rawurlencode('Interested in ' . $animal->getMorphid()) }}" class="price">&pound;{{ $animal->getPrice()}}</a>
						<a href="mailto:regal@regalpythons.com?subject={{ rawurlencode('Interested in ' . $animal->getMorphid()) }}"><svg class="arrow" viewBox="0 0 62.17 24.66"><use xlink:href="/assets/images/Arrow-02.svg#Layer_1"></use></svg></a>
					</p>
			 </div>
      @empty
        <div class="col-12"><p>No Animals - sorry</p></div>
      @endforelse
  </div>
</div>
@endsection
@include('modal')
