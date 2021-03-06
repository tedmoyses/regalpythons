
@extends('layout')

@section('title', 'index page')

@section('content')

<?php
$client = new \Contentful\Delivery\Client($contentfulApiKey, $contentfulSpaceId, $contentfulEnvironment);

$query = new \Contentful\Delivery\Query();
$query->setContentType('gallery')
    ->orderBy('fields.order');

$items = $client->getEntries($query);
?>


<div class="container-fluid bg-light p-5">
  <div class="row">
			<h1 class="col-12">Gallery page</h1>
			<p class="col-12">Over a decade of breeding rare ball python morphs has produced some astounding animals and some world firsts</p>
      <p class="col-12">We hope you enjoy exploring our favorite photos of our animals, please get in touch if anything catches your interest</p>
			@forelse($items as $item)
				<div class="col-md-3 p-33 gallery-item">
					<img src="{{ $item->getImage()->getFile()->getUrl()  }}" class="img-fluid" data-toggle="modal" data-target="#imageModal" data-image="{{ $item->getImage()->getFile()->getUrl() }}" style="cursor:pointer"/>
					<div class="bg-white p-3"><b>{{ $item->getTitle() }}</b></div>
				</div>
			@empty
			  <h2>No gallery images - sorry</h2>
      @endforelse
    </div>
</div>
@endsection
@include('modal')
