
@extends('layout')

@section('title', 'index page')

@section('content')

<div id="carouselHero" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="carouselHero" data-slide-to="0" class="active" ></li>
    <li data-target="carouselHero" data-slide-to="1" ></li>
    <li data-target="carouselHero" data-slide-to="2" ></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/assets/images/slide1.jpg" alt="first slide" class="d-block w-100" />
    </div>
     <div class="carousel-item">
      <img src="/assets/images/slide2.jpg" alt="second slide" class="d-block w-100" />
    </div>
      <div class="carousel-item ">
      <img src="/assets/images/slide3.jpg" alt="third slide" class="d-block w-100" />
		</div>
    <div class="text-center text-white hero-text font-weight-bold" >
			<div class="col-md-9 mx-auto py-5">
        <h2>What we do</h2>
        <p>
					Regal Pythons is a hobbyist Ball Python breeder focussing on combining recessive genes to produce bright, high contrast combinations that retain their brilliance through life <br>
          <a href="/available.html" class="orange-text">See availability @include('arrow')</a>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
 <div class="row">
    <div class="col-md-7 pl-0">
      <img src="/assets/images/index_orange3.jpg" alt="" class="img-fluid" />
    </div>
    <div class="col-md-5 d-flex">
      <div class="mx-auto justify-content-center align-self-center text-center">
        <h2 class="orange-text">New In!</h2>
        <p>2013 100% Het Lavender Albino Male <br>
          Weight: 400g Sire: 2009-LAV-01<br>
          Morph ID: 2013-HETLAV-01<br>
          Hatch Date: 2013-11-04<br>
          Dam: 2007-HLAV-01<br>
          <span class="orange-text">See available @include('arrow')</span>
        </p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5 d-flex">
      <div class="mx-auto justify-content-center align-self-center text-center">
        <h2 class="orange-text">World first pictures</h2>
        <p>Take a look at our stunning world<br>
          firsts produced here at Regal Pythons<br>
					<a href="/gallery.html" class="orange-text">Gallery @include('arrow')</a>
        </p>
      </div>
    </div>
    <div class="col-md-7 pr-0" />
      <img src="/assets/images/index_yellow1.jpg" class="img-fluid" />    
   </div>
  </div>
</div>
@endsection
