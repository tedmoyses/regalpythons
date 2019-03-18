
@extends('layout')

@section('title', 'Animals available right now')

@section('content')

<?php 

$client = new \Contentful\Delivery\Client('aee68d919f9e8d3ec12aee90df4a90a129d86631980ab98f272a88be50f163be', 's0ljm28rcwdf', 'master');

$query = new \Contentful\Delivery\Query();
$query->setContentType('available')
    ->orderBy('sys.createdAt');

$animals = $client->getEntries($query);

?>
<div class="container-fluid bg-light p-5">
  <div class="row">
      <h1 class="col-12">Available animals</h1>
      @forelse ($animals as $animal)
				<div class="col-md-3 snake-card p-3" >
				<div class="inner bg-white p-3">  
						<img src="{{ $animal->getImage()->getFile()->getUrl() }}" alt="{{ $animal->getMorphtitle() }}" class="img-fluid pb-4" data-toggle="modal" data-target="#imageModal" data-image="{{ $animal->getImage()->getFile()->getUrl() }}" style="cursor:pointer"/>
						<b class="d-inline-block pb-4">{{ $animal->getMorphtitle() }}</b>
						<table class="table">
							<tr><td class="orange-text ">Weight:</td>     <td class="" >{{ $animal->getWeight() }}g</td></tr>
							<tr><td class="orange-text ">MorphId:</td>     <td class="" >{{ $animal->getMorphid() }}g</td></tr>
							<tr><td class="orange-text ">Hatch date:</td> <td class="" >{{ $animal->getHatchdate() }}g</td></tr>
						</table>			
					</div>
					<p class="footer d-flex justify-content-between">
						<span class="price">&pound;{{ $animal->getPrice()}}</span>
						<svg class="arrow" viewBox="0 0 62.17 24.66"><use xlink:href="/assets/images/Arrow-02.svg#Layer_1"></use></svg>
					</p>
			 </div>
      @empty
        <div class="col-12"><p>No Animals - sorry</p></div>
        @endforelse
  </div>
</div>
@endsection
@include('modal')
